<template>
  <HeaderComponent />

  <main class="container mt-4">
    <h2 class="mb-4">Thông Tin Tài Khoản</h2>

    <div class="card shadow-sm">
      <div class="card-body">
        <form @submit.prevent="updateProfile" enctype="multipart/form-data">
          <div class="row">
            <div class="col-md-8">
              <!-- Thông tin cá nhân -->
              <div class="mb-3">
                <label>Họ và Tên</label>
                <input v-model="user.name" type="text" class="form-control" required />
              </div>

              <div class="mb-3">
                <label>Email</label>
                <input v-model="user.email" type="email" class="form-control" disabled />
              </div>

              <div class="mb-3">
                <label>Số điện thoại</label>
                <input v-model="user.phone" type="text" class="form-control" />
              </div>

              <div class="mb-3">
                <label>Địa chỉ</label>
                <textarea v-model="user.address" class="form-control" rows="2" />
              </div>

              <div class="mb-3">
                <label>Đổi mật khẩu (nếu cần)</label>
                <input v-model="newPassword" type="password" class="form-control" placeholder="Mật khẩu mới..." />
              </div>
            </div>

            <div class="col-md-4 text-center">
              <!-- Avatar -->
              <label>Ảnh đại diện</label>
              <div class="mb-2">
                <img
                  :src="previewAvatar || getImageSrc(user.avatar)"
                  alt="Avatar"
                  class="rounded-circle border"
                  style="width: 120px; height: 120px; object-fit: cover;"
                />
              </div>
              <input type="file" class="form-control" accept="image/*" @change="handleAvatar" />
            </div>
          </div>

          <!-- Thông báo -->
          <div v-if="successMsg" class="alert alert-success mt-3">{{ successMsg }}</div>
          <div v-if="errorMsg" class="alert alert-danger mt-3">{{ errorMsg }}</div>

          <button type="submit" class="btn btn-primary mt-2">Lưu Thay Đổi</button>
        </form>
      </div>
    </div>
  </main>

  <Footer />
</template>

<script setup>
import { ref, onMounted } from 'vue'
import axios from 'axios'
import HeaderComponent from '@/components/common/Header.vue'
import Footer from '@/components/common/Footer.vue'

const user = ref({
  name: '',
  email: '',
  phone: '',
  address: '',
  avatar: ''
})

const successMsg = ref('')
const errorMsg = ref('')
const newPassword = ref('')
const avatarFile = ref(null)
const previewAvatar = ref(null)

const getImageSrc = (url) => {
  if (!url) return '/img/default-avatar.jpg'
  if (url.startsWith('http') || url.startsWith('/storage')) return url
  return `/storage/users/${url}`
}

onMounted(async () => {
  try {
    const res = await axios.get('/profile')
    user.value = res.data?.data || res.data
  } catch (err) {
    errorMsg.value = 'Không lấy được thông tin người dùng.'
    console.error('Lỗi:', err.response?.data || err)
  }
})

const handleAvatar = (e) => {
  const file = e.target.files[0]
  if (file) {
    avatarFile.value = file
    previewAvatar.value = URL.createObjectURL(file)
  }
}

const updateProfile = async () => {
  successMsg.value = ''
  errorMsg.value = ''

  try {
    const data = new FormData()
    for (const [key, val] of Object.entries(user.value)) {
      data.append(key, val)
    }

    if (avatarFile.value) {
      data.append('avatar', avatarFile.value)
    }

    if (newPassword.value) {
      data.append('password', newPassword.value)
    }

    await axios.post('/profile/update', data)
    successMsg.value = '✅ Thông tin đã được cập nhật!'
  } catch (err) {
    errorMsg.value = err.response?.data?.message || 'Lỗi khi cập nhật.'
    console.error('Chi tiết:', err.response?.data || err)
  }
}
</script>

<style scoped>
.card {
  border: 1px solid #ddd;
}
label {
  font-weight: 600;
}
</style>
