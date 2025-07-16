<template>
  <AdminLayout>
    <main class="container mt-4">
      <h2 class="mb-4">Quản Lí Đặt phòng</h2>

      <router-link to="/admin/bookings/add" class="btn btn-primary mb-3">Thêm Booking</router-link>

      <div v-if="successMsg" class="alert alert-success">{{ successMsg }}</div>
      <div v-if="bookings.length === 0" class="alert alert-info">Chưa có booking nào được tạo.</div>

      <table v-if="bookings.length > 0" class="table table-bordered">
        <thead>
          <tr>
            <th>ID</th>
            <th>Phòng</th>
            <th>Khách hàng</th>
            <th>Email</th>
            <th>Nhận phòng</th>
            <th>Trả phòng</th>
            <th>Trạng thái</th>
            <th>Hành động</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="booking in bookings" :key="booking.booking_id">
            <td>{{ booking.booking_id }}</td>
            <td>{{ booking.room?.name || 'Không xác định' }}</td>
            <td>{{ booking.customer_name }}</td>
            <td>{{ booking.customer_email }}</td>
            <td>{{ formatDate(booking.check_in) }}</td>
            <td>{{ formatDate(booking.check_out) }}</td>
            <td><span :class="statusClass(booking.status)">{{ ucfirst(booking.status) }}</span></td>
            <td>
              <router-link :to="`/admin/bookings/${booking.booking_id}/update-booking`" class="btn btn-sm btn-warning me-1">Sửa</router-link>
              <button class="btn btn-sm btn-danger" @click="deleteBooking(booking.booking_id)">Xóa</button>
            </td>
          </tr>
        </tbody>
      </table>
    </main>
  </AdminLayout>
</template>

<script setup>
import { ref, onMounted } from 'vue'
import axios from '@/axios'
import AdminLayout from '@/Layouts/AdminLayout.vue'

const bookings = ref([])
const successMsg = ref('')

onMounted(async () => {
  try {
    const res = await axios.get('/bookings')
    bookings.value = res.data
  } catch (err) {
    console.error('Lỗi khi lấy danh sách booking:', err)
  }
})

const formatDate = (str) => {
  if (!str) return 'Không xác định'
  const d = new Date(str)
  return `${d.getDate().toString().padStart(2, '0')}/${d.getMonth() + 1}/${d.getFullYear()}`
}

const ucfirst = (str) => str ? str.charAt(0).toUpperCase() + str.slice(1) : ''

const statusClass = (status) => {
  return status === 'confirmed' ? 'badge bg-success' :
         status === 'pending' ? 'badge bg-warning' :
         'badge bg-secondary'
}

const deleteBooking = async (id) => {
  if (!confirm('Bạn chắc chắn muốn xóa booking này?')) return
  try {
    await axios.delete(`/bookings/${id}`)
    bookings.value = bookings.value.filter(b => b.booking_id !== id)
    successMsg.value = 'Xóa booking thành công!'
  } catch (err) {
    console.error('Lỗi khi xóa booking:', err)
  }
}
</script>
