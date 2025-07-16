<template>
  <AdminLayout>
    <main class="container mt-4">
      <h2>Cập nhật Bình Luận</h2>
      <form @submit.prevent="updateComment">
        <div class="mb-3">
          <label>Nội dung</label>
          <textarea v-model="form.body" class="form-control" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Cập nhật</button>
        <div v-if="successMsg" class="alert alert-success mt-3">{{ successMsg }}</div>
      </form>
    </main>
  </AdminLayout>
</template>

<script setup>
import { ref, onMounted } from 'vue'
import { useRoute } from 'vue-router'
import axios from '@/axios'
import AdminLayout from '@/Layouts/AdminLayout.vue'

const route = useRoute()
const commentId = route.params.id

const form = ref({ body: '' })
const successMsg = ref('')

onMounted(async () => {
  try {
    const res = await axios.get(`/comments/${commentId}`)
    form.value.body = res.data.body
  } catch (err) {
    console.error('Lỗi khi tải bình luận:', err)
  }
})

const updateComment = async () => {
  try {
    await axios.put(`/comments/${commentId}`, form.value)
    successMsg.value = 'Cập nhật bình luận thành công!'
  } catch (err) {
    console.error('Lỗi khi cập nhật bình luận:', err)
  }
}
</script>
