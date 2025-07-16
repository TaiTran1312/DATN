<template>
  <AdminLayout>
    <main class="container mt-4">
      <div class="mb-2 text-muted">Quản lý dịch vụ &gt; Thêm loại phòng</div>
      <h2 class="mb-4">Thêm Loại Phòng</h2>

      <form @submit.prevent="submitType">
        <div v-if="successMsg" class="alert alert-success">{{ successMsg }}</div>
        <div v-if="errorMsg" class="alert alert-danger">{{ errorMsg }}</div>

        <!-- Tên loại phòng -->
        <div class="mb-3">
          <label class="form-label">Tên loại phòng</label>
          <input
            v-model="form.name"
            type="text"
            class="form-control"
            placeholder="Nhập tên loại phòng"
            required
          />
        </div>

        <!-- Giá -->
        <div class="mb-3">
          <label class="form-label">Giá loại phòng</label>
          <input
            v-model="form.price"
            type="number"
            class="form-control"
            placeholder="Nhập giá loại phòng"
            required
          />
        </div>

        <!-- Mô tả -->
        <div class="mb-3">
          <label class="form-label">Mô tả</label>
          <textarea
            v-model="form.description"
            class="form-control"
            rows="4"
            placeholder="Nhập mô tả"
          ></textarea>
        </div>

        <button type="submit" class="btn btn-primary" :disabled="loading">
          {{ loading ? 'Đang lưu...' : 'Lưu loại phòng' }}
        </button>
        <router-link to="/admin/typeroom" class="btn btn-secondary ms-2">Quay lại</router-link>
      </form>
    </main>
  </AdminLayout>
</template>

<script setup>
import { ref } from 'vue'
import AdminLayout from '@/Layouts/AdminLayout.vue'
import axios from '@/axios'
import { useRouter } from 'vue-router'

const router = useRouter()

const form = ref({
  name: '',
  price: '',
  description: ''
})

const loading = ref(false)
const successMsg = ref('')
const errorMsg = ref('')

const submitType = async () => {
  successMsg.value = ''
  errorMsg.value = ''
  loading.value = true

  try {
    await axios.post('/room-types', form.value)
    successMsg.value = 'Thêm loại phòng thành công!'
    form.value = { name: '', price: '', description: '' }
    // router.push('/admin/typerooms') ← bật nếu muốn redirect sau khi thêm
  } catch (err) {
    console.error('Lỗi khi thêm loại phòng:', err)
    errorMsg.value = err.response?.data?.message || 'Không thể thêm loại phòng.'
  } finally {
    loading.value = false
  }
}
</script>
