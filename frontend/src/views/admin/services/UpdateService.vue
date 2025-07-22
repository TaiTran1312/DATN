<template>
  <AdminLayout>
    <main class="container mt-4">
      <h2 class="mb-4">Cập nhật dịch vụ</h2>

      <form @submit.prevent="updateService">
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
            placeholder="Nhập mô tả"
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
            placeholder="Nhập giá dịch vụ"
            min="0"
            required
          />
        </div>

        <button type="submit" class="btn btn-primary" :disabled="loading">
          {{ loading ? 'Đang cập nhật...' : 'Cập nhật dịch vụ' }}
        </button>
        <router-link to="/admin/service" class="btn btn-secondary ms-2">Quay lại</router-link>
      </form>
    </main>
  </AdminLayout>
</template>

<script setup>
import { ref, onMounted } from 'vue'
import { useRoute, useRouter } from 'vue-router'
import axios from '@/axios'
import AdminLayout from '@/Layouts/AdminLayout.vue'

const route = useRoute()
const router = useRouter()
const serviceId = route.params.id

const form = ref({
  name: '',
  description: '',
  status: '',
  price: ''
})

const successMsg = ref('')
const errorMsg = ref('')
const loading = ref(false)

onMounted(async () => {
  try {
    const res = await axios.get(`/services/${serviceId}`)
    form.value = {
      name: res.data.name || '',
      description: res.data.description || '',
      status: res.data.status || 'active',
      price: res.data.price || ''
    }
  } catch (err) {
    errorMsg.value = 'Không thể tải thông tin dịch vụ.'
    console.error(err)
  }
})

const updateService = async () => {
  loading.value = true
  successMsg.value = ''
  errorMsg.value = ''
  try {
    await axios.put(`/services/${serviceId}`, form.value)
    successMsg.value = 'Cập nhật dịch vụ thành công!'
  } catch (err) {
    errorMsg.value = 'Lỗi khi cập nhật dịch vụ.'
    console.error(err)
  } finally {
    loading.value = false
  }
}
</script>
