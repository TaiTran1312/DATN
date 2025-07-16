<template>
  <AdminLayout>
    <main class="container mt-4">
      <h2 class="mb-4">Thêm Booking</h2>

      <form @submit.prevent="submitBooking">
        <!-- Thông báo -->
        <div v-if="successMsg" class="alert alert-success">{{ successMsg }}</div>
        <div v-if="errorMsg" class="alert alert-danger">{{ errorMsg }}</div>

        <!-- Phòng -->
        <div class="mb-3">
          <label class="form-label">Phòng</label>
          <select v-model="form.room_id" class="form-select" required>
            <option disabled value="">-- Chọn phòng --</option>
            <option v-for="room in rooms" :key="room.room_id" :value="room.room_id">
              {{ room.name }}
            </option>
          </select>
        </div>

        <!-- Tên khách -->
        <div class="mb-3">
          <label class="form-label">Tên khách</label>
          <input v-model="form.customer_name" type="text" class="form-control" required />
        </div>

        <!-- Email -->
        <div class="mb-3">
          <label class="form-label">Email</label>
          <input v-model="form.customer_email" type="email" class="form-control" required />
        </div>

        <!-- Ngày nhận phòng -->
        <div class="mb-3">
          <label class="form-label">Ngày nhận phòng</label>
          <input v-model="form.check_in" type="date" class="form-control" required />
        </div>

        <!-- Ngày trả phòng -->
        <div class="mb-3">
          <label class="form-label">Ngày trả phòng</label>
          <input v-model="form.check_out" type="date" class="form-control" required />
        </div>

        <!-- Trạng thái -->
        <div class="mb-3">
          <label class="form-label">Trạng thái</label>
          <select v-model="form.status" class="form-select">
            <option value="pending">Chờ xác nhận</option>
            <option value="confirmed">Đã xác nhận</option>
            <option value="cancelled">Đã hủy</option>
          </select>
        </div>

        <button type="submit" class="btn btn-primary" :disabled="loading">
          {{ loading ? 'Đang gửi...' : 'Thêm Booking' }}
        </button>
        <router-link to="/admin/booking" class="btn btn-secondary ms-2">Quay lại</router-link>
      </form>
    </main>
  </AdminLayout>
</template>

<script setup>
import { ref, onMounted } from 'vue'
import axios from '@/axios'
import AdminLayout from '@/Layouts/AdminLayout.vue'
import { useRouter } from 'vue-router'

const router = useRouter()

const form = ref({
  room_id: '',
  customer_name: '',
  customer_email: '',
  check_in: '',
  check_out: '',
  status: 'pending'
})

const rooms = ref([])
const successMsg = ref('')
const errorMsg = ref('')
const loading = ref(false)

onMounted(async () => {
  try {
    const res = await axios.get('/rooms')
    rooms.value = Array.isArray(res.data) ? res.data : res.data?.data ?? []
  } catch (err) {
    console.error('Lỗi khi tải danh sách phòng:', err)
    errorMsg.value = 'Không thể tải danh sách phòng.'
  }
})

const submitBooking = async () => {
  successMsg.value = ''
  errorMsg.value = ''
  loading.value = true
  try {
    await axios.post('/bookings', form.value)
    successMsg.value = 'Thêm booking thành công!'
    form.value = {
      room_id: '',
      customer_name: '',
      customer_email: '',
      check_in: '',
      check_out: '',
      status: 'pending'
    }
  } catch (err) {
    console.error('Lỗi khi thêm booking:', err)
    errorMsg.value = err.response?.data?.message || 'Không thể thêm booking.'
  } finally {
    loading.value = false
  }
}
</script>
