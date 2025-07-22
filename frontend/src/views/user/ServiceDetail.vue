<template>
  <section class="hero-wapper-service">
    <HeaderComponent />
    <div class="hero">SERVICE</div>
  </section>

  <section class="container" v-if="service">
    <div class="service-detail">
      <img :src="`/img/${service.image}`" alt="service image">
      <h3><span class="line-content-detail">{{ service.title }}</span></h3>
      <div class="service-description">
        <p>{{ service.description }}</p>
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
    service.value = res.data
  } catch (error) {
    console.error('Lỗi khi load dịch vụ:', error)
  }
})
</script>
