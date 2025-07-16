<template>
  <section class="hero-wapper-about">
        <HeaderComponent/>

        <div class="hero">ABOUT</div>
    </section>
    <section class="container">
        <div class="container-about">
            <div class="image-column">
                <img src="/img/about-hotel.webp" alt="Coastal City View" />
            </div>
            <div class="content-column">
                <h2>Arrive in style with THE REVERIE SAIGON</h2>
                <hr />
                <p>
                    Arrive in style<br>
                    with Amanoi<br>
                    <strong>AIRPORT TRANSFERS</strong><br>
                    Amanoi is 45km or around 50 minutes by road from Cam Ranh Airport. Airport transfer services
                    with<br>
                    a shuttle bus or private car are available on request.<br>
                    Bookings are required at least 24 hours in advance.<br>
                    Once booked, cancellation fee of 50% applies up to 24 hours in advance, 100% fee if no show or
                    less<br>
                    than 24 hours notice.<br>
                    Prices are subject to change without notice, please contact us for the latest price list.<br>
                    <strong>SHUTTLE BUS</strong><br>
                    Amanoi provides a complimentary daily scheduled round-trip shuttle bus to Nha Trang Center<br>
                    subject to availability. Please contact our Concierge for more information.
                </p>
                <button class="contact-btn">Contact us</button>
            </div>
        </div>
    </section>
    <section class="map-section">
      <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d8024970.703699612!2d96.86993602500002!3d10.8538924!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752b6c59ba4c97%3A0x535e784068f1558b!2zVHLGsOG7nW5nIENhbyDEkeG6s25nIEZQVCBQb2x5dGVjaG5pYw!5e0!3m2!1svi!2s!4v1751123657751!5m2!1svi!2s"
         width="600" height="450" style="border:0;" allowfullscreen loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </section>
    
    <Footer/>

</template>

<style>
/* @media (min-width: 1024px) {
  .about {
    min-height: 100vh;
    display: flex;
    align-items: center;
  }
} */
 /* .hero-wapper {
      background: url(public/img/room-banner.png) no-repeat center/cover;
      color: white;
      position: relative;
      height: 600px;
    } */
</style>
<script setup>
import HeaderComponent from '@/components/common/Header.vue'
import Footer from '@/components/common/Footer.vue';

</script>
