<template>
  <section class="hero-wapper-contact">
    <HeaderComponent />
    <div class="hero">CONTACT</div>
  </section>

  <div class="section-title">Let Us Know Your Detail Request</div>
  <p class="description-contact">
    Contact The Reverie Saigon Hotel for any questions you may have.
    Submit the form below and our team will be in touch soon.
  </p>

  <section class="container">
    <form class="contact-form" @submit.prevent="handleSubmit">
      <div class="form-group">
        <label>Full Name *</label>
        <input type="text" v-model="form.full_name" required />
      </div>

      <div class="form-group">
        <label>Email *</label>
        <input type="email" v-model="form.email" required />
      </div>

      <div class="form-group">
        <label>Phone Number *</label>
        <input type="text" v-model="form.phone" required />
      </div>

      <div class="form-group">
        <label>Reason for Contact *</label>
        <input type="text" v-model="form.reason" required />
      </div>

      <div class="form-group full">
        <label>Your Message</label>
        <textarea v-model="form.message"></textarea>
      </div>

      <div class="form-group full">
        <button type="submit" class="submit-btn">Submit Now</button>
      </div>
    </form>

    <div class="map-info-section">
      <div class="map">
        <iframe
          src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3919.433036622424!2d106.6853763759066!3d10.777349159187597!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752fd207672c71%3A0x6b88e8bcdcb108f!2sLa%20Vela%20Saigon%20Hotel!5e0!3m2!1sen!2s!4v1719670000000!5m2!1sen!2s"
          allowfullscreen
        ></iframe>
      </div>

      <div class="info">
        <h3>REVERIE SAIGON HOTEL</h3>
        <p>
          📞 +84 (0) 123456789<br />
          📧 thereveriehotel@thereveriesaigon.com<br />
          📍 Tòa nhà QTSC9 (tòa T), đường Tô Ký, phường Tân Chánh Hiệp, quận 12, TP HCM
        </p>
      </div>
    </div>
  </section>

  <Footer />
</template>

<script setup>
import { ref } from 'vue'
import axios from 'axios'
import HeaderComponent from '@/components/common/Header.vue'
import Footer from '@/components/common/Footer.vue'

// Khởi tạo dữ liệu form
const form = ref({
  full_name: '',
  email: '',
  phone: '',
  reason: '',
  message: ''
})

// Hàm xử lý submit form
const handleSubmit = async () => {
  try {
    const res = await axios.post('http://127.0.0.1:8000/api/contact', form.value)
    alert('Gửi liên hệ thành công!')
    form.value = {
      full_name: '',
      email: '',
      phone: '',
      reason: '',
      message: ''
    }
  } catch (error) {
    alert('Đã xảy ra lỗi! Vui lòng kiểm tra lại.')
    console.error(error)
  }
}
</script>

<style scoped>
/* Bạn có thể bổ sung style tùy chỉnh ở đây */
</style>
