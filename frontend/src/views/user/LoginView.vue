<template>
  <HeaderComponent />

  <div class="login">
    <div class="thumb-login">
      <img src="/img/logo 1.png" alt="Logo" />
      <h3>Chào mừng đến với THE REVERIE SAIGON</h3>
    </div>

    <div class="container-login">
      <h2>Đăng nhập</h2>
      <form @submit.prevent="handleLogin">
        <div class="form-group">
          <label>Email / Số điện thoại di động</label>
          <input
            type="email"
            v-model="email"
            placeholder="0901234567 hoặc email@mail.com"
            required
          />
        </div>

        <div class="form-group password-group">
          <label>Mật khẩu</label>
          <input type="password" v-model="password" required />
        </div>

        <button type="submit" class="submit-btn">Đăng nhập</button>
      </form>

      <div class="divider">HOẶC</div>

      <div class="social-btns">
        <button>
          <img src="https://cdn-icons-png.flaticon.com/512/124/124010.png" alt="facebook" />
          Facebook
        </button>
        <button>
          <img src="https://cdn-icons-png.flaticon.com/512/281/281764.png" alt="google" />
          Google
        </button>
      </div>

      <div class="register-link">
        <span>Chưa có tài khoản? </span>
        <router-link to="/register">Đăng ký</router-link>
      </div>
    </div>
  </div>

  <Footer />
</template>

<script setup>
import { ref } from 'vue'
import { useRouter } from 'vue-router'
import axios from 'axios'
import HeaderComponent from '@/components/common/Header.vue'
import Footer from '@/components/common/Footer.vue'
import { useAuthStore } from '@/stores/auth'

const email = ref('')
const password = ref('')
const router = useRouter()
const auth = useAuthStore()

const handleLogin = async () => {
  try {
    const response = await axios.post('http://localhost:8000/api/v1/auth/login', {
      email: email.value,
      password: password.value,
    })

    const { token, user } = response?.data?.data || {}

    if (token && user) {
      auth.setToken(token)
      auth.setUser(user)

      alert(`🎉 Xin chào ${user.name}!`)

      // Điều hướng theo role
      switch (user.role) {
        case 'admin':
          router.push('/admin/')
          break
        case 'user':
        default:
          router.push('/')
          break
      }
    } else {
      alert('⚠️ Đăng nhập thất bại: Dữ liệu người dùng không hợp lệ.')
    }
  } catch (error) {
    console.error('❌ Lỗi khi đăng nhập:', error)
    alert('❌ Sai email hoặc mật khẩu!')
  }
}
</script>

<style scoped>
/* Giữ nguyên layout login — không chỉnh CSS tại đây nếu đã dùng file riêng */
</style>
