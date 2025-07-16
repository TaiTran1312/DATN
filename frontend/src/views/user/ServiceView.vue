<template>
  <section class="hero-wapper-service">
    <HeaderComponent/>
      

    <div class="hero">SERVICE</div>
  </section>
  <div class="section-title">WELCOME TO OUR SERVICE </div>
  <p class="description">
    The hotel provides a Billiards Club service with high-quality pool tables and a comfortable space for guests to
    relax and enjoy their free time
  </p>

  <section class="container">
    <hr>
    <!-- Service 1 -->
    <div class="service">
      <img src="/img/service-hotel-3.png" alt="Launder" />
      <div class="service-content">
        <h3 class="service-title">Launder</h3>
        <p class="service-text">
          Our hotel offers professional laundry and ironing services to ensure your clothes stay fresh and clean during
          your stay. Simply place your items in the laundry bag and contact housekeeping for pickup. Same day service is
          available for added convenience.
        </p>
        <router-link to="/servicedetail" class="btn btn-right">SEE MORE</router-link>
      </div>
    </div>
    <hr>

    <!-- Service 2 -->
    <div class="service">
      <div class="service-content">
        <h3>Launder</h3>
        <p>
          Our hotel offers professional laundry and ironing services to ensure your clothes stay fresh and clean during
          your stay. Simply place your items in the laundry bag and contact housekeeping for pickup. Same day service is
          available for added convenience.
        </p>
        <router-link to="/service-detail" class="btn">SEE MORE</router-link>
        <!-- <button class="btn">SEE MORE</button> -->
      </div>
      <img src="/img/service-hotel-1.png" alt="Launder" />

    </div>
    <hr>

    <!-- Service 3 -->
    <div class="service">
      <img src="/img/service-hotel-2.jpg" alt="Billiards" />
      <div class=" service-content">
        <h3 class="service-title">Billiards club</h3>
        <p class="service-text">
          Relax and have fun at our Billiards Club, where guests can enjoy a friendly game of pool in a stylish and
          comfortable setting. Perfect for unwinding after a long day or socializing with friends.
        </p>
            <router-link to="/servicedetail" class="btn btn-right">SEE MORE</router-link>

      </div>
    </div>
    <hr>

    <!-- Pagination -->
    <div class="pagination">
      <a href="#">1</a>
      <a href="#">2</a>
      <a href="#">3</a>
      <a href="#">4</a>
    </div>
  </section>
  <Footer />

</template>

<script setup>
import HeaderComponent from '@/components/common/Header.vue'
import Footer from '@/components/common/Footer.vue';
</script>

<style>

</style>