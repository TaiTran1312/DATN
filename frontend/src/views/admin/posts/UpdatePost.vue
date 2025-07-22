<template>
  <AdminLayout>
    <main class="container mt-4">
      <h2 class="mb-4">Cập nhật Bài Viết</h2>

      <form @submit.prevent="updatePost">
        <div v-if="successMsg" class="alert alert-success">{{ successMsg }}</div>
        <div v-if="errorMsg" class="alert alert-danger">{{ errorMsg }}</div>

        <!-- Người viết -->
        <div class="mb-3">
          <label class="form-label">Người viết</label>
          <select v-model="form.user_id" class="form-select" required>
            <option disabled value="">-- Chọn người viết --</option>
            <option v-for="user in users" :key="user.user_id" :value="user.user_id">
              {{ user.name }}
            </option>
          </select>
        </div>

        <!-- Tiêu đề -->
        <div class="mb-3">
          <label class="form-label">Tiêu đề</label>
          <input
            v-model="form.title"
            type="text"
            class="form-control"
            required
            placeholder="Nhập tiêu đề"
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
          <label class="form-label">Chọn ảnh mới</label>
          <input type="file" class="form-control" accept="image/*" @change="handleImage" />
        </div>

        <!-- Ảnh hiện tại -->
        <div v-if="form.image && !previewUrl" class="mb-3">
          <label class="form-label">Ảnh hiện tại:</label><br />
          <img :src="form.image" alt="Ảnh hiện tại" width="150" />
        </div>

        <!-- Preview ảnh mới -->
        <div v-if="previewUrl" class="mb-3">
          <label class="form-label">Xem trước ảnh mới:</label><br />
          <img :src="previewUrl" alt="Preview" width="150" />
        </div>

        <button type="submit" class="btn btn-primary" :disabled="loading">
          {{ loading ? 'Đang cập nhật...' : 'Cập nhật bài viết' }}
        </button>
        <router-link to="/admin/post" class="btn btn-secondary ms-2">Quay lại</router-link>
      </form>
    </main>
  </AdminLayout>
</template>

<script setup>
import { ref, onMounted } from 'vue'
import { useRoute, useRouter } from 'vue-router'
import axios from '@/axios'
import AdminLayout from '@/Layouts/AdminLayout.vue'
import { QuillEditor } from '@vueup/vue-quill'
import '@vueup/vue-quill/dist/vue-quill.snow.css'

const route = useRoute()
const router = useRouter()
const postId = route.params.id

const form = ref({
  title: '',
  content: '',
  image: '',
  user_id: ''
})
const imageFile = ref(null)
const previewUrl = ref('')
const successMsg = ref('')
const errorMsg = ref('')
const loading = ref(false)
const users = ref([])

// Xử lý chọn ảnh mới
const handleImage = (event) => {
  imageFile.value = event.target.files[0]
  previewUrl.value = URL.createObjectURL(imageFile.value)
}

// Tải danh sách người dùng
const getUsers = async () => {
  try {
    const res = await axios.get('/users')
    users.value = res.data?.data || res.data || []
  } catch (err) {
    console.error('❌ Lỗi khi tải danh sách người dùng:', err)
  }
}

// Tải dữ liệu bài viết ban đầu
onMounted(async () => {
  await getUsers()
  try {
    const res = await axios.get(`/posts/${postId}`)
    const data = res.data?.data || res.data
    form.value = {
      title: data.title || '',
      content: data.content || '',
      image: data.image || '',
      user_id: data.user_id || ''
    }
  } catch (err) {
    console.error('❌ Lỗi tải dữ liệu:', err)
    errorMsg.value = 'Không thể tải bài viết.'
  }
})

const updatePost = async () => {
  loading.value = true
  successMsg.value = ''
  errorMsg.value = ''
  try {
    const payload = new FormData()
    payload.append('title', form.value.title)
    payload.append('content', form.value.content)
    payload.append('user_id', form.value.user_id)
    if (imageFile.value) {
      payload.append('image', imageFile.value)
    }

    await axios.post(`/posts/${postId}?_method=PUT`, payload, {
      headers: { 'Content-Type': 'multipart/form-data' }
    })

    successMsg.value = '✅ Cập nhật bài viết thành công!'
  } catch (err) {
    console.error('❌ Lỗi cập nhật:', err)
    errorMsg.value = err.response?.data?.message || 'Không thể cập nhật bài viết.'
  } finally {
    loading.value = false
  }
}
</script>

<style scoped>
.editor {
  height: 300px;
}
</style>
