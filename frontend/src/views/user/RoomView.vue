<template>
  <section class="hero-wapper">
    <HeaderComponent />
    <div class="hero">ROOMS & SUITES</div>
  </section>

  <div class="section-title">ROOMS, SUITES & RESIDENCES</div>
  <p class="description">
    All of our accommodation options comprise luxury amenities such as tea & coffee, minibars, flat-screen
    televisions, fluffy bathrobes and slippers, hair dryers, and toiletries.
  </p>

  <section class="container">
    <div class="filters">
      <select><option>Loại phòng</option></select>
      <select><option>Loại giường</option></select>
      <select><option>Kiểu xem</option></select>
      <button @click="resetFilters">⟳ Cài lại</button>
    </div>

    <div class="room-list">
      <div
        class="room"
        v-for="room in rooms.filter(r => r.status?.toLowerCase() === 'available')"
        :key="room.room_id"
      >
        <img
          :src="room.image ? formatImage(room.image) : '/img/default-room.jpg'"
          alt="Room image"
        />
        <div class="room-details">
          <h3>{{ room.name }}</h3>
          <p>{{ room.description }}</p>
          <p class="text-muted">Sức chứa: {{ room.max_guests }} người</p>
          <p class="text-muted">Trạng thái: <strong>{{ ucfirst(room.status) }}</strong></p>
          <p class="text-muted">Giá: <strong>{{ formatPrice(room.price) }} đ/Night</strong></p>
          <p class="text-muted">Loại phòng: {{ room.room_type_name }}</p>

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

          <div class="room-footer">
            <strong>{{ formatPrice(room.price) }} đ/Night</strong>
            <div class="room-buttons">
              <router-link :to="`/roomdetail/${room.room_id}`" class="detail-link">
                See detail
              </router-link>
              <button class="book-btn">Book Now</button>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="pagination">
      <button>1</button>
      <button>2</button>
      <button>3</button>
      <button>4</button>
      <button>&gt;</button>
    </div>
  </section>

  <Footer />
</template>

<script setup>
import { ref, onMounted } from 'vue'
import axios from 'axios'
import HeaderComponent from '@/components/common/Header.vue'
import Footer from '@/components/common/Footer.vue'

const rooms = ref([])

onMounted(async () => {
  try {
    const response = await axios.get('http://localhost:8000/api/v1/rooms')
    rooms.value = response.data?.data || []
    console.log('📦 Dữ liệu phòng:', rooms.value)
  } catch (error) {
    console.error('❌ Failed to fetch rooms:', error)
  }
})

// Format ảnh
const formatImage = (path) => {
  if (!path) return '/default.jpg'

  // Nếu path đã có dạng đầy đủ
  if (path.startsWith('http')) return path

  // Nếu path trả về là 'services/abc.jpg'
  if (path.startsWith('services/')) return `/storage/${path}`

  // Nếu chỉ là tên ảnh
  return `/storage/${path}`
}

const formatPrice = (val) => new Intl.NumberFormat('vi-VN').format(val)
const ucfirst = (str) => str ? str.charAt(0).toUpperCase() + str.slice(1) : ''
const resetFilters = () => {
  // Reset logic nếu có
}
</script>

<style scoped>
.room-details .text-muted {
  font-size: 0.9rem;
  margin-bottom: 8px;
  color: #666;
}
.room img {
  width: 100%;
  height: auto;
  object-fit: cover;
  border-radius: 8px;
}
.room-footer {
  margin-top: 1rem;
  display: flex;
  justify-content: space-between;
  align-items: center;
}
.detail-link {
  text-decoration: none;
  color: #007bff;
}
.book-btn {
  background-color: #28a745;
  color: white;
  border: none;
  padding: 6px 12px;
  border-radius: 4px;
}
.room {
  margin-bottom: 40px;
}
</style>
