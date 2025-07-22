<template>
  <AdminLayout>
    <main class="container mt-4">
      <div class="mb-2 text-muted">Quản lý người dùng &gt; Thêm người dùng</div>
      <h2 class="mb-4">Thêm Người Dùng</h2>

      <form @submit.prevent="submitUser">
        <div v-if="successMsg" class="alert alert-success">{{ successMsg }}</div>
        <div v-if="errorMsg" class="alert alert-danger">{{ errorMsg }}</div>

        <!-- Tên -->
        <div class="mb-3">
          <label class="form-label">Tên đăng nhập</label>
          <input v-model="form.name" type="text" class="form-control" required />
        </div>

        <!-- Email -->
        <div class="mb-3">
          <label class="form-label">Email</label>
          <input v-model="form.email" type="email" class="form-control" required />
        </div>

        <!-- Mật khẩu -->
        <div class="mb-3">
          <label class="form-label">Mật khẩu</label>
          <input v-model="form.password" type="password" class="form-control" required />
        </div>

        <!-- Số điện thoại -->
        <div class="mb-3">
          <label class="form-label">Số điện thoại</label>
          <input v-model="form.phone" type="text" class="form-control" />
        </div>

        <!-- Địa chỉ -->
        <div class="mb-3">
          <label class="form-label">Địa chỉ</label>
          <input v-model="form.address" type="text" class="form-control" />
        </div>

        <!-- Trạng thái & Vai trò -->
        <div class="mb-3 d-flex gap-3">
          <select v-model="form.status" class="form-select" required>
            <option disabled value="">-- Trạng thái --</option>
            <option value="active">Hoạt động</option>
            <option value="inactive">Không hoạt động</option>
          </select>

          <select v-model="form.role" class="form-select" required>
            <option disabled value="">-- Vai trò --</option>
            <option value="user">User</option>
            <option value="admin">Admin</option>
          </select>
        </div>

        <!-- Avatar -->
        <div class="mb-3">
          <label class="form-label">Avatar (URL)</label>
          <input v-model="form.avatar" type="text" class="form-control" placeholder="https://..." />
        </div>

        <button type="submit" class="btn btn-primary" :disabled="loading">
          {{ loading ? 'Đang lưu...' : 'Lưu người dùng' }}
        </button>
        <router-link to="/admin/user" class="btn btn-secondary ms-2">Quay lại</router-link>
      </form>
    </main>
  </AdminLayout>
</template>

<script setup>
import { ref } from 'vue'
import { useRouter } from 'vue-router'
import axios from '@/axios'
import AdminLayout from '@/Layouts/AdminLayout.vue'

const router = useRouter()

const form = ref({
  name: '',
  email: '',
  password: '',
  phone: '',
  address: '',
  role: '',
  status: '',
  avatar: ''
})

const successMsg = ref('')
const errorMsg = ref('')
const loading = ref(false)

const submitUser = async () => {
  successMsg.value = ''
  errorMsg.value = ''
  loading.value = true

  try {
    await axios.post('/users', form.value)
    successMsg.value = 'Thêm người dùng thành công!'
    form.value = {
      name: '',
      email: '',
      password: '',
      phone: '',
      address: '',
      role: '',
      status: '',
      avatar: ''
    }
    // router.push('/admin/user') // ← bật nếu muốn redirect sau khi thêm
  } catch (err) {
    console.error('❌ Lỗi khi thêm người dùng:', err)
    const errors = err.response?.data?.errors
    errorMsg.value = errors
      ? Object.values(errors).flat().join('\n')
      : err.response?.data?.message || 'Không thể thêm người dùng.'
  } finally {
    loading.value = false
  }
}
</script>
