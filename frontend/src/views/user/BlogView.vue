<template>
    <section class="hero-wapper-blog">
        <HeaderComponent />


        <div class="hero">OUR BLOG</div>
    </section>
    <div class="section-title">Welcome to Our Blog</div>
    <p class="description">
        Stay updated with the latest news, travel tips, and local insights from our hotel. We'll share everything you
        need to make your next stay unforgettable.
    </p>

    <section class="container">
        <h3 class="recomen-post">Recomendation Post</h3>
        <div class="image-blog">
            <div class="image-blog-left">
                <img src="/img/blog-room-1.jpg" alt="">
                <router-link to="/blogdetail" class="recomen-post-title">
                    <span >This is what you should bring when you travel far</span>
                </router-link><br>
                <span class="recomen-post-day">Admin || April 6, 2023</span>
            </div>
            <div class="image-blog-right">
                <img src="/img/blog-room-2.jpg" alt="">
                <router-link to="/blogdetail" class="recomen-post-title">
                    <span >This is what you should bring when you travel far</span>
                </router-link><br>
                <span class="recomen-post-day">Admin || April 6, 2023</span>
            </div>
        </div>
        <div class="new-post">
            <h2 class="recomen-post">Latest News Post</h2>
            <div class="news-grid">
                <div class="news-card">
                    <img src="/img/blog-room-3.jpg" alt="News Image">
                    <router-link to="/blogdetail" class="blog-title">
                        <h4>Thank you for those of you who chose our hotel, we are happy</h4>
                    </router-link>
                    <div class="news-meta">June 26, 2025 | No Comments</div>
                    <p>We’re so glad you chose to stay with us. We hope you had a wonderful time and look forward to
                        seeing
                        you again soon!</p>
                </div>
                <div class="news-card">
                    <img src="/img/blog-room-4.jpg" alt="News Image">
                    <router-link to="/blogdetail" class="blog-title">
                        <h4>We provide a sports venue for those of you who stay overnight</h4>
                    </router-link>
                    <div class="news-meta">June 26, 2025 | No Comments</div>
                    <p>We’re so glad you chose to stay with us. We hope you had a wonderful time and look forward to
                        seeing
                        you again soon!</p>
                </div>
                <div class="news-card">
                    <img src="/img/blog-room-5.jpg" alt="News Image">
                    <router-link to="/blogdetail" >
                        <router-link to="/blogdetail" class="blog-title">
                            <h4>A Taste of Saigon: Your Essential Guide to Local Street Food</h4>
                        </router-link>                   
                    </router-link>
                    <div class="news-meta">June 26, 2025 | No Comments</div>
                    <p>We’re so glad you chose to stay with us. We hope you had a wonderful time and look forward to
                        seeing
                        you again soon!</p>
                </div>
                <div class="news-card">
                    <img src="/img/blog-room-6.jpg" alt="News Image">
                    <router-link to="/blogdetail" class="blog-title">
                       <h4>We give discount for those of you who take this package</h4>
                    </router-link>
                    <div class="news-meta">June 26, 2025 | No Comments</div>
                    <p>We’re so glad you chose to stay with us. We hope you had a wonderful time and look forward to
                        seeing
                        you again soon!</p>
                </div>
                <div class="news-card">
                    <img src="/img/blog-room-1.jpg" alt="News Image">
                    <router-link to="/blogdetail" class="blog-title">
                        <h4>This is what you should bring when you travel far</h4>
                    </router-link>
                    <div class="news-meta">June 26, 2025 | No Comments</div>
                    <p>We’re so glad you chose to stay with us. We hope you had a wonderful time and look forward to
                        seeing
                        you again soon!</p>
                </div>
                <div class="news-card">
                    <img src="/img/blog-room-2.jpg" alt="News Image">
                    <router-link to="/blogdetail" class="blog-title">
                        <h4>This is the reason why our hotel is perfect for you</h4>
                    </router-link>
                    <div class="news-meta">June 26, 2025 | No Comments</div>
                    <p>We’re so glad you chose to stay with us. We hope you had a wonderful time and look forward to
                        seeing
                        you again soon!</p>
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
import HeaderComponent from '@/components/common/Header.vue'
import Footer from '@/components/common/Footer.vue';
</script>

<style>

</style>