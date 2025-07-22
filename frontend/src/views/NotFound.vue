<template>
  <section class="not-found">
    <div class="content">
      <h1>404</h1>
      <p>Trang bạn đang tìm không tồn tại.</p>
      <router-link to="/" class="btn">Quay về trang chủ</router-link>
    </div>
  </section>
</template>

<script setup>
// Không cần logic JS cho trang tĩnh
</script>

<style scoped>
.not-found {
  display: flex;
  justify-content: center;
  align-items: center;
  height: 80vh;
  text-align: center;
  background-color: #f8f9fa;
}

.content h1 {
  font-size: 6rem;
  margin-bottom: 1rem;
  color: #dc3545;
}

.content p {
  font-size: 1.2rem;
  margin-bottom: 2rem;
  color: #555;
}

.btn {
  display: inline-block;
  padding: 10px 20px;
  background-color: #007bff;
  color: white;
  border-radius: 5px;
  text-decoration: none;
}
.btn:hover {
  background-color: #0056b3;
}
</style>
