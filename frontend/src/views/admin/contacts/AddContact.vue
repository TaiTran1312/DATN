<template>
  <AdminLayout>
    <main class="container mt-4">
      <h2 class="mb-4">Thêm liên hệ mới</h2>

      <form @submit.prevent="handleSubmit">
        <div v-if="successMsg" class="alert alert-success">{{ successMsg }}</div>
        <div v-if="errorMsg" class="alert alert-danger">{{ errorMsg }}</div>

        <div class="mb-3">
          <label for="name" class="form-label">Họ tên</label>
          <input
            v-model="form.name"
            type="text"
            class="form-control"
            id="name"
            name="name"
            required
            autocomplete="name"
          />
        </div>

        <div class="mb-3">
          <label for="email" class="form-label">Email</label>
          <input
            v-model="form.email"
            type="email"
            class="form-control"
            id="email"
            name="email"
            required
            autocomplete="email"
          />
        </div>

        <div class="mb-3">
          <label for="subject" class="form-label">Tiêu đề</label>
          <input
            v-model="form.subject"
            type="text"
            class="form-control"
            id="subject"
            name="subject"
            required
            autocomplete="off"
          />
        </div>

        <div class="mb-3">
          <label for="message" class="form-label">Nội dung</label>
          <textarea
            v-model="form.message"
            class="form-control"
            id="message"
            name="message"
            rows="5"
            required
          ></textarea>
        </div>

        <button type="submit" class="btn btn-success">Thêm liên hệ</button>
        <router-link to="/admin/contact" class="btn btn-secondary ms-2">Quay lại</router-link>
      </form>
    </main>
  </AdminLayout>
</template>

<script setup>
import { ref } from 'vue'
import { useRouter } from 'vue-router'
import axios from '@/axios'
import AdminLayout from '@/Layouts/AdminLayout.vue'

const router = useRouter()

const form = ref({
  name: '',
  email: '',
  subject: '',
  message: ''
})

const errorMsg = ref('')
const successMsg = ref('')

const handleSubmit = async () => {
  errorMsg.value = ''
  successMsg.value = ''
  try {
    const res = await axios.post('/contacts', form.value)
    successMsg.value = 'Liên hệ đã được tạo thành công!'
    // Optionally reset form
    form.value = {
      name: '',
      email: '',
      subject: '',
      message: ''
    }
    // Nếu muốn quay lại danh sách sau khi thêm:
    // router.push('/admin/contact')
  } catch (err) {
    console.error('Lỗi khi tạo liên hệ:', err)
    errorMsg.value =
      err.response?.data?.message || 'Không thể tạo liên hệ. Vui lòng kiểm tra lại.'
  }
}
</script>
