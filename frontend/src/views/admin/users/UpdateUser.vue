<template>
  <AdminLayout>
    <main class="main-content">
      <div class="breadcrumb">Quản lý người dùng > cập nhật người dùng</div>
      <h1>CẬP NHẬT NGƯỜI DÙNG</h1>

      <form class="form-user">
        <input type="text" placeholder="Nhập mã tài khoản">
        <input type="text" placeholder="Nhập tên đăng nhập">
        <input type="email" placeholder="Nhập Email">
        <input type="password" placeholder="Nhập mật khẩu">
        <input type="text" placeholder="Địa chỉ">

        <div class="form-row">
          <input type="text" placeholder="Trạng thái">
          <input type="text" placeholder="Loại tài khoản">
          <input type="text" placeholder="Nhập SDT">
        </div>

        <button type="submit" class="btn-submit">Cập nhật</button>
      </form>
    </main>
  </AdminLayout>
</template>

<script setup>
import AdminLayout from '@/Layouts/AdminLayout.vue'
</script>

<style>

</style>