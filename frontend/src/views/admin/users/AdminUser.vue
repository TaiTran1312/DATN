<template>
  <AdminLayout>
    <main class="container mt-4">
      <h2 class="mb-4">Quản lý người dùng</h2>

      <!-- Tìm kiếm & Thêm -->
      <div class="d-flex justify-content-between mb-3">
        <input
          v-model="search"
          type="text"
          class="form-control w-50"
          placeholder="Tìm kiếm theo tên hoặc email"
          name="search"
          id="search"
        />
        <router-link to="/admin/user/add" class="btn btn-primary">
          + Thêm người dùng
        </router-link>
      </div>

      <!-- Thông báo -->
      <div v-if="successMsg" class="alert alert-success">{{ successMsg }}</div>
      <div v-if="errorMsg" class="alert alert-danger">{{ errorMsg }}</div>

      <!-- Bảng người dùng -->
      <table v-if="filteredUsers.length" class="table table-bordered">
        <thead>
          <tr>
            <th>#ID</th>
            <th>Họ tên</th>
            <th>Email</th>
            <th>SDT</th>
            <th>Địa chỉ</th>
            <th>Ảnh</th>
            <th>Vai trò</th>
            <th>Trạng thái</th>
            <th>Hành động</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="user in filteredUsers" :key="user.user_id">
            <td>{{ user.user_id }}</td>
            <td>{{ user.name }}</td>
            <td>{{ user.email }}</td>
            <td>{{ user.phone }}</td>
            <td>{{ user.address }}</td>
            <td>
              <img :src="user.avatar || '/images/default-avatar.png'" alt="avatar" width="40" class="rounded-circle" />
            </td>
            <td>{{ user.role }}</td>
            <td>
              <span :class="user.status === 'active' ? 'text-success' : 'text-danger'">
                {{ user.status === 'active' ? 'Hoạt động' : 'Không hoạt động' }}
              </span>
            </td>
            <td>
              <router-link
                :to="`/admin/users/${user.user_id}/update-user`"
                class="btn btn-sm btn-warning me-1"
              >
                Sửa
              </router-link>
              <button class="btn btn-sm btn-danger" @click="deleteUser(user.user_id)">Xóa</button>
            </td>
          </tr>
        </tbody>
      </table>

      <!-- Khi không có người dùng -->
      <div v-else class="alert alert-info">Không tìm thấy người dùng nào.</div>
    </main>
  </AdminLayout>
</template>

<script setup>
import { ref, onMounted, computed } from 'vue'
import axios from '@/axios'
import AdminLayout from '@/Layouts/AdminLayout.vue'

const users = ref([])
const search = ref('')
const successMsg = ref('')
const errorMsg = ref('')

// Gọi API lấy dữ liệu người dùng
onMounted(async () => {
  try {
    const res = await axios.get('/users')
    // API trả về mảng trực tiếp hoặc trong res.data.data
    users.value = Array.isArray(res.data) ? res.data : res.data.data || []
    console.log('Dữ liệu nhận được:', users.value)
  } catch (err) {
    console.error('Lỗi khi lấy danh sách người dùng:', err)
    errorMsg.value = 'Không thể tải danh sách người dùng.'
  }
})

// Lọc người dùng theo từ khóa
const filteredUsers = computed(() => {
  const keyword = search.value.toLowerCase()
  return users.value.filter(u =>
    (u.name || '').toLowerCase().includes(keyword) ||
    (u.email || '').toLowerCase().includes(keyword)
  )
})

// Xóa người dùng
const deleteUser = async (user_id) => {
  if (!confirm('Bạn có chắc muốn xóa người dùng này?')) return
  try {
    await axios.delete(`/users/${user_id}`)
    users.value = users.value.filter(u => u.user_id !== user_id)
    successMsg.value = 'Xóa người dùng thành công!'
    errorMsg.value = ''
  } catch (err) {
    console.error('Lỗi khi xóa người dùng:', err)
    errorMsg.value = 'Xóa không thành công. Vui lòng thử lại.'
  }
}
</script>
