<template>
  <AdminLayout>
    <main class="container mt-4">
      <h2 class="mb-4">Cập nhật Đơn Hàng</h2>

      <form @submit.prevent="updateOrder">
        <div v-if="successMsg" class="alert alert-success">{{ successMsg }}</div>
        <div v-if="errorMsg" class="alert alert-danger">{{ errorMsg }}</div>

        <!-- Người dùng -->
        <div class="mb-3">
          <label class="form-label">ID người dùng</label>
          <input v-model="form.user_id" type="number" class="form-control" required />
        </div>

        <!-- Cổng thanh toán -->
        <div class="mb-3">
          <label class="form-label">Cổng thanh toán</label>
          <input v-model="form.payment_gateway_id" type="number" class="form-control" />
        </div>

        <!-- Ngày thanh toán -->
        <div class="mb-3">
          <label class="form-label">Ngày thanh toán</label>
          <input v-model="form.payment_date" type="date" class="form-control" />
        </div>

        <!-- Tổng tiền -->
        <div class="mb-3">
          <label class="form-label">Tổng tiền</label>
          <input v-model="form.total_amount" type="number" class="form-control" required />
        </div>

        <!-- Trạng thái -->
        <div class="mb-3">
          <label class="form-label">Trạng thái</label>
          <select v-model="form.status" class="form-select">
            <option value="pending">Chờ xử lý</option>
            <option value="confirmed">Đã xác nhận</option>
            <option value="cancelled">Đã hủy</option>
          </select>
        </div>

        <button type="submit" class="btn btn-primary" :disabled="loading">
          {{ loading ? 'Đang cập nhật...' : 'Cập nhật đơn hàng' }}
        </button>
        <router-link to="/admin/order" class="btn btn-secondary ms-2">Quay lại</router-link>
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
const orderId = route.params.id

const form = ref({
  user_id: '',
  payment_gateway_id: '',
  payment_date: '',
  total_amount: '',
  status: 'pending'
})

const successMsg = ref('')
const errorMsg = ref('')
const loading = ref(false)

onMounted(async () => {
  try {
    const res = await axios.get(`/orders/${orderId}`)
    const data = res.data
    form.value = {
      user_id: data.user_id ?? '',
      payment_gateway_id: data.payment_gateway_id ?? '',
      payment_date: data.payment_date ?? '',
      total_amount: data.total_amount ?? '',
      status: data.status ?? 'pending'
    }
  } catch (err) {
    console.error('❌ Lỗi khi tải đơn hàng:', err)
    errorMsg.value = 'Không thể tải dữ liệu đơn hàng.'
  }
})

const updateOrder = async () => {
  successMsg.value = ''
  errorMsg.value = ''
  loading.value = true
  try {
    await axios.put(`/orders/${orderId}`, form.value)
    successMsg.value = 'Cập nhật đơn hàng thành công!'
  } catch (err) {
    console.error('❌ Lỗi khi cập nhật đơn hàng:', err)
    errorMsg.value = err.response?.data?.message || 'Không thể cập nhật đơn hàng.'
  } finally {
    loading.value = false
  }
}
</script>
