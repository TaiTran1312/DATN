<template>
  <AdminLayout>
    <main class="container mt-4">
      <h2 class="mb-4">Thêm Bài Viết</h2>

      <form @submit.prevent="submitPost">
        <div v-if="successMsg" class="alert alert-success">{{ successMsg }}</div>
        <div v-if="errorMsg" class="alert alert-danger">{{ errorMsg }}</div>

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
          <label for="content" class="form-label">Nội dung</label>
          <textarea
            v-model="form.content"
            id="content"
            class="form-control"
            placeholder="Nhập nội dung bài viết"
            rows="5"
            required
          ></textarea>
        </div>

        <!-- Ảnh -->
        <div class="mb-3">
          <label for="image" class="form-label">Ảnh</label>
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
import { ref } from 'vue'
import axios from '@/axios'
import AdminLayout from '@/Layouts/AdminLayout.vue'
import { useRouter } from 'vue-router'

const router = useRouter()

const form = ref({
  user_id: 1,
  title: '',
  content: ''
})
const imageFile = ref(null)

const successMsg = ref('')
const errorMsg = ref('')

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
    form.value = { user_id: 1, title: '', content: '' }
    imageFile.value = null
    // router.push('/admin/posts')
  } catch (err) {
    console.error('Lỗi khi thêm bài viết:', err)
    errorMsg.value = err.response?.data?.message || 'Không thể thêm bài viết.'
  }
}

</script>
