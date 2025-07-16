<template>
  <AdminLayout>
    <main class="container mt-4">
      <h2 class="mb-4">Quản lý Bình Luận</h2>

      <router-link to="/admin/comments/add" class="btn btn-primary mb-3">
        + Thêm Bình Luận
      </router-link>

      <div v-if="successMsg" class="alert alert-success">{{ successMsg }}</div>
      <div v-if="comments.length === 0 && !loading" class="alert alert-info">Chưa có bình luận nào.</div>
      <div v-if="loading" class="alert alert-warning">Đang tải bình luận...</div>

      <table v-if="comments.length > 0" class="table table-bordered">
        <thead>
          <tr>
            <th>ID</th>
            <th>Người dùng</th>
            <th>Nội dung</th>
            <th>Ngày tạo</th>
            <th>Hành động</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="comment in comments" :key="comment.id">
            <td>{{ comment.id }}</td>
            <td>{{ comment.user?.name || 'Ẩn danh' }}</td>
            <td>{{ comment.body || '(Không có nội dung)' }}</td>
            <td>{{ formatDate(comment.created_at) }}</td>
            <td>
              <router-link
                :to="`/admin/comments/${comment.id}/update-comment`"
                class="btn btn-sm btn-warning me-1"
              >
                Sửa
              </router-link>
              <button class="btn btn-sm btn-danger" @click="deleteComment(comment.id)">
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

const comments = ref([])
const successMsg = ref('')
const loading = ref(true)

onMounted(async () => {
  try {
    const res = await axios.get('/comments')
    const data = res.data
    comments.value = Array.isArray(data)
      ? data
      : Array.isArray(data.data)
      ? data.data
      : []
  } catch (err) {
    console.error('Lỗi khi tải bình luận:', err)
  } finally {
    loading.value = false
  }
})

const formatDate = (str) => {
  const d = new Date(str)
  return isNaN(d) ? 'Không xác định' : d.toLocaleDateString('vi-VN')
}

const deleteComment = async (id) => {
  if (!confirm('Bạn có chắc muốn xóa bình luận này?')) return
  try {
    await axios.delete(`/comments/${id}`)
    comments.value = comments.value.filter(c => c.id !== id)
    successMsg.value = 'Xóa bình luận thành công!'
  } catch (err) {
    console.error('Lỗi khi xóa bình luận:', err)
  }
}
</script>
