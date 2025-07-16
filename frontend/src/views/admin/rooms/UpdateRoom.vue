<template>
  <AdminLayout>
    <main class="container mt-4">
      <h1 class="mb-4">Cập nhật phòng</h1>

      <form @submit.prevent="updateRoom">
        <div class="mb-3">
          <label>Tên phòng</label>
          <input v-model="form.name" type="text" class="form-control" required />
        </div>

        <div class="mb-3">
          <label>Mô tả</label>
          <textarea v-model="form.description" class="form-control" rows="3"></textarea>
        </div>

        <div class="mb-3">
          <label>Giá</label>
          <input v-model="form.price" type="number" class="form-control" required />
        </div>

        <div class="mb-3">
          <label>Sức chứa</label>
          <input v-model="form.max_guests" type="number" class="form-control" />
        </div>

        <div class="mb-3">
          <label>Loại phòng</label>
          <select v-model.number="form.room_type_id" class="form-control" required>

            <option disabled value="">-- Chọn loại phòng --</option>
            <option v-for="type in roomTypes" :key="type.id" :value="type.id">
              {{ type.name }}
            </option>
          </select>
        </div>

        <div class="mb-3">
          <label>Trạng thái</label>
          <select v-model="form.status" class="form-control">
            <option value="available">Hiển thị</option>
            <option value="unavailable">Ẩn</option>
          </select>
        </div>

        <button type="submit" class="btn btn-primary" :disabled="isLoading">
          {{ isLoading ? 'Đang cập nhật...' : 'Cập nhật' }}
        </button>
          <router-link to="/admin/room" class="btn btn-secondary ms-2">Quay lại</router-link>
        <div v-if="successMsg" class="alert alert-success mt-3">{{ successMsg }}</div>
        <div v-if="errorMsg" class="alert alert-danger mt-3">{{ errorMsg }}</div>
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
const roomId = route.params.id

const form = ref({
  name: '',
  description: '',
  price: '',
  max_guests: '',
  room_type_id: '',
  status: ''
})

const roomTypes = ref([])
const successMsg = ref('')
const errorMsg = ref('')
const isLoading = ref(false)

onMounted(async () => {
  try {
    const [roomRes, typeRes] = await Promise.all([
      axios.get(`/rooms/${roomId}`),
      axios.get('/room-types')
    ])
    form.value = {
      name: roomRes.data.name,
      description: roomRes.data.description,
      price: roomRes.data.price,
      max_guests: roomRes.data.max_guests,
      room_type_id: Number(roomRes.data.room_type_id),
      status: roomRes.data.status
    }

    roomTypes.value = typeRes.data
  } catch (err) {
    errorMsg.value = 'Không lấy được thông tin phòng hoặc loại phòng.'
    console.error(err)
  }
})

const updateRoom = async () => {
  isLoading.value = true
  successMsg.value = ''
  errorMsg.value = ''
  try {
    await axios.put(`/rooms/${roomId}`, form.value)
    successMsg.value = 'Cập nhật phòng thành công!'
  } catch (err) {
    errorMsg.value = 'Lỗi khi cập nhật phòng.'
    console.error(err.response?.data || err)
  } finally {
    isLoading.value = false
  }
}
</script>
