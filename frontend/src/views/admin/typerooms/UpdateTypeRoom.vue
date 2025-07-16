<template>
  <AdminLayout>
    <main class="container mt-4">
      <div class="mb-2 text-muted">Quản lý dịch vụ &gt; Cập nhật loại phòng</div>
      <h2 class="mb-4">Cập nhật Loại Phòng</h2>

      <form @submit.prevent="updateType">
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
          {{ loading ? 'Đang cập nhật...' : 'Cập nhật loại phòng' }}
        </button>
        <router-link to="/admin/typeroom" class="btn btn-secondary ms-2">Quay lại</router-link>
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
const typeId = route.params.id

const form = ref({
  name: '',
  price: '',
  description: ''
})

const successMsg = ref('')
const errorMsg = ref('')
const loading = ref(false)

onMounted(async () => {
  try {
    const res = await axios.get(`/room-types/${typeId}`)
    form.value = {
      name: res.data.name ?? '',
      price: res.data.price ?? '',
      description: res.data.description ?? ''
    }
  } catch (err) {
    console.error('❌ Lỗi khi tải loại phòng:', err)
    errorMsg.value = 'Không thể tải dữ liệu loại phòng.'
  }
})

const updateType = async () => {
  successMsg.value = ''
  errorMsg.value = ''
  loading.value = true
  try {
    await axios.put(`/room-types/${typeId}`, form.value)
    successMsg.value = 'Cập nhật loại phòng thành công!'
  } catch (err) {
    console.error('❌ Lỗi khi cập nhật loại phòng:', err)
    errorMsg.value = err.response?.data?.message || 'Không thể cập nhật loại phòng.'
  } finally {
    loading.value = false
  }
}
</script>
