<template>
  <AdminLayout>
    <main class="container mt-4">
      <h2 class="mb-4">Thêm Đơn Hàng</h2>

      <form @submit.prevent="submitOrder">
        <div v-if="successMsg" class="alert alert-success">{{ successMsg }}</div>
        <div v-if="errorMsg" class="alert alert-danger">{{ errorMsg }}</div>

        <!-- Khách hàng -->
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

        <!-- Chi tiết đơn hàng -->
        <div class="mb-3">
          <h5>Thêm phòng vào đơn hàng</h5>
          <select v-model="detail.room_id" class="form-select mb-2">
            <option disabled value="">-- Chọn phòng --</option>
            <option v-for="room in rooms" :key="room.room_id" :value="room.room_id">
              {{ room.name }}
            </option>
          </select>

          <input v-model="detail.checkin_date" type="date" class="form-control mb-2" placeholder="Ngày nhận phòng" />
          <input v-model="detail.checkout_date" type="date" class="form-control mb-2" placeholder="Ngày trả phòng" />
          <input v-model="detail.amount" type="number" class="form-control mb-2" placeholder="Giá phòng" />
          <select v-model="detail.status" class="form-select mb-2">
            <option value="pending">Chờ</option>
            <option value="confirmed">Xác nhận</option>
            <option value="cancelled">Hủy</option>
          </select>

          <button type="button" class="btn btn-secondary" @click="addDetail">Thêm vào đơn hàng</button>
        </div>

        <!-- Danh sách chi tiết -->
        <ul class="list-group mb-3" v-if="form.details.length > 0">
          <li class="list-group-item" v-for="(item, index) in form.details" :key="index">
            Phòng #{{ item.room_id }} | {{ item.checkin_date }} → {{ item.checkout_date }} | {{ item.amount }}₫
          </li>
        </ul>

        <button type="submit" class="btn btn-primary" :disabled="loading">
          {{ loading ? 'Đang gửi...' : 'Thêm đơn hàng' }}
        </button>
        <router-link to="/admin/order" class="btn btn-secondary ms-2">Quay lại</router-link>
      </form>
    </main>
  </AdminLayout>
</template>

<script setup>
import { ref, onMounted } from 'vue'
import axios from '@/axios'
import AdminLayout from '@/Layouts/AdminLayout.vue'

const form = ref({
  user_id: '',
  payment_gateway_id: '',
  payment_date: '',
  total_amount: '',
  status: 'pending',
  details: []
})

const detail = ref({
  room_id: '',
  checkin_date: '',
  checkout_date: '',
  amount: '',
  status: 'pending'
})

const rooms = ref([])
const successMsg = ref('')
const errorMsg = ref('')
const loading = ref(false)

onMounted(async () => {
  try {
    const res = await axios.get('/rooms')
    rooms.value = res.data
  } catch (err) {
    console.error('Lỗi khi tải phòng:', err)
  }
})

const addDetail = () => {
  if (!detail.value.room_id || !detail.value.checkin_date || !detail.value.checkout_date || !detail.value.amount) return
  form.value.details.push({ ...detail.value })
  detail.value = { room_id: '', checkin_date: '', checkout_date: '', amount: '', status: 'pending' }
}

const submitOrder = async () => {
  successMsg.value = ''
  errorMsg.value = ''
  loading.value = true
  try {
    await axios.post('/orders', form.value)
    successMsg.value = 'Thêm đơn hàng thành công!'
    form.value = {
      user_id: '',
      payment_gateway_id: '',
      payment_date: '',
      total_amount: '',
      status: 'pending',
      details: []
    }
  } catch (err) {
    console.error('Lỗi khi thêm đơn hàng:', err)
    errorMsg.value = err.response?.data?.message || 'Không thể thêm đơn hàng.'
  } finally {
    loading.value = false
  }
}
</script>
