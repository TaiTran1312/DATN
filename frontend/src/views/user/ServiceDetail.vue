<template>
    <section class="hero-wapper-service">
        <HeaderComponent />
           

        <div class="hero">SERVICE</div>
    </section>

    <section class="container">      
        <div class="service-detail">
            <!-- <img class="image-service" src="/img/service-hotel-1.png" alt="Main Room" /> -->
            <img src="/img/service-hotel-1.png" alt="">
            <h3><span class="line-content-detail">Room Article</span> </h3>
            <div class="service-description">
                <p>Our hotel features a spacious and beautifully designed swimming pool area, providing the perfect escape for guests looking to unwind and refresh.
                    Surrounded by comfortable lounge chairs and shaded areas, the pool is ideal for both leisurely swims and relaxing under the sun. 
                    We offer clean towels, poolside service, and a peaceful atmosphere to ensure a truly enjoyable experience.
                    Whether you want to start your day with a morning swim or cool off in the afternoon, our swimming pool is always ready to welcome you.
                </p>
                <br>
                <p>Opening Time: 6:00 AM – 9:00 PM (hoặc 10:00 PM)</p>
                
            </div>

            
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