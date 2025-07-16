<template>
  <AdminLayout>
    <main class="container mt-4">
      <h2>Cập nhật Thông Báo</h2>
      <form @submit.prevent="updateNotification">
        <div class="mb-3">
          <label>Tiêu đề</label>
          <input v-model="form.title" type="text" class="form-control" required />
        </div>
        <div class="mb-3">
          <label>Nội dung</label>
          <textarea v-model="form.message" class="form-control" required></textarea>
        </div>
        <div class="mb-3">
          <label>Đã đọc</label>
          <select v-model="form.is_read" class="form-control">
            <option :value="true">Đã đọc</option>
            <option :value="false">Chưa đọc</option>
          </select>
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
const id = route.params.id

const form = ref({
  title: '',
  message: '',
  is_read: false
})

const successMsg = ref('')

onMounted(async () => {
  const res = await axios.get(`/notifications/${id}`)
  form.value = {
    title: res.data.title,
    message: res.data.message,
    is_read: res.data.is_read
  }
})

const updateNotification = async () => {
  await axios.put(`/notifications/${id}`, form.value)
  successMsg.value = 'Cập nhật thông báo thành công!'
}
</script>
