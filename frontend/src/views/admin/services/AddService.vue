<template>
  <AdminLayout>
    <main class="container mt-4">
      <h2 class="mb-4">Thêm dịch vụ mới</h2>

      <form @submit.prevent="submitService" enctype="multipart/form-data">
        <!-- Thông báo -->
        <div v-if="successMsg" class="alert alert-success">{{ successMsg }}</div>
        <div v-if="errorMsg" class="alert alert-danger">{{ errorMsg }}</div>

        <!-- Tên -->
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

        <!-- Mô tả -->
        <div class="mb-3">
          <label for="description" class="form-label">Mô tả</label>
          <textarea
            v-model="form.description"
            id="description"
            class="form-control"
            rows="4"
            placeholder="Nhập mô tả dịch vụ"
          ></textarea>
        </div>

        <!-- Trạng thái -->
        <div class="mb-3">
          <label for="status" class="form-label">Trạng thái</label>
          <select v-model="form.status" id="status" class="form-select" required>
            <option value="active">Hiển thị</option>
            <option value="inactive">Ẩn</option>
          </select>
        </div>

        <!-- Giá -->
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

        <!-- Ảnh -->
        <div class="mb-3">
          <label for="image" class="form-label">Ảnh đại diện</label>
          <input
            @change="handleImage"
            type="file"
            id="image"
            class="form-control"
            accept="image/*"
          />
        </div>

        <!-- Preview ảnh -->
        <div v-if="previewUrl" class="mb-3">
          <label class="form-label">Xem trước ảnh:</label><br />
          <img :src="previewUrl" alt="Preview" width="150" />
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

const imageFile = ref(null)
const previewUrl = ref('')
const successMsg = ref('')
const errorMsg = ref('')

// Xử lý ảnh
const handleImage = (e) => {
  imageFile.value = e.target.files[0]
  previewUrl.value = URL.createObjectURL(imageFile.value)
}

const submitService = async () => {
  successMsg.value = ''
  errorMsg.value = ''

  const payload = new FormData()
  payload.append('name', form.value.name)
  payload.append('description', form.value.description)
  payload.append('status', form.value.status)
  payload.append('price', form.value.price)
  if (imageFile.value) {
    payload.append('image', imageFile.value)
  }

  try {
    await axios.post('/services', payload, {
      headers: { 'Content-Type': 'multipart/form-data' }
    })
    successMsg.value = '✅ Dịch vụ đã được thêm thành công!'
    form.value = { name: '', description: '', status: 'active', price: '' }
    imageFile.value = null
    previewUrl.value = ''
    // router.push('/admin/services') // bật nếu muốn chuyển trang
  } catch (err) {
    console.error('❌ Lỗi khi thêm dịch vụ:', err)
    errorMsg.value = err.response?.data?.message || 'Không thể thêm dịch vụ.'
  }
}
</script>

<style scoped>
img {
  border-radius: 5px;
  object-fit: cover;
}
</style>
