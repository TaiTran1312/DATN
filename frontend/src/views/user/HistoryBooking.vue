<template>
  <section class="hero-wapper-service">
        <HeaderComponent />

        <div class="hero">HISTORY BOOKING</div>
    </section>
    <section class="container">
        <h1 class="hisbooking-title">LỊCH SỬ ĐẶT PHÒNG</h1>

        <div class="filter">
            <label for="status">Trạng thái phòng:</label>
            <select id="status">
                <option value="all">Tất cả</option>
                <option value="confirmed">Confirmed</option>
                <option value="completed">Completed</option>
            </select>
        </div>

        <table>
            <thead>
                <tr>
                    <th>MÃ PHÒNG</th>
                    <th>TÊN PHÒNG</th>
                    <th>LOẠI PHÒNG</th>
                    <th>NGÀY NHẬN</th>
                    <th>NGÀY TRẢ</th>
                    <th>GIÁ</th>
                    <th>TRẠNG THÁI</th>
                    <th>THAO TÁC</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>001</td>
                    <td><strong>Hight Darkblue Rooms</strong></td>
                    <td>Deluxe</td>
                    <td>12/10/2024 11:05:38</td>
                    <td>12/10/2024 11:05:38</td>
                    <td><strong>2,140,000 đ</strong></td>
                    <td>Confirmed</td>
                    <td><button class="delete-btn">Delete</button></td>
                </tr>
                <tr>
                    <td>002</td>
                    <td><strong>Simple Chess Rooms</strong></td>
                    <td>Standard</td>
                    <td>12/10/2024 11:05:38</td>
                    <td>12/10/2024 11:05:38</td>
                    <td><strong>2,140,000 đ</strong></td>
                    <td>Completed</td>
                    <td><button class="delete-btn">Delete</button></td>
                </tr>
            </tbody>
        </table>
    </section>
    <Footer />

</template>

<script setup>
import HeaderComponent from '@/components/common/Header.vue'
import Footer from '@/components/common/Footer.vue';

</script>

<style>

</style>