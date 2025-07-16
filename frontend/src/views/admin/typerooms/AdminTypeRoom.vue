<template>
  <AdminLayout>
    <main class="container mt-4">
      <h2 class="mb-4">Quản lý Loại Phòng</h2>

      <div class="d-flex justify-content-between align-items-center mb-3">
        <input
          v-model="search"
          type="text"
          class="form-control w-50"
          placeholder="Tìm kiếm loại phòng..."
        />
        <router-link to="/admin/typerooms/add" class="btn btn-primary">
          + Thêm Loại Phòng
        </router-link>
      </div>

      <div v-if="successMsg" class="alert alert-success">{{ successMsg }}</div>
      <div v-if="errorMsg" class="alert alert-danger">{{ errorMsg }}</div>
      <div v-if="loading" class="alert alert-warning">Đang tải dữ liệu...</div>
      <div v-if="!loading && filteredTypes.length === 0" class="alert alert-info">
        Chưa có loại phòng nào được thêm.
      </div>

      <table v-if="filteredTypes.length > 0" class="table table-bordered">
        <thead>
          <tr>
            <th>Tên loại phòng</th>
            <th>Mô tả</th>
            <th>Giá</th>
            <th>Hành động</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="type in filteredTypes" :key="type.id">
            <td>{{ type.name }}</td>
            <td>{{ type.description || '(Không có mô tả)' }}</td>
            <td>{{ formatPrice(type.price) }}</td>
            <td>
              <router-link
                :to="`/admin/typerooms/${type.id}/update-typeroom`"
                class="btn btn-sm btn-warning me-1"
              >
                Sửa
              </router-link>
              <button class="btn btn-sm btn-danger" @click="deleteType(type.id)">
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
import { ref, onMounted, computed } from 'vue'
import axios from '@/axios'
import AdminLayout from '@/Layouts/AdminLayout.vue'

const roomTypes = ref([])
const search = ref('')
const successMsg = ref('')
const errorMsg = ref('')
const loading = ref(true)

onMounted(async () => {
  try {
    const res = await axios.get('/room-types')
    roomTypes.value = Array.isArray(res.data) ? res.data : res.data?.data ?? []
  } catch (err) {
    console.error('Lỗi khi lấy danh sách loại phòng:', err)
    errorMsg.value = 'Không thể tải danh sách loại phòng.'
  } finally {
    loading.value = false
  }
})

const formatPrice = (price) =>
  typeof price === 'number'
    ? price.toLocaleString('vi-VN') + '₫'
    : 'Không xác định'

const filteredTypes = computed(() =>
  roomTypes.value.filter(t =>
    t.name?.toLowerCase().includes(search.value.toLowerCase())
  )
)

const deleteType = async (id) => {
  if (!confirm('Bạn có chắc muốn xóa loại phòng này?')) return
  try {
    await axios.delete(`/room-types/${id}`)
    roomTypes.value = roomTypes.value.filter(t => t.id !== id)
    successMsg.value = 'Xóa loại phòng thành công!'
  } catch (err) {
    console.error('Lỗi khi xóa loại phòng:', err)
    errorMsg.value = 'Không thể xóa loại phòng.'
  }
}
</script>
