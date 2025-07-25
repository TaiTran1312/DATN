<template>
  <AdminLayout>
    <main class="container mt-4">
      <h2 class="mb-4">Cập nhật dịch vụ</h2>

      <form @submit.prevent="updateService" enctype="multipart/form-data">
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
            required
            placeholder="Nhập tên dịch vụ"
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
            placeholder="Nhập mô tả"
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
            min="0"
            required
            placeholder="Nhập giá dịch vụ"
          />
        </div>

        <!-- Ảnh -->
        <div class="mb-3">
          <label class="form-label">Chọn ảnh mới</label>
          <input type="file" class="form-control" accept="image/*" @change="handleImage" />
        </div>

        <!-- Ảnh hiện tại -->
        <div v-if="form.image && !previewUrl" class="mb-3">
          <label class="form-label">Ảnh hiện tại:</label><br />
          <img :src="form.image" alt="Ảnh hiện tại" width="150" />
        </div>

        <!-- Preview ảnh mới -->
        <div v-if="previewUrl" class="mb-3">
          <label class="form-label">Xem trước ảnh mới:</label><br />
          <img :src="previewUrl" alt="Preview" width="150" />
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
  price: '',
  image: '' // đường dẫn ảnh hiện tại
})
const imageFile = ref(null)
const previewUrl = ref('')
const successMsg = ref('')
const errorMsg = ref('')
const loading = ref(false)

// Chọn ảnh mới
const handleImage = (event) => {
  imageFile.value = event.target.files[0]
  previewUrl.value = URL.createObjectURL(imageFile.value)
}

// Tải dữ liệu ban đầu
onMounted(async () => {
  try {
    const res = await axios.get(`/services/${serviceId}`)
    const data = res.data?.data || res.data
    form.value = {
      name: data.name || '',
      description: data.description || '',
      status: data.status || 'active',
      price: data.price || '',
      image: data.image || ''
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
  const payload = new FormData()
  payload.append('name', form.value.name)
  payload.append('description', form.value.description)
  payload.append('status', form.value.status)
  payload.append('price', form.value.price)
  if (imageFile.value) {
    payload.append('image', imageFile.value)
  }

  try {
    await axios.post(`/services/${serviceId}?_method=PUT`, payload, {
      headers: { 'Content-Type': 'multipart/form-data' }
    })
    successMsg.value = '✅ Cập nhật dịch vụ thành công!'
  } catch (err) {
    errorMsg.value = '❌ Lỗi khi cập nhật dịch vụ.'
    console.error(err)
  } finally {
    loading.value = false
  }
}
</script>

<style scoped>
img {
  object-fit: cover;
  border-radius: 5px;
}
</style>
