<template>
  <AdminLayout>
    <main class="container mt-4">
      <h2 class="mb-4">Thêm Bình Luận</h2>

      <form @submit.prevent="submitComment">
        <!-- Thông báo -->
        <div v-if="successMsg" class="alert alert-success">{{ successMsg }}</div>
        <div v-if="errorMsg" class="alert alert-danger">{{ errorMsg }}</div>

        <!-- Nội dung bình luận -->
        <div class="mb-3">
          <label for="body" class="form-label">Nội dung</label>
          <textarea
            v-model="form.body"
            id="body"
            class="form-control"
            rows="4"
            required
            placeholder="Nhập nội dung bình luận"
          ></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Thêm bình luận</button>
        <router-link to="/admin/comments" class="btn btn-secondary ms-2">Quay lại</router-link>
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
  body: '',
  user_id: 1 // 👉 lấy từ auth nếu dùng đăng nhập
})

const successMsg = ref('')
const errorMsg = ref('')

const submitComment = async () => {
  successMsg.value = ''
  errorMsg.value = ''
  try {
    await axios.post('/comments', form.value)
    successMsg.value = 'Thêm bình luận thành công!'
    form.value.body = ''
  } catch (err) {
    console.error('Lỗi khi thêm bình luận:', err)
    errorMsg.value = err.response?.data?.message || 'Không thể thêm bình luận.'
  }
}
</script>
