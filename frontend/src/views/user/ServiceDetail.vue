<template>
  <section class="hero-wapper-service">
    <HeaderComponent />
    <div class="hero">SERVICE</div>
  </section>

  <section class="container" v-if="service">
    <div class="service-detail text-center">
      <img :src="formatImage(service.image)" alt="service image" class="img-fluid mb-3" />
      <h3><span class="line-content-detail">{{ service.name }}</span></h3>
      <div class="service-description">
        <p>{{ service.description }}</p>
        <p class="price">Giá: {{ formatPrice(service.price) }}</p>
      </div>
    </div>
  </section>

  <Footer />
</template>

<script setup>
import { onMounted, ref } from 'vue'
import { useRoute } from 'vue-router'
import axios from 'axios'

import HeaderComponent from '@/components/common/Header.vue'
import Footer from '@/components/common/Footer.vue'

const service = ref(null)
const route = useRoute()

onMounted(async () => {
  try {
    const id = route.params.id
    const res = await axios.get(`http://127.0.0.1:8000/api/v1/services/${id}`)
    service.value = res.data?.data || res.data
  } catch (error) {
    console.error('❌ Lỗi khi load dịch vụ:', error)
  }
})

// Format ảnh
const formatImage = (path) => {
  if (!path) return '/default.jpg'
  if (path.startsWith('http') || path.startsWith('/storage/')) return path
  return `/storage/services/${path}`
}

// Format giá VNĐ
const formatPrice = (value) => {
  const val = parseFloat(value)
  return isNaN(val)
    ? 'Chưa có giá'
    : new Intl.NumberFormat('vi-VN', {
        style: 'currency',
        currency: 'VND'
      }).format(val)
}
</script>

<style scoped>
.service-detail {
  text-align: center;
}
.price {
  font-weight: bold;
  color: #007bff;
}
img {
  max-width: 300px;
  border-radius: 8px;
  object-fit: cover;
}
</style>
