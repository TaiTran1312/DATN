<template>
  <AdminLayout>
    <main class="container mt-4">
      <h2 class="mb-4">Thêm dịch vụ mới</h2>

      <form @submit.prevent="submitService">
        <!-- Thông báo -->
        <div v-if="successMsg" class="alert alert-success">{{ successMsg }}</div>
        <div v-if="errorMsg" class="alert alert-danger">{{ errorMsg }}</div>

        <div class="mb-3">
          <label for="name" class="form-label">Tên dịch vụ</label>
          <input
            v-model="form.name"
            type="text"
            id="name"
            class="form-control"
            placeholder="Nhập tên dịch vụ"
            required
          />
        </div>

        <div class="mb-3">
          <label for="description" class="form-label">Mô tả</label>
          <textarea
            v-model="form.description"
            id="description"
            class="form-control"
            placeholder="Nhập mô tả dịch vụ"
            rows="4"
          ></textarea>
        </div>

        <div class="mb-3">
          <label for="status" class="form-label">Trạng thái</label>
          <select v-model="form.status" id="status" class="form-select" required>
            <option value="active">Hiển thị</option>
            <option value="inactive">Ẩn</option>
          </select>
        </div>

        <div class="mb-3">
          <label for="price" class="form-label">Giá dịch vụ (VNĐ)</label>
          <input
            v-model="form.price"
            type="number"
            id="price"
            class="form-control"
            placeholder="Nhập giá"
            min="0"
            required
          />
        </div>

        <button type="submit" class="btn btn-success">Lưu</button>
        <router-link to="/admin/service" class="btn btn-secondary ms-2">Quay lại</router-link>
      </form>
    </main>
  </AdminLayout>
</template>

<script setup>
import { ref } from 'vue'
import axios from '@/axios'
import AdminLayout from '@/Layouts/AdminLayout.vue'
import { useRouter } from 'vue-router'

const router = useRouter()
const form = ref({
  name: '',
  description: '',
  status: 'active',
  price: ''
})
const successMsg = ref('')
const errorMsg = ref('')

const submitService = async () => {
  successMsg.value = ''
  errorMsg.value = ''
  try {
    await axios.post('/services', form.value)
    successMsg.value = 'Dịch vụ đã được thêm thành công!'
    form.value = { name: '', description: '', status: 'active', price: '' }
    // router.push('/admin/services') // nếu muốn điều hướng sau khi thêm
  } catch (err) {
    console.error('Lỗi khi thêm dịch vụ:', err)
    errorMsg.value = err.response?.data?.message || 'Không thể thêm dịch vụ.'
  }
}
</script>
