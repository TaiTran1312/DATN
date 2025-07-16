<template>
  <AdminLayout>
    <main class="container mt-4">
      <h2>Cập nhật Booking</h2>
      <form @submit.prevent="updateBooking">
        <div class="mb-3">
          <label>Phòng</label>
          <select v-model="form.room_id" class="form-control" required>
            <option v-for="room in rooms" :key="room.room_id" :value="room.room_id">
              {{ room.name }}
            </option>
          </select>
        </div>
        <div class="mb-3">
          <label>Tên khách</label>
          <input v-model="form.customer_name" type="text" class="form-control" required />
        </div>
        <div class="mb-3">
          <label>Email</label>
          <input v-model="form.customer_email" type="email" class="form-control" required />
        </div>
        <div class="mb-3">
          <label>Ngày nhận phòng</label>
          <input v-model="form.check_in" type="date" class="form-control" required />
        </div>
        <div class="mb-3">
          <label>Ngày trả phòng</label>
          <input v-model="form.check_out" type="date" class="form-control" required />
        </div>
        <div class="mb-3">
          <label>Trạng thái</label>
          <select v-model="form.status" class="form-control">
            <option value="pending">Chờ xác nhận</option>
            <option value="confirmed">Đã xác nhận</option>
            <option value="cancelled">Đã hủy</option>
          </select>
        </div>
        <button type="submit" class="btn btn-primary">Cập nhật</button>
        <router-link to="/admin/booking" class="btn btn-secondary ms-2">Quay lại</router-link>
        <div v-if="successMsg" class="alert alert-success mt-3">{{ successMsg }}</div>
      </form>
    </main>
  </AdminLayout>
</template>

<script setup>
import { ref, onMounted } from 'vue'
import { useRoute } from 'vue-router'
import axios from '@/axios'
import AdminLayout from '@/Layouts/AdminLayout.vue'

const route = useRoute()
const bookingId = route.params.id

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

onMounted(async () => {
  try {
    const [roomRes, bookingRes] = await Promise.all([
      axios.get('/rooms'),
      axios.get(`/bookings/${bookingId}`)
    ])
    rooms.value = roomRes.data
    form.value = {
      room_id: bookingRes.data.room_id,
      customer_name: bookingRes.data.customer_name,
      customer_email: bookingRes.data.customer_email,
      check_in: bookingRes.data.check_in,
      check_out: bookingRes.data.check_out,
      status: bookingRes.data.status
    }
  } catch (err) {
    console.error('Lỗi khi tải dữ liệu booking:', err)
  }
})

const updateBooking = async () => {
  try {
    await axios.put(`/bookings/${bookingId}`, form.value)
    successMsg.value = 'Cập nhật booking thành công!'
  } catch (err) {
    console.error('Lỗi khi cập nhật booking:', err)
  }
}
</script>
