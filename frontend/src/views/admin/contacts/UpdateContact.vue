<template>
  <AdminLayout>
    <main class="container mt-4">
      <h2>Cập nhật liên hệ</h2>

      <form @submit.prevent="handleUpdate">
        <div class="mb-3">
          <label for="name">Họ tên</label>
          <input v-model="form.name" type="text" class="form-control" id="name" required />
        </div>
        <div class="mb-3">
          <label for="email">Email</label>
          <input v-model="form.email" type="email" class="form-control" id="email" required />
        </div>
        <div class="mb-3">
          <label for="subject">Tiêu đề</label>
          <input v-model="form.subject" type="text" class="form-control" id="subject" required />
        </div>
        <div class="mb-3">
          <label for="message">Nội dung</label>
          <textarea v-model="form.message" class="form-control" id="message" rows="4" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Cập nhật</button>
        <router-link to="/admin/contact" class="btn btn-secondary ms-2">Hủy</router-link>
      </form>

      <div v-if="errorMsg" class="alert alert-danger mt-3">{{ errorMsg }}</div>
    </main>
  </AdminLayout>
</template>

<script setup>
import { ref, onMounted } from 'vue'
import { useRouter, useRoute } from 'vue-router'
import axios from '@/axios'
import AdminLayout from '@/Layouts/AdminLayout.vue'

const router = useRouter()
const route = useRoute()
const errorMsg = ref('')
const form = ref({
  name: '',
  email: '',
  subject: '',
  message: ''
})

onMounted(async () => {
  try {
    const res = await axios.get(`/contacts/${route.params.id}`)
    console.log('Dữ liệu liên hệ:', res.data)
    form.value = res.data
  } catch (err) {
    errorMsg.value = 'Không thể tải dữ liệu liên hệ.'
    console.error(err)
  }
})


const handleUpdate = async () => {
  try {
    await axios.put(`/contacts/${route.params.id}`, form.value)
    router.push('/admin/contact')
  } catch (err) {
    errorMsg.value = 'Cập nhật không thành công.'
    console.error(err)
  }
}
</script>
