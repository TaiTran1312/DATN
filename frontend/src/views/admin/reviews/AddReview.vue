<template>
  <AdminLayout>
    <main class="container mt-4">
      <h2 class="mb-4">Thêm Đánh Giá</h2>

      <form @submit.prevent="submitReview">
        <!-- Thông báo -->
        <div v-if="successMsg" class="alert alert-success">{{ successMsg }}</div>
        <div v-if="errorMsg" class="alert alert-danger">{{ errorMsg }}</div>

        <!-- Người dùng -->
        <div class="mb-3">
          <label for="user_id" class="form-label">Người dùng (user_id)</label>
          <input
            v-model="form.user_id"
            type="number"
            id="user_id"
            class="form-control"
            placeholder="ID người dùng"
            required
          />
        </div>

        <!-- Phòng -->
        <div class="mb-3">
          <label for="room_id" class="form-label">Phòng (room_id)</label>
          <input
            v-model="form.room_id"
            type="number"
            id="room_id"
            class="form-control"
            placeholder="ID phòng (nếu có)"
          />
        </div>

        <!-- Đơn hàng -->
        <div class="mb-3">
          <label for="order_id" class="form-label">Đơn hàng (order_id)</label>
          <input
            v-model="form.order_id"
            type="number"
            id="order_id"
            class="form-control"
            placeholder="ID đơn hàng (nếu có)"
          />
        </div>

        <!-- Điểm đánh giá -->
        <div class="mb-3">
          <label for="rating" class="form-label">Điểm đánh giá (1–5)</label>
          <select v-model="form.rating" id="rating" class="form-select" required>
            <option disabled value="">-- Chọn điểm --</option>
            <option v-for="n in 5" :key="n" :value="n">{{ n }} ★</option>
          </select>
        </div>

        <!-- Nội dung -->
        <div class="mb-3">
          <label for="content" class="form-label">Nội dung</label>
          <textarea
            v-model="form.content"
            id="content"
            class="form-control"
            rows="4"
            required
            placeholder="Nhập nội dung đánh giá"
          ></textarea>
        </div>

        <button type="submit" class="btn btn-primary" :disabled="loading">
          {{ loading ? 'Đang gửi...' : 'Thêm đánh giá' }}
        </button>
        <router-link to="/admin/reviews" class="btn btn-secondary ms-2">Quay lại</router-link>
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
  room_id: '',
  order_id: '',
  rating: '',
  content: ''
})

const successMsg = ref('')
const errorMsg = ref('')
const loading = ref(false)

const submitReview = async () => {
  successMsg.value = ''
  errorMsg.value = ''
  loading.value = true
  try {
    await axios.post('/reviews', form.value)
    successMsg.value = 'Thêm đánh giá thành công!'
    form.value = { user_id: 1, room_id: '', order_id: '', rating: '', content: '' }
  } catch (err) {
    console.error('Lỗi khi thêm đánh giá:', err)
    errorMsg.value = err.response?.data?.message || 'Không thể thêm đánh giá.'
  } finally {
    loading.value = false
  }
}
</script>
