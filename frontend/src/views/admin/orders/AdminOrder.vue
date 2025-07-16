<template>
  <AdminLayout>
    <main class="container mt-4">
      <h2 class="mb-4">Quản lý Đặt Phòng</h2>

      <router-link to="/admin/orders/add" class="btn btn-primary mb-3">+ Thêm Đơn Hàng</router-link>

      <div v-if="successMsg" class="alert alert-success">{{ successMsg }}</div>
      <div v-if="errorMsg" class="alert alert-danger">{{ errorMsg }}</div>
      <div v-if="loading" class="alert alert-warning">Đang tải đơn hàng...</div>
      <div v-if="!loading && orders.length === 0" class="alert alert-info">Chưa có đơn hàng nào.</div>

      <table v-if="orders.length > 0" class="table table-bordered">
        <thead>
          <tr>
            <th>ID</th>
            <th>Khách hàng</th>
            <th>Thanh toán</th>
            <th>Ngày thanh toán</th>
            <th>Tổng tiền</th>
            <th>Trạng thái</th>
            <th>Ngày tạo</th>
            <th>Hành động</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="order in orders" :key="order.order_id">
            <td>{{ order.order_id }}</td>
            <td>{{ order.user?.name ?? `User #${order.user_id}` }}</td>
            <td>{{ order.payment_gateway_id ?? '-' }}</td>
            <td>{{ formatDate(order.payment_date) }}</td>
            <td>{{ formatPrice(order.total_amount) }}</td>
            <td>{{ order.status }}</td>
            <td>{{ formatDate(order.created_at) }}</td>
            <td>
              <router-link :to="`/admin/orders/${order.order_id}/details`" class="btn btn-sm btn-info me-1">Chi tiết</router-link>
              <router-link :to="`/admin/orders/${order.order_id}/update`" class="btn btn-sm btn-warning me-1">Sửa</router-link>
              <button class="btn btn-sm btn-danger" @click="deleteOrder(order.order_id)">Xóa</button>
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

const orders = ref([])
const successMsg = ref('')
const errorMsg = ref('')
const loading = ref(true)

onMounted(async () => {
  try {
    const res = await axios.get('/orders')
    const data = res.data
    orders.value = Array.isArray(data)
      ? data
      : Array.isArray(data.data)
      ? data.data
      : []
    console.log('✅ Dữ liệu đơn hàng:', orders.value)
  } catch (err) {
    console.error('❌ Lỗi khi tải đơn hàng:', err)
    errorMsg.value =
      err.response?.data?.message ||
      `Lỗi ${err.response?.status || ''}: Không thể tải danh sách đơn hàng.`
  } finally {
    loading.value = false
  }
})

const formatDate = (str) => {
  const d = new Date(str)
  return isNaN(d) ? 'Không xác định' : d.toLocaleDateString('vi-VN')
}

const formatPrice = (price) =>
  typeof price === 'number' ? price.toLocaleString('vi-VN') + '₫' : 'Không xác định'

const deleteOrder = async (id) => {
  if (!confirm('Bạn có chắc muốn xóa đơn hàng này?')) return
  try {
    await axios.delete(`/orders/${id}`)
    orders.value = orders.value.filter(o => o.order_id !== id)
    successMsg.value = 'Xóa đơn hàng thành công!'
  } catch (err) {
    console.error('❌ Lỗi khi xóa đơn hàng:', err)
    errorMsg.value = err.response?.data?.message || 'Không thể xóa đơn hàng.'
  }
}
</script>
