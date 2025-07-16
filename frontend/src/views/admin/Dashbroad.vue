<template>
  <AdminLayout>
    <!-- Main content -->
    <main class="main">
        <h1 class="title">Thống Kê</h1>

        <div class="cart-chart">
            <!-- Stats Cards -->
            <div class="stats">
            <div class="card-row">
                <div class="card">Active Users<br><strong>27/80</strong></div>
                <div class="card">Questions Answered<br><strong>3,298</strong></div>
                <div class="card">Av. Session Length<br><strong>2m 34s</strong></div>
            </div>
            <div class="card-row">
                <div class="card">Starting Knowledge<br><strong>64%</strong></div>
                <div class="card">Current Knowledge<br><strong>86%</strong></div>
                <div class="card">Knowledge Gain<br><strong>+34%</strong></div>
            </div>
            </div>

            <!-- Chart Box -->
            <div class="chart">
            <h3>Biểu đồ thống kê</h3>
            <div class="fake-chart">
                <BarChart/>

            </div>
            </div>
        </div>


        <!-- Leaderboards -->
        <div class="leaderboards">
            <div class="leaderboard">
                <h3>User Leaderboard</h3>
                <ul>
                    <li>
                    <img src="/img/image (6).png" alt="">
                    <div>
                        <strong>Jesse Thomas</strong><br>637 điểm – 98%
                    </div>
                    </li>
                    <li>
                    <img src="/img/image (6).png" alt="">
                    <div>Thisal Mathisyahzhaegen</div>
                    </li>
                    <li>
                    <img src="/img/image (6).png" alt="">
                    <div>Helen Chuang</div>
                    </li>
                    <li>
                    <img src="/img/image (6).png" alt="">
                    <div>Laura Silverman</div>
                    </li>
                    <li>
                    <img src="/img/image (6).png" alt="">
                    <div>Wilfred Orton</div>
                    </li>
                </ul>
            </div>
            <div class="leaderboard">
                <h3>Groups Leaderboard</h3>
                <ul>
                    <li>Houston Facility</li>
                    <li>Test Group</li>
                    <li>Sales Leadership</li>
                    <li>Northeast Region</li>
                    <li>Southeast Region</li>
                </ul>
            </div>
        </div>


    </main>
  </AdminLayout>
</template>

<script setup>
import AdminLayout from '@/Layouts/AdminLayout.vue'
import BarChart from '@/components/admin/BarChart.vue';
</script>

<style>

</style>