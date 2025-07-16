<template>
    <section class="hero-wapper-blog">
        <HeaderComponent />
            

        <div class="hero">OUR BLOG</div>
    </section>
    <section class="container">
        <div class="title-detail-blog">
            <div class="image-wrapper">
                <img src="/img/blog-room-1.jpg" alt="Hotel Room">
            </div>
            <div class="content">
                <h1>We give discount for<br>those of you who take<br>this package</h1>
                <div class="meta-detail-blog">Admin || June 10, 2025</div>
            </div>
        </div>
        <div class="main-container">

            <!-- Left content -->
            <div class="content-detail-blog">
                <p>
                    Utenim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                    consequat.
                    Duis aute irure dolor in reprehenderit in voluptate velit ess cillum dolore eu fugiat nulla
                    pariatur.
                    Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id
                    est laborum.
                </p>
                <br>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore
                    et dolore magna aliqua.
                    Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                    consequat.
                    Duis aute irure dolor in reprehenderit in voluptate velit ess cillum dolore eu fugiat nulla
                    pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit
                    anim id est laborum.</p>

                <div class="img-detail">
                    <img src="/img/blog-room-1.jpg" alt="Room 1">
                    <img src="/img/blog-room-2.jpg" alt="Room 2">
                </div>

                <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                    consequat.
                    Duis aute irure dolor in reprehenderit in voluptate velit ess cillum dolore eu fugiat nulla
                    pariatur.
                    Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id
                    est laborum.</p>

                <div class="quote">
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut
                        labore et dolore magna aliqua.
                        Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                        consequat.</p>
                    <div class="author">John Doe</div>
                </div>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore
                    et dolore magna aliqua.
                    Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                    consequat.
                    Duis aute irure dolor in reprehenderit in voluptate velit ess cillum dolore eu fugiat nulla
                    pariatur.
                    Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id
                    est laborum.</p>
                <br>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore
                    et dolore magna aliqua.
                    Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                    consequat.
                    Duis aute irure dolor in reprehenderit in voluptate velit ess cillum dolore eu fugiat nulla
                    pariatur.
                    Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id
                    est laborum.
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore
                    et dolore magna aliqua.
                    Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                    consequat.</p>

                <!-- Comment -->
                <div class="comment-social">
                    <h4>Share post</h4>
                    <div class="social-icons">
                        <img src="https://cdn-icons-png.flaticon.com/24/733/733547.png" alt="Facebook">
                        <img src="https://cdn-icons-png.flaticon.com/24/733/733558.png" alt="Instagram">
                        <img src="https://cdn-icons-png.flaticon.com/24/1384/1384015.png" alt="Pinterest">
                    </div>
                    <h4>Comment blog</h4>
                    <form action="" class="comment-form">
                        <label for="" class="form-label">Message</label><br>
                        <textarea name="" id="" class=""></textarea><br>

                        <label for="" class="form-label">Name</label><br>
                        <input type="text"><br>

                        <label for="" class="form-label">Email</label><br>
                        <input type="email" name="" id=""><br>

                        <input type="button" class="book-btn" value="Post Comment">
                    </form>



                </div>
            </div>
            <!-- Sidebar -->
            <div class="sidebar-blog">
                <h2>Latest Post</h2>

                <div class="latest-post">
                    <img src="/img/blog-room-1.jpg" alt="">
                    <p>Thank you for those of you who chose our hotel, we are happy</p>
                </div>

                <div class="latest-post">
                    <img src="/img/blog-room-2.jpg" alt="">
                    <p>Thank you for those of you who chose our hotel, we are happy</p>
                </div>

                <div class="latest-post">
                    <img src="/img/blog-room-3.jpg" alt="">
                    <p>Thank you for those of you who chose our hotel, we are happy</p>
                </div>

                <div class="latest-post">
                    <img src="/img/blog-room-4.jpg" alt="">
                    <p>Thank you for those of you who chose our hotel, we are happy</p>
                </div>

                <div class="latest-post">
                    <img src="/img/blog-room-5.jpg" alt="">
                    <p>Thank you for those of you who chose our hotel, we are happy</p>
                </div>

                <div class="latest-post">
                    <img src="/img/blog-room-6.jpg" alt="">
                    <p>Thank you for those of you who chose our hotel, we are happy</p>
                </div>
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