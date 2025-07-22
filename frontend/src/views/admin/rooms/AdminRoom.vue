<template>
  <AdminLayout>
    <main class="container mt-4">
      <h2 class="mb-4">Quản Lí Phòng</h2>

      <router-link to="/admin/rooms/add-room" class="btn btn-primary mb-3">Thêm Phòng</router-link>

      <div v-if="successMsg" class="alert alert-success">{{ successMsg }}</div>
      <div v-if="rooms.length === 0" class="alert alert-info">Chưa có phòng nào được thêm.</div>

      <table v-if="rooms.length > 0" class="table table-bordered">
        <thead>
          <tr>
            <th>ID</th>
            <th>Ảnh</th>
            <th>Tên phòng</th>
            <th>Mô tả</th>
            <th>Giá</th>
            <th>Loại phòng</th>
            <th>Sức chứa</th>
            <th>Trạng thái</th>
            <th>Ngày tạo</th>
            <th>Hành động</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="room in rooms" :key="room.room_id">
            <td>{{ room.room_id }}</td>
            <td>
              <img
                :src="getImageSrc(room.image)"
                alt="Ảnh phòng"
                class="img-thumbnail"
                style="width: 100px; height: 100px; object-fit: cover;"
              />
            </td>
            <td>{{ room.name }}</td>
            <td>{{ room.description }}</td>
            <td>{{ formatPrice(room.price) }}</td>
            <td>{{ room.room_type_name || 'Không xác định' }}</td>
            <td>{{ room.max_guests }} người</td>
            <td><span :class="statusClass(room.status)">{{ ucfirst(room.status) }}</span></td>
            <td>{{ formatDate(room.created_at) }}</td>
            <td>
              <router-link :to="`/admin/rooms/${room.room_id}/update-room`" class="btn btn-sm btn-warning me-1">Sửa</router-link>
              <button class="btn btn-sm btn-danger" @click="deleteRoom(room.room_id)">Xóa</button>
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

const rooms = ref([])
const successMsg = ref('')

onMounted(async () => {
  try {
    const res = await axios.get('/rooms')
    rooms.value = res.data?.data || []
  } catch (err) {
    console.error('Lỗi khi lấy danh sách phòng:', err)
  }
})

const formatPrice = (price) =>
  Number(price).toLocaleString('vi-VN') + '₫'

const formatDate = (str) => {
  if (!str) return 'Không xác định'
  const d = new Date(str)
  const pad = (n) => n.toString().padStart(2, '0')
  return `${pad(d.getDate())}/${pad(d.getMonth() + 1)}/${d.getFullYear()} ${pad(d.getHours())}:${pad(d.getMinutes())}`
}

const ucfirst = (str) => str ? str.charAt(0).toUpperCase() + str.slice(1) : ''

const statusClass = (status) => {
  return status === 'available' ? 'badge bg-success'
       : status === 'unavailable' ? 'badge bg-secondary'
       : 'badge bg-warning'
}

const deleteRoom = async (id) => {
  if (!confirm('Bạn chắc chắn muốn xóa phòng này?')) return
  try {
    await axios.delete(`/rooms/${id}`)
    rooms.value = rooms.value.filter(r => r.room_id !== id)
    successMsg.value = 'Xóa phòng thành công!'
  } catch (err) {
    console.error('Lỗi khi xóa phòng:', err)
  }
}

const getImageSrc = (url) => {
  if (!url) return '/img/default-room.jpg'
  // Nếu ảnh đã là URL hoặc đường dẫn trực tiếp thì dùng luôn
  if (url.startsWith('http') || url.startsWith('/storage')) return url
  // Nếu là tên file thì nối với thư mục lưu ảnh trên server
  return `/img/rooms/${url}`
}
</script>

<style scoped>
/* giữ nguyên CSS hiện tại */
</style>
