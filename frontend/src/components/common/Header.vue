<template>
  <header>
    <!-- Logo về trang chủ -->
    <router-link to="/" class="logo">
      <img src="/img/logo_hotel.png" alt="Logo" />
    </router-link>

    <!-- Navigation -->
    <nav>
      <router-link to="/">Home</router-link>
      <router-link to="/room">Rooms</router-link>
      <router-link to="/service">Service</router-link>
      <router-link to="/blog">Blog</router-link>
      <router-link to="/about">About</router-link>
      <router-link to="/contact">Contact</router-link>

      <!-- Nếu đã đăng nhập -->
      <template v-if="authStore.isAuthenticated">
        <router-link
          :to="authStore.user?.role === 'admin' ? '/admin/' : '/profile'"
        >
          {{ authStore.user?.name || 'Tài khoản' }}
        </router-link>
        <a href="#" @click.prevent="logout">Logout</a>
      </template>

      <!-- Nếu chưa đăng nhập -->
      <template v-else>
        <router-link to="/login">Login</router-link>
      </template>
    </nav>

    <!-- Booking -->
    <button class="booking-btn">Booking now</button>
  </header>
</template>

<script setup>
import { useAuthStore } from '@/stores/auth'
import { useRouter } from 'vue-router'

const authStore = useAuthStore()
const router = useRouter()

const logout = () => {
  authStore.logout()
  router.push('/login')
}
</script>

<style>
</style>
