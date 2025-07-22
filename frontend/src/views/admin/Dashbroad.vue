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
import AdminLayout from '@/Layouts/AdminLayout.vue'
import BarChart from '@/components/admin/BarChart.vue'
import { ref, onMounted } from 'vue'

const statCards = ref([
  { label: 'Active Users', value: '27 / 80' },
  { label: 'Questions Answered', value: '3,298' },
  { label: 'Av. Session Length', value: '2m 34s' },
  { label: 'Starting Knowledge', value: '64%' },
  { label: 'Current Knowledge', value: '86%' },
  { label: 'Knowledge Gain', value: '+34%' }
])

const chartData = ref({}) // Có thể truyền dữ liệu dạng { labels: [...], datasets: [...] }

const topUsers = ref([
  { id: 1, name: 'Jesse Thomas', score: 637, avatar: 'user1.jpg' },
  { id: 2, name: 'Thisal M.', score: 598, avatar: 'user2.jpg' },
  { id: 3, name: 'Helen Chuang', score: 542, avatar: 'user3.jpg' }
])

const topGroups = ref([
  'Houston Facility',
  'Test Group',
  'Sales Leadership',
  'Northeast Region',
  'Southeast Region'
])

const getImageSrc = (url) => {
  if (!url) return '/img/default-avatar.jpg'
  if (url.startsWith('http') || url.startsWith('/storage')) return url
  return `/storage/users/${url}`
}

// Nếu dùng API thật:
// onMounted(async () => {
//   const res = await axios.get('/dashboard/stats')
//   statCards.value = res.data.stats
//   chartData.value = res.data.chart
//   topUsers.value = res.data.users
// })
</script>

<style scoped>
.card-title {
  font-weight: 600;
}
.list-group-item {
  font-size: 16px;
}
</style>
