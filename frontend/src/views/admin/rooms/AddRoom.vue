<template>
  <AdminLayout>
    <main class="container mt-4">
      <h2 class="mb-4">Thêm Phòng Mới</h2>

      <form @submit.prevent="createRoom" enctype="multipart/form-data">
        <!-- Tên phòng -->
        <div class="mb-3">
          <label for="roomName">Tên phòng</label>
          <input id="roomName" v-model="form.name" type="text" class="form-control" required />
        </div>

        <!-- Mô tả -->
        <div class="mb-3">
          <label for="description">Mô tả</label>
          <textarea id="description" v-model="form.description" class="form-control" rows="3" />
        </div>

        <!-- Giá -->
        <div class="mb-3">
          <label for="price">Giá</label>
          <input id="price" v-model.number="form.price" type="number" class="form-control" required />
        </div>

        <!-- Sức chứa -->
        <div class="mb-3">
          <label for="guests">Sức chứa</label>
          <input id="guests" v-model.number="form.max_guests" type="number" class="form-control" required />
        </div>

        <!-- Loại phòng -->
        <div class="mb-3">
          <label for="type">Loại phòng</label>
          <select id="type" v-model.number="form.room_type_id" class="form-control" required :disabled="roomTypes.length === 0">
            <option disabled value="">-- Chọn loại phòng --</option>
            <option v-for="type in roomTypes" :key="type.room_type_id" :value="Number(type.room_type_id)">
              {{ type.name }}
            </option>
          </select>
        </div>

        <!-- Trạng thái -->
        <div class="mb-3">
          <label for="status">Trạng thái</label>
          <select id="status" v-model="form.status" class="form-control" required>
            <option value="available">Hiển thị</option>
            <option value="unavailable">Ẩn</option>
          </select>
        </div>

        <!-- Ảnh chính -->
        <div class="mb-3">
          <label for="mainImage">Ảnh chính</label>
          <input id="mainImage" type="file" class="form-control" accept="image/*" @change="handleMainImage" />
        </div>

        <!-- Ảnh phụ -->
        <div class="mb-3">
          <label for="gallery">Ảnh phụ (nhiều ảnh)</label>
          <input id="gallery" type="file" class="form-control" accept="image/*" multiple @change="handleGalleryImages" />
        </div>

        <!-- Nút lưu -->
        <button type="submit" class="btn btn-primary">Lưu phòng</button>
        <router-link to="/admin/room" class="btn btn-secondary ms-2">Quay lại</router-link>

        <!-- Thông báo -->
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
const roomTypes = ref([])
const successMsg = ref('')
const errorMsg = ref('')
const mainImage = ref(null)
const galleryImages = ref([])

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
    roomTypes.value = res.data?.data || res.data || []
    // Nếu có loại phòng thì gán loại đầu tiên làm mặc định
    if (roomTypes.value.length > 0) {
      form.value.room_type_id = Number(roomTypes.value[0].room_type_id || roomTypes.value[0].id)
    }
  } catch (err) {
    errorMsg.value = 'Không tải được danh sách loại phòng.'
    console.error('Lỗi:', err.response?.data || err)
  }
})

const handleMainImage = (e) => {
  mainImage.value = e.target.files[0]
}

const handleGalleryImages = (e) => {
  galleryImages.value = Array.from(e.target.files)
}

const createRoom = async () => {
  successMsg.value = ''
  errorMsg.value = ''

  try {
    const data = new FormData()
    for (const [key, val] of Object.entries(form.value)) {
      data.append(key, val)
    }

    if (mainImage.value) {
      data.append('image', mainImage.value)
    }

    galleryImages.value.forEach((file) => {
      data.append('gallery[]', file)
    })

    // Đúng route cần gọi → phù hợp với Laravel
    await axios.post('/rooms', data)

    successMsg.value = '✅ Thêm phòng thành công!'
    setTimeout(() => router.push('/admin/room'), 1500)
  } catch (err) {
    errorMsg.value = err.response?.data?.message || 'Lỗi khi thêm phòng.'
    console.error('Chi tiết:', err.response?.data || err)
  }
}
const getImageSrc = (url) => {
  if (!url) return '/img/default-room.jpg'
  if (url.startsWith('http') || url.startsWith('/storage')) return url
  return `/storage/rooms/${url}`
}

</script>

<style scoped>
/* Giữ nguyên giao diện hiện tại */
</style>
