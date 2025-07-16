<template>
   <section class="hero-wapper-detail">
        <HeaderComponent/>

        <div class="hero">ROOM DETAIL</div>
    </section>
    <div class="return">
        <div class="back">
            <a href="">Home</a> >
            <a href="">Room</a> >
            <a href="">Room detail</a>
        </div>
    </div>

    <section class="container">
        <!-- <div class="slider-container">
            <button class="nav-button prev-button" onclick="prevSlide()">&#10094;</button>
            <img id="mainImage" class="main-image" src="/img/room_1.jpg" alt="Main Room" />
            <button class="nav-button next-button" onclick="nextSlide()">&#10095;</button>

            <div class="thumbnail-container">
                <img src="/img/room_1.jpg" onclick="changeImage(this, 0)" class="active" />
                <img src="/img/room_2.jpg" onclick="changeImage(this, 1)" />
                <img src="/img/room_3.jpg" onclick="changeImage(this, 2)" />
                <img src="/img/room_4.jpg" onclick="changeImage(this, 3)" />
                <img src="/img/room_5.jpg" onclick="changeImage(this, 4)" />
            </div>
        </div> -->
        <RoomDetailSlider />
        <div class="room-content">
            <div class="room-details">
                <h2><span class="line-content-detail">Honeymoon bungalow</span></h2>
                <p>
                    Being the most high-class accommodation at Ebino Pu Luong Resort, the Honeymoon Bungalow offers an
                    elegant bedroom with sophisticated design.
                    The full-length crystal glass windows welcome a lavish influx of daylight and fresh air into the
                    rooms. Modern wooden furniture is reasonably decorated, maximizing comfort for you.
                    The full-length crystal-glass opens fantastic views of rice terraces and mountain ranges.
                    From lovely private balcony you can admire the wonderful view over spreading rice terrace.
                </p>
                <div class="room-info">
                    <strong>Room details:</strong><br />
                    Room area: 30m<sup>2</sup><br />
                    Bed selection: 01 double bed<br />
                    Capacity: 02 adults<br />
                    View: Mountain View and Rice Terrace View
                </div>
                <div class="utilities">
                    <strong class="line-content-detail">Utilities:</strong>
                    <div class="icons">
                        <div class="row">
                            <span>👤 1 Person</span>
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
                            <input type="date" id="checkin" name="checkin" required>
                        </div>
                        <div class="form-group">
                            <label for="checkout">Check-out Date</label>
                            <input type="date" id="checkout" name="checkout" required>
                        </div>
                        <div class="form-group" style="display: flex; align-items: flex-end;">
                            <button type="submit" class="book-btn">Book Now</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>

        <div class="room-article">
            <h3><span class="line-content-detail">Room Article</span> </h3>
            <div class="room-grid">
                <div class="room-card">
                    <img src="/img/room_1.jpg" alt="Room 1" />
                    <h4>Minimalist Rooms</h4>
                    <p>Lorem ipsum dolor sit amet meta</p>
                    <div class="utilities">
                        <div class="icons">
                            <div class="row">
                                <span>👤 1 Person</span>
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
                    <div class="price-book">
                        <div>4.500.000 đ/Night</div>
                        <button class="book-btn">Book Now</button>
                    </div>
                </div>

                <div class="room-card">
                    <img src="/img/room_2.jpg" alt="Room 2" />
                    <h4>Natural Wood Rooms</h4>
                    <p>Lorem ipsum dolor sit amet meta</p>
                    <div class="utilities">
                        <div class="icons">
                            <div class="row">
                                <span>👤 1 Person</span>
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
                    <div class="price-book">
                        <div>5.500.000 đ/Night</div>
                        <button class="book-btn">Book Now</button>
                    </div>
                </div>

                <div class="room-card">
                    <img src="/img/room_3.jpg" alt="Room 3" />
                    <h4>Green Light Rooms</h4>
                    <p>Lorem ipsum dolor sit amet meta</p>
                    <div class="utilities">
                        <div class="icons">
                            <div class="row">
                                <span>👤 1 Person</span>
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
                    <div class="price-book">
                        <div>6.500.000 đ/Night</div>
                        <button class="book-btn">Book Now</button>
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
        </div>

    </section>
    <Footer />
    
</template>

<script setup>
import HeaderComponent from '@/components/common/Header.vue'
import RoomDetailSlider from '@/components/common/RoomDetailSlider.vue';
import Footer from '@/components/common/Footer.vue';
</script>

<style>

</style>