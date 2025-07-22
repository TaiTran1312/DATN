<template>
  <section class="hero-wapper-home">
    <HeaderComponent />
    <div class="hero">
      <h2>Welcome to</h2>
      <h1>REVERIE SAIGON HOTEL</h1>
    </div>
  </section>

  <section class="container">
    <div class="search-box">
      <div>
        <label for="destination">Destination</label>
        <select id="destination" v-model="filters.destination">
          <option value="">All</option>
          <option>Amiana Resort Sai Gon</option>
        </select>
      </div>
      <div>
        <label for="checkin">Check-in Date</label>
        <input type="date" id="checkin" v-model="filters.checkin" />
      </div>
      <div>
        <label for="checkout">Check-out Date</label>
        <input type="date" id="checkout" v-model="filters.checkout" />
      </div>
      <div>
        <label for="adults">Adult</label>
        <input type="number" id="adults" min="1" v-model.number="filters.adults" />
      </div>
      <div>
        <label for="children">Children</label>
        <input type="number" id="children" min="0" v-model.number="filters.children" />
      </div>
      <div style="align-self: flex-end;">
        <button @click="searchRooms">SEARCH MY DATE</button>
      </div>
    </div>

    <div class="discover-section">
      <div class="discover-text">
        <h2>DISCOVER THE LEGEND</h2>
        <h3>Creating A Meaningful Journey With Us</h3>
        <p>
          Welcome to 5-star luxury and dedicated service at La Vela Saigon...
        </p>
      </div>
      <div class="discover-images">
        <img src="/img/home-img.png" alt="Woman 1" />
      </div>
    </div>
  </section>

  <section class="rooms-section">
    <div class="room-home-grid">
      <div class="room-card" v-for="room in rooms" :key="room.room_id">
        <img :src="`/storage/img/${room.image}`" />
        <h4>{{ room.name }}</h4>
        <p>{{ room.description }}</p>
        <div class="utilities">
          <div class="icons-home">
            <div class="row">
              <span>👤 {{ room.capacity }} Person</span>
              <span>🛏 {{ room.beds }} Bed</span>
              <span>🛁 Bathroom</span>
            </div>
            <div class="row">
              <span>🏋️ Gym</span>
              <span>🍴 Restaurant</span>
              <span>📶 Wifi</span>
            </div>
          </div>
        </div>
        <div class="price-book">
          <div v-if="room.price">{{ formatPrice(room.price) }} đ/Night</div>
          <div v-else>Updating Price</div>
          <button class="book-btn">Book Now</button>
        </div>
      </div>
    </div>

    <!-- Phân trang -->
    <div class="pagination">
      <button @click="goToPage(currentPage - 1)" :disabled="currentPage === 1">Prev</button>
      <button
        v-for="page in lastPage"
        :key="page"
        @click="goToPage(page)"
        :class="{ active: page === currentPage }"
      >
        {{ page }}
      </button>
      <button @click="goToPage(currentPage + 1)" :disabled="currentPage === lastPage">Next</button>
    </div>
  </section>

  <!-- Các section còn lại -->
  <section class="highlight-all">
    <h3>DISCOVER</h3>
    <h2>Destination Of Luxury Space</h2>
    <div class="highlight-section">
      <div class="highlight-text">
        <div class="highlight-left">
          <h3>A pleasant stay</h3>
          <p>At La Vela Saigon Hotel... relaxing ambiance...</p>
          <button>SEE MORE</button>
        </div>
      </div>
      <div class="highlight-img">
        <img src="/img/home-img-2.jpg" alt="Luxury Room" />
      </div>
    </div>

    <div class="highlight-section">
      <div class="highlight-img">
        <img src="/img/home-img-2.jpg" alt="Luxury Room" />
      </div>
      <div class="highlight-text">
        <div class="highlight-right">
          <h3>A pleasant stay</h3>
          <p>At La Vela Saigon Hotel... relaxing ambiance...</p>
          <button class="btn-highlight-right">SEE MORE</button>
        </div>
      </div>
    </div>
  </section>

  <section class="hotel-room-section">
    <h2>HOTEL ROOM</h2>
    <div class="slider-arrows">
      <span class="slider-arrow" onclick="scrollSlider(-1)">
        <i class="fas fa-chevron-left"></i>
      </span>
      <span class="slider-arrow" onclick="scrollSlider(1)">
        <i class="fas fa-chevron-right"></i>
      </span>
    </div>
    <div class="room-slider" id="roomSlider">
      <div class="room-box" v-for="i in 3" :key="i">
        <img :src="`/img/home-img-${i + 3}.jpg`" :alt="`Room ${i}`" />
        <h4>SUPERIOR ROOM</h4>
        <p>
          Enjoy generous size of Executive in 36 m2 with modern decor...
        </p>
      </div>
    </div>
  </section>

  <Footer />
</template>

<script setup>
import { ref, onMounted, watch } from 'vue'
import axios from 'axios'
import HeaderComponent from '@/components/common/Header.vue'
import Footer from '@/components/common/Footer.vue'

const rooms = ref([])
const currentPage = ref(1)
const lastPage = ref(1)

const filters = ref({
  destination: '',
  checkin: '',
  checkout: '',
  adults: 1,
  children: 0,
})

// Hàm lấy danh sách phòng theo trang
const getRooms = async () => {
  try {
    rooms.value = [] // reset trước khi gọi mới
    const res = await axios.get('http://localhost:8000/api/v1/rooms', {
      params: {
        page: currentPage.value,
        destination: filters.value.destination,
        checkin: filters.value.checkin,
        checkout: filters.value.checkout,
        adults: filters.value.adults,
        children: filters.value.children,
      }
    })

    rooms.value = res.data.data
    currentPage.value = res.data.current_page
    lastPage.value = res.data.last_page
  } catch (err) {
    console.error('❌ Failed to load rooms:', err)
  }
}

// Chuyển trang
const goToPage = (page) => {
  if (page >= 1 && page <= lastPage.value) {
    currentPage.value = page
    getRooms()
  }
}

// Tìm kiếm lại từ trang 1
const searchRooms = () => {
  currentPage.value = 1
  getRooms()
}

// Format tiền
const formatPrice = (val) => new Intl.NumberFormat('vi-VN').format(val)

// Load lần đầu
onMounted(() => {
  getRooms()
})
</script>

<style scoped>
.pagination {
  display: flex;
  justify-content: center;
  margin: 20px 0;
  gap: 10px;
}
.pagination button {
  padding: 8px 12px;
  background-color: #007bff;
  color: white;
  border: none;
  border-radius: 5px;
  cursor: pointer;
}
.pagination button:disabled {
  background-color: #ccc;
  cursor: not-allowed;
}
.pagination button.active {
  background-color: #ff6600;
}
</style>
