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

  <section class="container">
    <hr />
    <div v-for="(service, index) in services" :key="service.id" class="service" :class="{ 'reverse': index % 2 !== 0 }">
      <img :src="`/storage/${service.image}`" :alt="service.name" />
      <div class="service-content">
        <h3 class="service-title">{{ service.name }}</h3>
        <p class="service-text">{{ service.description }}</p>
       <router-link :to="`/services/${service.id}`">SEE MORE</router-link>

      </div>
    </div>
    <hr />

    <div class="pagination">
      <a href="#">1</a>
      <a href="#">2</a>
      <a href="#">3</a>
    </div>
  </section>
  <Footer />
</template>

<script setup>
import { ref, onMounted } from 'vue';
import axios from 'axios';
import HeaderComponent from '@/components/common/Header.vue';
import Footer from '@/components/common/Footer.vue';

const services = ref([]);

onMounted(async () => {
  try {
    const response = await axios.get('http://localhost:8000/api/v1/services');
    services.value = response.data;
  } catch (error) {
    console.error('Error loading services:', error);
  }
});
</script>

<style>

</style>
