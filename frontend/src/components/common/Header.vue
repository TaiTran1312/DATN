<template>
        <header>
            <div class="logo">
                <img src="/img/logo_hotel.png" alt="">
            </div>
            <nav>
                <router-link to="/">Home</router-link>
                <router-link to="/room">Rooms</router-link>
                <router-link to="/service">Service</router-link>
                <router-link to="/blog">Blog</router-link>
                <router-link to="/about">About</router-link>
                <router-link to="/contact">Contact</router-link>
                <router-link to="/login">Login</router-link>

                <!-- <a href="#">Home</a>
                <a href="#">Rooms</a>
                <a href="#">Blog</a>
                <a href="#">About</a>
                <a href="#">Contact</a>
                <a href="#">Login</a> -->
            </nav>
            <button class="booking-btn">Booking now</button>
        </header>  
</template>

<script>
export default {

}
</script>

<style>

</style>