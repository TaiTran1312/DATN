<template>
  <AdminLayout>
    <main class="container mt-4">
      <h2 class="mb-4">Quản Lí Thông Báo</h2>

      <router-link to="/admin/notification/add" class="btn btn-primary mb-3">Thêm Thông Báo</router-link>

      <div v-if="successMsg" class="alert alert-success">{{ successMsg }}</div>

      <table v-if="notifications.length" class="table table-bordered">
        <thead>
          <tr>
            <th>ID</th>
            <th>Tiêu đề</th>
            <th>Người nhận</th>
            <th>Đã đọc</th>
            <th>Ngày tạo</th>
            <th>Hành động</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="n in notifications" :key="n.notification_id">
            <td>{{ n.notification_id }}</td>
            <td>{{ n.title }}</td>
            <td>{{ n.user?.name || 'Ẩn danh' }}</td>
            <td><span :class="n.is_read ? 'text-success' : 'text-danger'">{{ n.is_read ? 'Đã đọc' : 'Chưa đọc' }}</span></td>
            <td>{{ formatDate(n.created_at) }}</td>
            <td>
              <router-link :to="`/admin/notifications/${n.notification_id}/update-notification`" class="btn btn-sm btn-warning me-1">Sửa</router-link>
              <button class="btn btn-sm btn-danger" @click="deleteNotification(n.notification_id)">Xóa</button>
            </td>
            <div v-if="errorMsg" class="alert alert-danger mt-3">{{ errorMsg }}</div>
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

const notifications = ref([])
const successMsg = ref('')
const errorMsg = ref('')

onMounted(async () => {
  try {
    const res = await axios.get('/notifications')
    // Kiểm tra dữ liệu có đúng định dạng array không
    if (Array.isArray(res.data)) {
      notifications.value = res.data
    } else {
      errorMsg.value = 'Dữ liệu trả về không hợp lệ'
      console.warn('Res.data is not array:', res.data)
    }
  } catch (err) {
    console.error('Lỗi khi gọi API thông báo:', err)
    errorMsg.value = 'Không thể tải thông báo. Vui lòng kiểm tra kết nối hoặc cấu hình server.'
  }
})

const formatDate = (str) => {
  const d = new Date(str)
  return isNaN(d.getTime()) ? 'Không xác định' : `${d.getDate()}/${d.getMonth() + 1}/${d.getFullYear()}`
}

const deleteNotification = async (id) => {
  if (!confirm('Bạn chắc chắn muốn xóa thông báo này?')) return
  try {
    await axios.delete(`/notifications/${id}`)
    notifications.value = notifications.value.filter(n => n.notification_id !== id)
    successMsg.value = 'Xóa thông báo thành công!'
  } catch (err) {
    console.error('Lỗi khi xóa thông báo:', err)
    errorMsg.value = 'Xóa không thành công. Vui lòng thử lại.'
  }
}
</script>
