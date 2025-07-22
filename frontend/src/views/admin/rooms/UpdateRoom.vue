<template>
  <AdminLayout>
    <main class="container mt-4">
      <h1 class="mb-4">Cập nhật phòng</h1>

      <form @submit.prevent="updateRoom" enctype="multipart/form-data">
        <!-- Tên phòng -->
        <div class="mb-3">
          <label for="roomName">Tên phòng</label>
          <input id="roomName" v-model="form.name" type="text" class="form-control" required />
        </div>

        <!-- Mô tả -->
        <div class="mb-3">
          <label for="description">Mô tả</label>
          <textarea id="description" v-model="form.description" class="form-control" rows="3"></textarea>
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
          <label for="roomType">Loại phòng</label>
          <select
            id="roomType"
            v-model.number="form.room_type_id"
            class="form-control"
            required
          >
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
          <label>Ảnh đại diện</label>
          <div v-if="previewMainImage">
            <img :src="previewMainImage" alt="Ảnh mới" style="max-width: 150px;" class="mb-2" />
          </div>
          <div v-else-if="form.image">
            <img :src="getImageSrc(form.image)" alt="Ảnh hiện tại" style="max-width: 150px;" class="mb-2" />
          </div>
          <input type="file" class="form-control" accept="image/*" @change="handleMainImage" />
        </div>

        <!-- Ảnh phụ -->
        <div class="mb-3">
          <label>Ảnh phụ hiện tại</label>
          <div class="d-flex flex-wrap gap-2 mb-2">
            <img
              v-for="(img, i) in form.gallery"
              :key="`old-${i}`"
              :src="getImageSrc(img)"
              alt="Ảnh phụ"
              style="max-width: 100px;"
            />
          </div>

          <label>Thêm ảnh phụ mới</label>
          <div v-if="previewGallery.length">
            <div class="d-flex flex-wrap gap-2 mb-2">
              <img
                v-for="(img, i) in previewGallery"
                :key="`new-${i}`"
                :src="img"
                alt="Ảnh mới"
                style="max-width: 100px;"
              />
            </div>
          </div>
          <input type="file" class="form-control" multiple accept="image/*" @change="handleGalleryImages" />
        </div>
        <!-- Nút lưu -->
        <button type="submit" class="btn btn-primary" :disabled="isLoading">
          {{ isLoading ? 'Đang cập nhật...' : 'Cập nhật' }}
        </button>
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
import { useRoute, useRouter } from 'vue-router'
import axios from '@/axios'
import AdminLayout from '@/Layouts/AdminLayout.vue'

const route = useRoute()
const router = useRouter()
const roomId = route.params.id

const form = ref({
  name: '',
  description: '',
  price: '',
  max_guests: '',
  room_type_id: '',
  status: '',
  image: '',
  gallery: []
})

const roomTypes = ref([])
const successMsg = ref('')
const errorMsg = ref('')
const isLoading = ref(false)
const mainImage = ref(null)
const galleryImages = ref([])

const previewMainImage = ref(null)
const previewGallery = ref([])

const getImageSrc = (url) => {
  if (!url) return '/img/default-room.jpg'
  return url.startsWith('http') ? url : `/img/rooms/${url}`
}

const handleMainImage = (e) => {
  const file = e.target.files[0]
  if (file) {
    mainImage.value = file
    previewMainImage.value = URL.createObjectURL(file)
  }
}

const handleGalleryImages = (e) => {
  const files = Array.from(e.target.files)
  galleryImages.value = files
  previewGallery.value = files.map((file) => URL.createObjectURL(file))
}

onMounted(async () => {
  try {
    const [roomRes, typeRes] = await Promise.all([
      axios.get(`/rooms/${roomId}`),
      axios.get('/room-types')
    ])

    const room = roomRes.data?.data || roomRes.data
    roomTypes.value = typeRes.data?.data || typeRes.data || []

    form.value = {
      name: room.name || '',
      description: room.description || '',
      price: room.price || 0,
      max_guests: room.max_guests || 1,
      status: room.status || 'available',
      image: room.image || '',
      gallery: room.gallery || [],
      room_type_id: 0
    }

    // Gán room_type_id đúng với khóa chính
    const fallbackId = roomTypes.value[0]?.room_type_id || 1
    form.value.room_type_id = room.room_type_id
      ? Number(room.room_type_id)
      : Number(fallbackId)
  } catch (err) {
    errorMsg.value = 'Không lấy được thông tin phòng hoặc loại phòng.'
    console.error('Lỗi:', err.response?.data || err)
  }
})

const updateRoom = async () => {
  isLoading.value = true
  successMsg.value = ''
  errorMsg.value = ''

  try {
    const data = new FormData()
    for (const [key, val] of Object.entries(form.value)) {
      if (key !== 'image' && key !== 'gallery') {
        data.append(key, val)
      }
    }

    if (mainImage.value) {
      data.append('image', mainImage.value)
    }

    galleryImages.value.forEach((file) => {
      data.append('gallery[]', file)
    })

    await axios.post(`/rooms/${roomId}?_method=PUT`, data)

    successMsg.value = '✅ Phòng đã được cập nhật!'
    setTimeout(() => router.push('/admin/room'), 1500)
  } catch (err) {
    errorMsg.value = err.response?.data?.message || 'Lỗi khi cập nhật phòng.'
    console.error('Chi tiết:', err.response?.data || err)
  } finally {
    isLoading.value = false
  }
}
</script>

<style scoped>
/* Giữ nguyên CSS hoặc thêm padding nếu cần */
</style>
