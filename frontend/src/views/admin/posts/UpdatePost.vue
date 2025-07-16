<template>
  <AdminLayout>
    <main class="container mt-4">
      <h2 class="mb-4">Cập nhật Bài Viết</h2>

      <form @submit.prevent="updatePost">
        <div v-if="successMsg" class="alert alert-success">{{ successMsg }}</div>
        <div v-if="errorMsg" class="alert alert-danger">{{ errorMsg }}</div>

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
          <textarea
            v-model="form.content"
            class="form-control"
            rows="5"
            required
            placeholder="Nhập nội dung bài viết"
          ></textarea>
        </div>

        <!-- Ảnh -->
        <div class="mb-3">
          <label class="form-label">Chọn ảnh mới</label>
          <input type="file" class="form-control" accept="image/*" @change="handleImage" />
        </div>

        <!-- Preview ảnh -->
        <div v-if="previewUrl" class="mb-3">
          <label class="form-label">Xem trước ảnh:</label><br />
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

const route = useRoute()
const router = useRouter()
const postId = route.params.id

const form = ref({
  title: '',
  content: ''
})
const imageFile = ref(null)
const previewUrl = ref('')
const successMsg = ref('')
const errorMsg = ref('')
const loading = ref(false)

// Xử lý chọn ảnh
const handleImage = (event) => {
  imageFile.value = event.target.files[0]
  previewUrl.value = URL.createObjectURL(imageFile.value)
}

// Tải dữ liệu bài viết ban đầu
onMounted(async () => {
  try {
    const res = await axios.get(`/posts/${postId}`)
    form.value = {
      title: res.data.title || '',
      content: res.data.content || ''
    }
    previewUrl.value = res.data.image || ''
  } catch (err) {
    console.error('Lỗi tải dữ liệu:', err)
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
    if (imageFile.value) {
      payload.append('image', imageFile.value)
    }

    await axios.post(`/posts/${postId}?_method=PUT`, payload, {
      headers: { 'Content-Type': 'multipart/form-data' }
    })

    successMsg.value = 'Cập nhật bài viết thành công!'
  } catch (err) {
    console.error('Lỗi cập nhật:', err)
    errorMsg.value = err.response?.data?.message || 'Không thể cập nhật bài viết.'
  } finally {
    loading.value = false
  }
}
</script>
