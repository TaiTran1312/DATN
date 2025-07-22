<template>
  <AdminLayout>
    <main class="container mt-4">
      <h2 class="mb-4">Cập nhật Đánh Giá</h2>

      <form @submit.prevent="updateReview">
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
          {{ loading ? 'Đang cập nhật...' : 'Cập nhật đánh giá' }}
        </button>
        <router-link to="/admin/review" class="btn btn-secondary ms-2">Quay lại</router-link>
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
const reviewId = route.params.id

const form = ref({
  user_id: '',
  room_id: '',
  order_id: '',
  rating: '',
  content: ''
})

const successMsg = ref('')
const errorMsg = ref('')
const loading = ref(false)

onMounted(async () => {
  try {
    const res = await axios.get(`/reviews/${reviewId}`)
    form.value = {
      user_id: res.data.user_id ?? '',
      room_id: res.data.room_id ?? '',
      order_id: res.data.order_id ?? '',
      rating: res.data.rating ?? '',
      content: res.data.content ?? ''
    }
  } catch (err) {
    console.error('❌ Lỗi khi tải đánh giá:', err)
    errorMsg.value = 'Không thể tải đánh giá.'
  }
})

const updateReview = async () => {
  successMsg.value = ''
  errorMsg.value = ''
  loading.value = true
  try {
    await axios.put(`/reviews/${reviewId}`, form.value)
    successMsg.value = 'Cập nhật đánh giá thành công!'
  } catch (err) {
    console.error('❌ Lỗi khi cập nhật đánh giá:', err)
    errorMsg.value = err.response?.data?.message || 'Không thể cập nhật đánh giá.'
  } finally {
    loading.value = false
  }
}
</script>
