<template>
    <HeaderComponent />
    <div class="login">
        <div class="thumb-login">
            <img src="/img/logo 1.png" alt="">
            <h3>Chào mừng đến với THE REVERIE SAIGON</h3>
        </div>
        <div class="container-login">
            <h2>Đăng nhập</h2>
            <form>
                <div class="form-group">
                <label>Email / Số điện thoại di động</label>
                <input type="email" placeholder="0901234567 hoặc email@mail.com" />
                </div>
                <div class="form-group password-group">
                <label>Mật khẩu</label>
                <input type="password" />
                </div>

                <button type="submit" class="submit-btn">Đăng nhập</button>
            </form>

            <div class="divider">HOẶC</div>

            <div class="social-btns">
                <button><img src="https://cdn-icons-png.flaticon.com/512/124/124010.png" alt="facebook" />Facebook</button>
                <button><img src="https://cdn-icons-png.flaticon.com/512/281/281764.png" alt="google" />Google</button>
            </div>
        </div>
    </div>
    <Footer />

</template>

<script setup>
import HeaderComponent from '@/components/common/Header.vue'
import Footer from '@/components/common/Footer.vue';
</script>

<style scoped>
header{
  background: #000;
}
</style>