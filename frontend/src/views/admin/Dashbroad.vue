<template>
  <AdminLayout>
    <main class="container mt-4">
      <h2 class="mb-4">Tổng Quan Hệ Thống</h2>

      <!-- Thống kê nhanh -->
      <div class="row mb-4">
        <div class="col-md-4" v-for="(item, i) in statCards" :key="i">
          <div class="card shadow-sm p-3 mb-3 text-center">
            <div class="fs-5">{{ item.label }}</div>
            <div class="fw-bold display-6">{{ item.value }}</div>
          </div>
        </div>
      </div>

      <!-- Biểu đồ -->
      <div class="card shadow-sm mb-4">
        <div class="card-body">
          <h5 class="card-title">Biểu đồ thống kê</h5>
          <BarChart :chart-data="chartData" />
        </div>
      </div>

      <!-- Bảng xếp hạng -->
      <div class="row">
        <div class="col-md-6">
          <div class="card shadow-sm mb-3">
            <div class="card-body">
              <h5>User Leaderboard</h5>
              <ul class="list-group">
                <li class="list-group-item d-flex align-items-center" v-for="user in topUsers" :key="user.id">
                  <img :src="getImageSrc(user.avatar)" class="rounded-circle me-2" style="width: 40px; height: 40px;" />
                  <div>{{ user.name }} – {{ user.score }} điểm</div>
                </li>
              </ul>
            </div>
          </div>
        </div>

        <div class="col-md-6">
          <div class="card shadow-sm mb-3">
            <div class="card-body">
              <h5>Groups Leaderboard</h5>
              <ul class="list-group">
                <li class="list-group-item" v-for="group in topGroups" :key="group">{{ group }}</li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </main>
  </AdminLayout>
</template>

<script setup>
import { ref, onMounted } from 'vue'
import axios from '@/axios'
import AdminLayout from '@/Layouts/AdminLayout.vue'
import BarChart from '@/components/admin/BarChart.vue'

const statCards = ref([])
const chartData = ref({})
const topUsers = ref([])
const topGroups = ref([])

const getImageSrc = (url) => {
  if (!url) return '/img/default-avatar.jpg'
  if (url.startsWith('http') || url.startsWith('/storage')) return url
  return `/storage/users/${url}`
}

onMounted(async () => {
  try {
    // Thống kê tổng quan
    const stats = await axios.get('/dashboard/stats')
    statCards.value = [
      { label: 'Tổng số phòng', value: stats.data.total_rooms },
      { label: 'Tổng người dùng', value: stats.data.total_users },
      { label: 'Tổng lượt đặt', value: stats.data.total_bookings }
    ]

    // Nếu backend có biểu đồ
    const chart = await axios.get('/dashboard/chart')
    chartData.value = chart.data

    // Lấy bảng xếp hạng
    const usersRes = await axios.get('/dashboard/users')
    topUsers.value = usersRes.data || []

    const groupsRes = await axios.get('/dashboard/groups')
    topGroups.value = groupsRes.data || []
  } catch (err) {
    console.error('❌ Lỗi khi tải dashboard:', err.response?.data || err)
  }
})
</script>

<style scoped>
.card-title {
  font-weight: 600;
}
.list-group-item {
  font-size: 16px;
}
</style>
