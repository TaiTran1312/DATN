<template>
  <AdminLayout>
    <main class="container mt-4">
      <h2 class="mb-4">Thêm Bài Viết</h2>

      <form @submit.prevent="submitPost">
        <div v-if="successMsg" class="alert alert-success">{{ successMsg }}</div>
        <div v-if="errorMsg" class="alert alert-danger">{{ errorMsg }}</div>

        <!-- Người viết -->
        <div class="mb-3">
          <label for="user_id" class="form-label">Người viết</label>
          <select v-model="form.user_id" id="user_id" class="form-select" required>
            <option disabled value="">-- Chọn người viết --</option>
            <option v-for="user in users" :key="user.id" :value="user.id">
              {{ user.name }}
            </option>
          </select>
        </div>

        <!-- Tiêu đề -->
        <div class="mb-3">
          <label for="title" class="form-label">Tiêu đề</label>
          <input
            v-model="form.title"
            type="text"
            id="title"
            class="form-control"
            placeholder="Nhập tiêu đề"
            required
          />
        </div>

        <!-- Nội dung -->
        <div class="mb-3">
          <label class="form-label">Nội dung</label>
          <QuillEditor
            v-model:content="form.content"
            contentType="html"
            toolbar="full"
            class="editor"
          />
        </div>

        <!-- Ảnh -->
        <div class="mb-3">
          <label for="image" class="form-label">Ảnh đại diện</label>
          <input
            @change="handleFileUpload"
            type="file"
            id="image"
            class="form-control"
            accept="image/*"
          />
        </div>

        <button type="submit" class="btn btn-primary">Thêm bài viết</button>
        <router-link to="/admin/post" class="btn btn-secondary ms-2">Quay lại</router-link>
      </form>
    </main>
  </AdminLayout>
</template>

<script setup>
import { ref, onMounted } from 'vue'
import { useRouter } from 'vue-router'
import axios from '@/axios'
import AdminLayout from '@/Layouts/AdminLayout.vue'
import { QuillEditor } from '@vueup/vue-quill'
import '@vueup/vue-quill/dist/vue-quill.snow.css'

const router = useRouter()

const form = ref({
  user_id: '',
  title: '',
  content: ''
})
const imageFile = ref(null)
const users = ref([])

const successMsg = ref('')
const errorMsg = ref('')

const getUsers = async () => {
  try {
    const res = await axios.get('/users') // hoặc /api/users nếu dùng prefix
    users.value = res.data?.data || res.data || []
  } catch (err) {
    console.error('❌ Lỗi khi lấy danh sách người dùng:', err)
  }
}

const handleFileUpload = (event) => {
  imageFile.value = event.target.files[0]
}

const submitPost = async () => {
  successMsg.value = ''
  errorMsg.value = ''

  const payload = new FormData()
  payload.append('user_id', form.value.user_id)
  payload.append('title', form.value.title)
  payload.append('content', form.value.content)
  if (imageFile.value) {
    payload.append('image', imageFile.value)
  }

  try {
    await axios.post('/posts', payload, {
      headers: { 'Content-Type': 'multipart/form-data' }
    })
    successMsg.value = 'Thêm bài viết thành công!'
    form.value = { user_id: '', title: '', content: '' }
    imageFile.value = null
  } catch (err) {
    console.error('❌ Lỗi khi thêm bài viết:', err)
    errorMsg.value = err.response?.data?.message || 'Không thể thêm bài viết.'
  }
}

onMounted(() => {
  getUsers()
})
</script>

<style scoped>
.editor {
  height: 300px;
}
</style>
