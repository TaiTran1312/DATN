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
                <select id="destination">
                    <option>Amiana Resort Sai Gon</option>
                </select>
            </div>
            <div>
                <label for="checkin">Check-in Date</label>
                <input type="date" id="checkin" value="2025-06-10">
            </div>
            <div>
                <label for="checkout">Check-out Date</label>
                <input type="date" id="checkout" value="2025-06-12">
            </div>
            <div>
                <label for="adults">Adult</label>
                <input type="number" id="adults" min="1" value="1">
                <i class="fa-solid fa-user"></i>
            </div>
            <div>
                <label for="children">Children</label>
                <input type="number" id="children" min="0" value="0">
                <i class="fa-solid fa-child"></i>
            </div>
            <div style="align-self: flex-end;">
                <button>SEARCH MY DATE</button>
            </div>
        </div>

        <div class="discover-section">
            <div class="discover-text">
                <h2>DISCOVER THE LEGEND</h2>
                <h3>Creating A Meaningful Journey With Us</h3>
                <p>
                    Welcome to 5-star luxury and dedicated service at La Vela Saigon. Modern design with classic royal
                    style will bring a magnificent experience for those people who have a passion for travel. Let’s
                    awaken your spirit. Create a whole new lifestyle with our service; from the most comfortable room to
                    a sumptuous feast. Its extensive gastronomic offerings feature several restaurants and bars; and
                    super wellness facilities, complemented by the magnificent view of Ho Chi Minh city. Everything is
                    accompanied by the urban and cosmopolitan spirit.
                </p>
            </div>
            <div class="discover-images">
                <img src="/img/home-img.png" alt="Woman 1">
            </div>
        </div>


    </section>
    <!-- show room -->
    <div class="rooms-section">
        <div class="room-home-grid">
            <div class="room-card">
                <img src="/img/room_2.jpg" alt="Room 2" />
                <h4>Natural Wood Rooms</h4>
                <p>Lorem ipsum dolor sit amet meta</p>
                <div class="utilities">
                    <div class="icons-home">
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
                <img src="/img/room_2.jpg" alt="Room 2" />
                <h4>Natural Wood Rooms</h4>
                <p>Lorem ipsum dolor sit amet meta</p>
                <div class="utilities">
                    <div class="icons-home">
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
                <img src="/img/room_2.jpg" alt="Room 2" />
                <h4>Natural Wood Rooms</h4>
                <p>Lorem ipsum dolor sit amet meta</p>
                <div class="utilities">
                    <div class="icons-home">
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
                <img src="/img/room_2.jpg" alt="Room 2" />
                <h4>Natural Wood Rooms</h4>
                <p>Lorem ipsum dolor sit amet meta</p>
                <div class="utilities">
                    <div class="icons-home">
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

            <!-- Clone similar room-card blocks for other rooms -->
        </div>
    </div>
    <section class="highlight-all">
        <h3>DISCOVER</h3>
        <h2>Destination Of Luxury Space</h2>
        <div class="highlight-section">
            <div class="highlight-text">
                <div class="highlight-left">
                    <h3>A pleasant stay</h3>
                <p>
                    At La Vela Saigon Hotel - the iconic hotel that offers 280 luxurious rooms and suites that feature
                    stylish interiors and high class. Soothing blues in each room create a relaxing ambiance that
                    provides business and leisure travelers an indulgent refuge after a day of exploring Ho Chi Minh
                    city.
                </p>
                <button>SEE MORE</button>
                </div>
            </div>
            <div class="highlight-img">
                <img src="/img/home-img-2.jpg" alt="Luxury Room">
            </div>
        </div>

        <div class="highlight-section">
            <div class="highlight-img">
                <img src="/img/home-img-2.jpg" alt="Luxury Room">
            </div>
            <div class="highlight-text">
                <div class="highlight-right">
                    <h3>A pleasant stay</h3>
                <p>
                    At La Vela Saigon Hotel - the iconic hotel that offers 280 luxurious rooms and suites that feature
                    stylish interiors and high class. Soothing blues in each room create a relaxing ambiance that
                    provides business and leisure travelers an indulgent refuge after a day of exploring Ho Chi Minh
                    city.
                </p>
                <button class="btn-highlight-right">SEE MORE</button>
                </div>
            </div>
            
        </div>
    </section>

    <section class="hotel-room-section">
    <h2>HOTEL ROOM</h2>
    <div class="slider-arrows">
      <span class="slider-arrow" onclick="scrollSlider(-1)"><i class="fas fa-chevron-left"></i></span>
      <span class="slider-arrow" onclick="scrollSlider(1)"><i class="fas fa-chevron-right"></i></span>
    </div>
    <div class="room-slider" id="roomSlider">
      <div class="room-box">
        <img src="/img/home-img-4.jpg" alt="Room 1">
        <h4>SUPERIOR ROOM</h4>
        <p>Enjoy generous size of Executive in 36 m2 with modern decor and ergonomic comfort. Rain shower and bathtub, free WIFI, sauna, jacuzzi and access to Fitness center.</p>
      </div>
      <div class="room-box">
        <img src="/img/home-img-5.jpg" alt="Room 2">
        <h4>SUPERIOR ROOM</h4>
        <p>Enjoy generous size of Executive in 36 m2 with modern decor and ergonomic comfort. Rain shower and bathtub, free WIFI, sauna, jacuzzi and access to Fitness center.</p>
      </div>
      <div class="room-box">
        <img src="/img/home-img-6.jpg" alt="Room 3">
        <h4>SUPERIOR ROOM</h4>
        <p>Enjoy generous size of Executive in 36 m2 with modern decor and ergonomic comfort. Rain shower and bathtub, free WIFI, sauna, jacuzzi and access to Fitness center.</p>
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