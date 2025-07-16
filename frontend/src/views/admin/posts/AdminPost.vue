<template>
  <AdminLayout>
    <main class="container mt-4">
      <h2 class="mb-4">Quản lý Bài Viết</h2>

      <router-link to="/admin/posts/add" class="btn btn-primary mb-3">
        + Thêm Bài Viết
      </router-link>

      <div v-if="successMsg" class="alert alert-success">{{ successMsg }}</div>
      <div v-if="posts.length === 0 && !loading" class="alert alert-info">Chưa có bài viết nào.</div>
      <div v-if="loading" class="alert alert-warning">Đang tải bài viết...</div>

      <table v-if="posts.length > 0" class="table table-bordered">
        <thead>
          <tr>
            <th>ID</th>
            <th>Tiêu đề</th>
            <th>Tác giả</th>
            <th>Ảnh</th>
            <th>Ngày tạo</th>
            <th>Hành động</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="post in posts" :key="post.post_id">
            <td>{{ post.post_id }}</td>
            <td>{{ post.title || '(Không có tiêu đề)' }}</td>
            <td>{{ post.user?.name || 'Ẩn danh' }}</td>
            <td>
              <img
                :src="post.image || '/images/default-post.png'"
                alt="Ảnh bài viết"
                width="80"
              />
            </td>
            <td>{{ formatDate(post.created_at) }}</td>
            <td>
              <router-link
                :to="`/admin/posts/${post.post_id}/update-post`"
                class="btn btn-sm btn-warning me-1"
              >
                Sửa
              </router-link>
              <button class="btn btn-sm btn-danger" @click="deletePost(post.post_id)">Xóa</button>
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

const posts = ref([])
const successMsg = ref('')
const loading = ref(true)

onMounted(async () => {
  try {
    const res = await axios.get('/posts')
    const data = res.data
    posts.value = Array.isArray(data)
      ? data
      : Array.isArray(data.data)
      ? data.data
      : []
  } catch (err) {
    console.error('Lỗi khi tải bài viết:', err)
  } finally {
    loading.value = false
  }
})

const formatDate = (dateStr) => {
  const date = new Date(dateStr)
  return isNaN(date) ? 'Không xác định' : date.toLocaleDateString('vi-VN')
}

const deletePost = async (id) => {
  if (!confirm('Bạn có chắc muốn xóa bài viết này?')) return
  try {
    await axios.delete(`/posts/${id}`)
    posts.value = posts.value.filter(post => post.post_id !== id)
    successMsg.value = 'Xóa bài viết thành công!'
  } catch (err) {
    console.error('Lỗi khi xóa bài viết:', err)
  }
}
</script>
