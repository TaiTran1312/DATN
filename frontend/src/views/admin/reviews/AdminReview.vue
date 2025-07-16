<template>
  <AdminLayout>
    <main class="container mt-4">
      <h2 class="mb-4">Quản lý Đánh Giá</h2>

      <router-link to="/admin/reviews/add" class="btn btn-primary mb-3">
        + Thêm Đánh Giá
      </router-link>

      <div v-if="successMsg" class="alert alert-success">{{ successMsg }}</div>
      <div v-if="loading" class="alert alert-warning">Đang tải đánh giá...</div>
      <div v-if="!loading && reviews.length === 0" class="alert alert-info">Chưa có đánh giá nào.</div>

      <table v-if="reviews.length > 0" class="table table-bordered">
        <thead>
          <tr>
            <th>ID</th>
            <th>Người dùng</th>
            <th>Phòng</th>
            <th>Đơn hàng</th>
            <th>Điểm</th>
            <th>Nội dung</th>
            <th>Ngày tạo</th>
            <th>Hành động</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="review in reviews" :key="review.review_id">
            <td>{{ review.review_id }}</td>
            <td>{{ review.user?.name || 'Ẩn danh' }}</td>
            <td>{{ review.room_id ?? '-' }}</td>
            <td>{{ review.order_id ?? '-' }}</td>
            <td>
              <span :class="review.rating >= 4 ? 'text-success' : 'text-warning'">
                {{ review.rating }} ★
              </span>
            </td>
            <td>{{ review.content || '(Không có nội dung)' }}</td>
            <td>{{ formatDate(review.created_at) }}</td>
            <td>
              <router-link
                :to="`/admin/reviews/${review.review_id}/update-review`"
                class="btn btn-sm btn-warning me-1"
              >
                Sửa
              </router-link>
              <button class="btn btn-sm btn-danger" @click="deleteReview(review.review_id)">
                Xóa
              </button>
            </td>
          </tr>
        </tbody>
      </table>
    </main>
  </AdminLayout>
</template>

<script setup>
import { ref, onMounted } from 'vue'
import axios from '@/axios'
import AdminLayout from '@/Layouts/AdminLayout.vue'

const reviews = ref([])
const successMsg = ref('')
const loading = ref(true)

onMounted(async () => {
  try {
    const res = await axios.get('/reviews')
    const data = res.data
    reviews.value = Array.isArray(data)
      ? data
      : Array.isArray(data.data)
      ? data.data
      : []
    console.log('✅ Dữ liệu đánh giá:', reviews.value)
  } catch (err) {
    console.error('❌ Lỗi khi tải đánh giá:', err)
  } finally {
    loading.value = false
  }
})

const formatDate = (str) => {
  const d = new Date(str)
  return isNaN(d) ? 'Không xác định' : d.toLocaleDateString('vi-VN')
}

const deleteReview = async (id) => {
  if (!confirm('Bạn có chắc muốn xóa đánh giá này?')) return
  try {
    await axios.delete(`/reviews/${id}`)
    reviews.value = reviews.value.filter(r => r.review_id !== id)
    successMsg.value = 'Xóa đánh giá thành công!'
  } catch (err) {
    console.error('❌ Lỗi khi xóa đánh giá:', err)
  }
}
</script>
