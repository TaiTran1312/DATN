<template>
  <AdminLayout>
    <main class="container mt-4">
      <h2 class="mb-4">Thêm thông báo</h2>

      <form @submit.prevent="submitNotification">
        <div v-if="successMsg" class="alert alert-success">{{ successMsg }}</div>
        <div v-if="errorMsg" class="alert alert-danger">{{ errorMsg }}</div>

        <!-- Người nhận -->
        <div class="mb-3">
          <label for="user_id" class="form-label">Người nhận</label>
          <select v-model="form.user_id" id="user_id" class="form-select" required>
            <option value="" disabled selected>-- Chọn người nhận --</option>
            <option v-for="user in users" :key="user.user_id" :value="user.user_id">
              {{ user.name }} ({{ user.email }})
            </option>
          </select>
        </div>

        <!-- Tiêu đề -->
        <div class="mb-3">
          <label for="title" class="form-label">Tiêu đề</label>
          <input v-model="form.title" type="text" class="form-control" id="title" required />
        </div>

        <!-- Nội dung -->
        <div class="mb-3">
          <label for="message" class="form-label">Nội dung</label>
          <textarea v-model="form.message" class="form-control" id="message" rows="5" required></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Thêm thông báo</button>
        <router-link to="/admin/notification" class="btn btn-secondary ms-2">Quay lại</router-link>
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
  user_id: '', // chọn người nhận
  title: '',
  message: ''
})

const users = ref([])
const successMsg = ref('')
const errorMsg = ref('')

onMounted(async () => {
  try {
    const res = await axios.get('/users')
    users.value = Array.isArray(res.data) ? res.data : res.data.data || []
  } catch (err) {
    console.error('Không thể tải danh sách người dùng:', err)
  }
})

const submitNotification = async () => {
  successMsg.value = ''
  errorMsg.value = ''
  try {
    await axios.post('/notifications', form.value)
    successMsg.value = 'Thông báo đã được gửi thành công!'
    form.value.user_id = ''
    form.value.title = ''
    form.value.message = ''
  } catch (err) {
    console.error('Lỗi khi gửi thông báo:', err)
    errorMsg.value = err.response?.data?.message || 'Gửi không thành công. Vui lòng thử lại.'
  }
}
</script>
