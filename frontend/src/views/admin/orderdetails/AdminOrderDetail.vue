<template>
  <AdminLayout>
    <main class="container mt-4">
      <h2 class="mb-4">Chi tiết Đơn Hàng #{{ orderId }}</h2>

      <div v-if="loading" class="alert alert-warning">Đang tải chi tiết đơn hàng...</div>
      <div v-if="!loading && details.length === 0" class="alert alert-info">Không có chi tiết nào.</div>

      <table v-if="details.length > 0" class="table table-bordered">
        <thead>
          <tr>
            <th>Phòng</th>
            <th>Ngày nhận</th>
            <th>Ngày trả</th>
            <th>Giá</th>
            <th>Trạng thái</th>
            <th>Ngày đặt</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="item in details" :key="item.order_detail_id">
            <td>{{ item.room?.name || item.room_id }}</td>
            <td>{{ formatDate(item.checkin_date) }}</td>
            <td>{{ formatDate(item.checkout_date) }}</td>
            <td>{{ formatPrice(item.amount) }}</td>
            <td>{{ item.status }}</td>
            <td>{{ formatDate(item.booking_date) }}</td>
          </tr>
        </tbody>
      </table>
    </main>
  </AdminLayout>
</template>

<script setup>
import { ref, onMounted } from 'vue'
import { useRoute } from 'vue-router'
import axios from '@/axios'
import AdminLayout from '@/Layouts/AdminLayout.vue'

const route = useRoute()
const orderId = route.params.id

const details = ref([])
const loading = ref(true)

onMounted(async () => {
  try {
    const res = await axios.get(`/orders/${orderId}/details`)
    details.value = res.data
  } catch (err) {
    console.error('Lỗi khi tải chi tiết đơn hàng:', err)
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
</script>
