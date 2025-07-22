<template>
  <section class="hero-wapper-blog">
    <HeaderComponent />
    <div class="hero">OUR BLOG</div>
  </section>

  <div class="section-title">Welcome to Our Blog</div>
  <p class="description">
    Stay updated with the latest news, travel tips, and local insights from our hotel.
    We'll share everything you need to make your next stay unforgettable.
  </p>

  <section class="container">
    <h3 class="recomen-post">Recommendation Post</h3>

    <!-- Loading/Error -->
    <div v-if="loading" class="alert alert-info">Đang tải dữ liệu bài viết...</div>
    <div v-if="errorMsg" class="alert alert-danger">{{ errorMsg }}</div>

    <!-- Bài viết nổi bật: tối đa 2 bài -->
    <div class="image-blog" v-if="blogs.length >= 1">
      <div v-for="(blog, index) in blogs.slice(0, 2)" :key="blog.post_id"
           :class="index === 0 ? 'image-blog-left' : 'image-blog-right'">
        <img :src="getImageSrc(blog.image)" alt="Ảnh blog" />
        <router-link :to="`/blogdetail/${blog.post_id}`" class="recomen-post-title">
          <span>{{ blog.title }}</span>
        </router-link>
        <br />
        <span class="recomen-post-day">{{ blog.author || 'Ẩn danh' }} || {{ formatDate(blog.created_at) }}</span>
      </div>
    </div>

    <!-- Các bài viết mới -->
    <div class="new-post" v-if="blogs.length > 2">
      <h2 class="recomen-post">Latest News Post</h2>
      <div class="news-grid">
        <div class="news-card" v-for="blog in blogs.slice(2)" :key="blog.post_id">
          <img :src="getImageSrc(blog.image)" alt="Blog Image" />
          <router-link :to="`/blogdetail/${blog.post_id}`" class="blog-title">
            <h4>{{ blog.title }}</h4>
          </router-link>
          <div class="news-meta">{{ formatDate(blog.created_at) }} | {{ blog.author || 'Ẩn danh' }}</div>
          <p v-html="getSummary(blog.content, 120)"></p>
        </div>
      </div>
    </div>

    <!-- Phân trang giả -->
    <div class="pagination">
      <button>1</button>
      <button>2</button>
      <button>3</button>
      <button>4</button>
      <button>&gt;</button>
    </div>
  </section>

  <Footer />
</template>

<script setup>
import { ref, onMounted } from 'vue'
import axios from 'axios'
import HeaderComponent from '@/components/common/Header.vue'
import Footer from '@/components/common/Footer.vue'

const blogs = ref([])
const loading = ref(true)
const errorMsg = ref('')

onMounted(async () => {
  try {
    const res = await axios.get('http://127.0.0.1:8000/api/v1/posts')
    const raw = res.data

    blogs.value = Array.isArray(raw)
      ? raw
      : Array.isArray(raw.data)
      ? raw.data
      : []

    if (!Array.isArray(blogs.value)) {
      errorMsg.value = 'Dữ liệu bài viết không hợp lệ.'
    }
  } catch (error) {
    console.error('Lỗi khi tải dữ liệu blog:', error)
    errorMsg.value = 'Không thể kết nối đến API bài viết.'
  } finally {
    loading.value = false
  }
})

const formatDate = (str) => {
  if (!str) return 'Không xác định'
  const [day, month, yearTime] = str.split('/')
  const [year, time] = yearTime?.split(' ')
  const date = new Date(`${year}-${month}-${day} ${time || ''}`)
  return isNaN(date) ? str : date.toLocaleDateString('vi-VN', {
    year: 'numeric', month: 'long', day: 'numeric'
  })
}

const getImageSrc = (url) => {
  return url?.startsWith('http') ? url : '/img/default-post.png'
}

const getSummary = (html, maxLength) => {
  const text = html?.replace(/<[^>]+>/g, '') || ''
  return text.length > maxLength ? text.slice(0, maxLength) + '...' : text
}
</script>

<style scoped>
/* giữ nguyên CSS của bạn hoặc thêm nếu cần */
</style>
