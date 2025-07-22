<template>
  <section class="hero-wapper-detail">
    <HeaderComponent />
    <div class="hero">ROOM DETAIL</div>
  </section>

  <div class="return">
    <div class="back">
      <router-link to="/">Home</router-link> >
      <router-link to="/rooms">Room</router-link> >
      <span>Room Detail</span>
    </div>
  </div>

  <section class="container" v-if="room">
    <RoomDetailSlider :images="room.images" />

    <div class="room-content">
      <div class="room-details">
        <h2><span class="line-content-detail">{{ room.name }}</span></h2>
        <p>{{ room.description }}</p>
        <div class="room-info">
          <strong>Room details:</strong><br />
          Room area: {{ room.area }} m<sup>2</sup><br />
          Bed selection: {{ room.bed }}<br />
          Capacity: {{ room.max_guests }} adults<br />
          View: {{ room.view }}
        </div>
        <div class="utilities">
          <strong class="line-content-detail">Utilities:</strong>
          <div class="icons">
            <div class="row">
              <span>👤 {{ room.max_guests }} Person</span>
              <span>🛏 Bed</span>
              <span>🛁 Bathroom</span>
            </div>
            <div class="row">
              <span>🏋️ Gym</span>
              <span>🍴 Restaurant</span>
              <span>📶 Wifi</span>
            </div>
          </div>
        </div>
      </div>

      <div class="booking-section">
        <div class="booking-day">
          <h3>Check Availability</h3>
          <form class="booking-form">
            <div class="form-group">
              <label for="checkin">Check-in Date</label>
              <input type="date" id="checkin" required />
            </div>
            <div class="form-group">
              <label for="checkout">Check-out Date</label>
              <input type="date" id="checkout" required />
            </div>
            <div class="form-group" style="display: flex; align-items: flex-end;">
              <button type="submit" class="book-btn">Book Now</button>
            </div>
          </form>
        </div>
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
import RoomDetailSlider from '@/components/common/RoomDetailSlider.vue'
import Footer from '@/components/common/Footer.vue'

const route = useRoute()
const room = ref(null)

const getRoomDetail = async () => {
  try {
    const response = await axios.get(`http://localhost:8000/api/v1/rooms/${route.params.id}`)
    room.value = response.data
  } catch (error) {
    console.error('Failed to load room detail:', error)
  }
}

onMounted(() => {
  getRoomDetail()
})
</script>

<style scoped>
/* Add your scoped styles if needed */
</style>
