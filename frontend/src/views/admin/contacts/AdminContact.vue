<template>
  <AdminLayout>
    <main class="container mt-4">
      <h2 class="mb-4">Quản lý liên hệ</h2>

      <!-- Tìm kiếm -->
      <div class="d-flex justify-content-between mb-3">
        <input
          v-model="search"
          type="text"
          class="form-control w-50"
          placeholder="Tìm kiếm theo email hoặc tiêu đề"
          name="search"
          id="search"
        />
        <router-link to="/admin/contacts/add" class="btn btn-primary">
          + Thêm liên hệ
        </router-link>
      </div>

      <!-- Thông báo -->
      <div v-if="successMsg" class="alert alert-success">{{ successMsg }}</div>
      <div v-if="errorMsg" class="alert alert-danger">{{ errorMsg }}</div>

      <!-- Bảng liên hệ -->
      <table v-if="filteredContacts.length" class="table table-bordered">
        <thead>
          <tr>
            <th>#ID</th>
            <th>Email</th>
            <th>Tiêu đề</th>
            <th>Nội dung</th>
            <th>Thời gian</th>
            <th>Hành động</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="contact in filteredContacts" :key="contact.contact_id">
            <td>{{ contact.contact_id }}</td>
            <td>{{ contact.email }}</td>
            <td>{{ contact.subject }}</td>
            <td>{{ contact.message }}</td>
            <td>{{ formatDate(contact.created_at) }}</td>
            <td>
              <router-link
                :to="`/admin/contacts/${contact.contact_id}/update-contact`"
                class="btn btn-sm btn-warning me-1"
              >
                Sửa
              </router-link>
              <button class="btn btn-sm btn-danger" @click="deleteContact(contact.contact_id)">Xoá</button>
            </td>
          </tr>
        </tbody>
      </table>

      <div v-else class="alert alert-info">Không tìm thấy liên hệ nào.</div>
    </main>
  </AdminLayout>
</template>

<script setup>
import { ref, onMounted, computed } from 'vue'
import axios from '@/axios'
import AdminLayout from '@/Layouts/AdminLayout.vue'

const contacts = ref([])
const search = ref('')
const successMsg = ref('')
const errorMsg = ref('')

const formatDate = (dateStr) => {
  const d = new Date(dateStr)
  return d.toLocaleDateString('vi-VN') + ' ' + d.toLocaleTimeString('vi-VN')
}

onMounted(async () => {
  try {
    const res = await axios.get('/contacts')
    contacts.value = Array.isArray(res.data) ? res.data : res.data.data || []
  } catch (err) {
    console.error('Lỗi khi tải danh sách liên hệ:', err)
    errorMsg.value = 'Không thể tải danh sách liên hệ.'
  }
})

const filteredContacts = computed(() =>
  contacts.value.filter(c =>
    (c.email || '').toLowerCase().includes(search.value.toLowerCase()) ||
    (c.subject || '').toLowerCase().includes(search.value.toLowerCase())
  )
)

const deleteContact = async (contact_id) => {
  if (!confirm('Bạn có chắc muốn xoá liên hệ này?')) return
  try {
    await axios.delete(`/contacts/${contact_id}`)
    contacts.value = contacts.value.filter(c => c.contact_id !== contact_id)
    successMsg.value = 'Xóa liên hệ thành công!'
    errorMsg.value = ''
  } catch (err) {
    console.error('Lỗi khi xóa liên hệ:', err)
    errorMsg.value = 'Không thể xoá liên hệ. Vui lòng thử lại.'
  }
}
</script>
