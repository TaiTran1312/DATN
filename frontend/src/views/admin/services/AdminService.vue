<template>
  <AdminLayout>
    <main class="container mt-4">
      <h2 class="mb-4">Danh sách Dịch vụ</h2>

      <!-- Nút thêm/cập nhật -->
      <router-link to="/admin/services/add-service" class="btn btn-primary mb-3">
        + Thêm Dịch vụ
      </router-link>

      <!-- Thông báo -->
      <div v-if="successMsg" class="alert alert-success">{{ successMsg }}</div>
      <div v-else-if="loading" class="alert alert-info">Đang tải dữ liệu...</div>
      <div v-else-if="services.length === 0" class="alert alert-info">Chưa có dịch vụ nào được đăng.</div>

      <!-- Bảng dịch vụ -->
      <table v-if="services.length > 0" class="table table-bordered">
        <thead>
          <tr>
            <th>ID</th>
            <th>Tên</th>
            <th>Mô tả</th>
            <th>Giá</th>
            <th>Trạng thái</th>
            <th>Hành động</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="service in services" :key="service.service_id">
            <td>{{ service.service_id }}</td>
            <td>{{ service.name || '(Không có tên)' }}</td>
            <td>{{ truncate(service.description || '', 100) }}</td>
            <td>{{ formatPrice(service.price) }}</td>
            <td>
              <span :class="{
                'text-success': service.status === 'active',
                'text-secondary': service.status !== 'active'
              }">
                {{ service.status === 'active' ? 'Hiển thị' : 'Ẩn' }}
              </span>
            </td>
            <td>
              <router-link
                :to="`/admin/services/${service.service_id}/update-service`"
                class="btn btn-sm btn-warning me-1"
              >
                Sửa
              </router-link>
              <button class="btn btn-sm btn-danger" @click="deleteService(service.service_id)">
                Xóa
              </button>
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

const services = ref([])
const successMsg = ref('')
const loading = ref(false)

// Tải danh sách dịch vụ
onMounted(async () => {
  loading.value = true
  try {
    const res = await axios.get('/services')
    services.value = Array.isArray(res.data)
      ? res.data
      : res.data?.data || []
  } catch (err) {
    console.error('Lỗi khi lấy danh sách dịch vụ:', err)
  } finally {
    loading.value = false
  }
})

// Format giá VNĐ
const formatPrice = (value) => {
  const val = parseFloat(value)
  return isNaN(val)
    ? 'Chưa có giá'
    : new Intl.NumberFormat('vi-VN', {
        style: 'currency',
        currency: 'VND'
      }).format(val)
}

// Rút gọn mô tả
const truncate = (text, length) => {
  return text.length > length ? text.slice(0, length) + '...' : text
}

// Xóa dịch vụ
const deleteService = async (id) => {
  if (!confirm('Bạn có chắc muốn xóa dịch vụ này?')) return
  try {
    await axios.delete(`/services/${id}`)
    services.value = services.value.filter(s => s.service_id !== id)
    successMsg.value = 'Xóa dịch vụ thành công!'
  } catch (err) {
    console.error('Lỗi khi xóa dịch vụ:', err)
    successMsg.value = ''
  }
}
</script>
