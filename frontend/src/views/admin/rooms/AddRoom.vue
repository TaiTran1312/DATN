<template>
  <AdminLayout>
    <main class="container mt-4">
      <h2 class="mb-4">Thêm Phòng Mới</h2>

      <form @submit.prevent="createRoom">
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
          <input v-model.number="form.price" type="number" class="form-control" required />
        </div>

        <div class="mb-3">
          <label>Sức chứa</label>
          <input v-model.number="form.max_guests" type="number" class="form-control" required />
        </div>

        <div class="mb-3">
          <label>Loại phòng</label>
          <select v-model.number="form.room_type_id" class="form-control" required :disabled="roomTypes.length === 0">
            <option disabled value="">-- Chọn loại phòng --</option>
            <option v-for="type in roomTypes" :key="type.id" :value="type.id">
              {{ type.name }}
            </option>
          </select>
        </div>

        <div class="mb-3">
          <label>Trạng thái</label>
          <select v-model="form.status" class="form-control" required>
            <option value="available">Hiển thị</option>
            <option value="unavailable">Ẩn</option>
          </select>
        </div>

        <button type="submit" class="btn btn-primary">Lưu phòng</button>
        <router-link to="/admin/room" class="btn btn-secondary ms-2">Quay lại</router-link>
        <div v-if="successMsg" class="alert alert-success mt-3">{{ successMsg }}</div>
        <div v-if="errorMsg" class="alert alert-danger mt-3">{{ errorMsg }}</div>
      </form>
    </main>
  </AdminLayout>
</template>

<script setup>
import { ref, onMounted } from 'vue'
import { useRouter } from 'vue-router'
import axios from '@/axios'
import AdminLayout from '@/Layouts/AdminLayout.vue'

const router = useRouter()
const successMsg = ref('')
const errorMsg = ref('')
const roomTypes = ref([])

const form = ref({
  name: '',
  description: '',
  price: '',
  max_guests: '',
  room_type_id: '',
  status: 'available'
})

onMounted(async () => {
  try {
    const res = await axios.get('/room-types')
    roomTypes.value = res.data

    // Gán loại phòng đầu tiên làm mặc định nếu muốn:
    if (roomTypes.value.length > 0) {
      form.value.room_type_id = roomTypes.value[0].id
    }
  } catch (err) {
    errorMsg.value = 'Không tải được danh sách loại phòng.'
    console.error(err)
  }
})

const createRoom = async () => {
  successMsg.value = ''
  errorMsg.value = ''
  if (!form.value.room_type_id) {
    errorMsg.value = 'Vui lòng chọn loại phòng.'
    return
  }

  try {
    await axios.post('/rooms', form.value)
    successMsg.value = 'Thêm phòng thành công!'
    setTimeout(() => router.push('/admin/rooms'), 1500)
  } catch (err) {
    errorMsg.value = err.response?.data?.message || 'Lỗi khi thêm phòng.'
    console.error('Chi tiết:', err.response?.data || err)
  }
}
</script>
