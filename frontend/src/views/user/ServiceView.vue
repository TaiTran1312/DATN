<template>
  <section class="hero-wapper-service">
    <HeaderComponent />
    <div class="hero">SERVICE</div>
  </section>

  <div class="section-title">WELCOME TO OUR SERVICE</div>
  <p class="description">
    The hotel provides a Billiards Club service with high-quality pool tables and a comfortable space for guests to
    relax and enjoy their free time
  </p>

  <section class="container" v-if="services.length > 0">
    <hr />
    <div
      v-for="(service, index) in services.filter(s => s.status === 'active')"
      :key="service.service_id"
      class="service"
      :class="{ reverse: index % 2 !== 0 }"
    >
      <img :src="service.image" :alt="service.name" />
      <div class="service-content">
        <h3 class="service-title">{{ service.name }}</h3>
        <p class="service-text">{{ service.description }}</p>
        <router-link :to="`/servicedetail/${service.service_id}`">SEE MORE</router-link>
      </div>
    </div>
    <hr />

    <div class="pagination">
      <button>1</button>
      <button>2</button>
      <button>3</button>
    </div>
  </section>

  <Footer />
</template>

<script setup>
import { ref, onMounted } from 'vue'
import axios from 'axios'
import HeaderComponent from '@/components/common/Header.vue'
import Footer from '@/components/common/Footer.vue'

const services = ref([])

onMounted(async () => {
  try {
    const res = await axios.get('http://localhost:8000/api/v1/services')
    services.value = res.data?.data || res.data || []
    console.log('📦 Dịch vụ:', services.value)
  } catch (error) {
    console.error('❌ Lỗi khi tải dịch vụ:', error.response?.data || error.message)
  }
})
</script>

<style scoped>
/* Thêm CSS nếu cần */
</style>
