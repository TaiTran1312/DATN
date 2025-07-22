<template>
  <section class="hero-wapper-blog">
    <HeaderComponent />
    <div class="hero">OUR BLOG</div>
  </section>

  <section class="container" v-if="blog">
    <!-- Tiêu đề & thông tin bài -->
    <div class="title-detail-blog">
      <div class="image-wrapper">
        <img :src="blog.image || '/img/default-post.png'" alt="Blog Image" />
      </div>
      <div class="content">
        <h1>{{ blog.title }}</h1>
        <div class="meta-detail-blog">
          {{ blog.author || 'Ẩn danh' }} || {{ formatDate(blog.published_at) }}
        </div>
      </div>
    </div>

    <!-- Nội dung HTML -->
    <div class="main-container">
      <div class="content-detail-blog" v-html="blog.content"></div>
    </div>

    <!-- Nội dung liên quan -->
    <div class="related-posts" v-if="relatedBlogs.length">
      <h3 class="mt-5 mb-3">📚 Nội dung liên quan</h3>
      <div class="row">
        <div
          class="col-md-4 mb-4"
          v-for="post in relatedBlogs.slice(0, 3)"
          :key="post.post_id"
        >
          <router-link :to="`/blogdetail/${post.post_id}`" class="card h-100 text-decoration-none">
            <img :src="post.image || '/img/default-post.png'" class="card-img-top" alt="Ảnh blog" />
            <div class="card-body">
              <h5 class="card-title">{{ post.title }}</h5>
              <p class="card-text">{{ formatDate(post.created_at) }} | {{ post.author || 'Ẩn danh' }}</p>
            </div>
          </router-link>
        </div>
      </div>
    </div>
  </section>


  <Footer />
</template>

<script setup>
import { ref, onMounted } from 'vue'
import { useRoute } from 'vue-router'
import axios from 'axios'
import HeaderComponent from '@/components/common/Header.vue'
import Footer from '@/components/common/Footer.vue'

const blog = ref(null)
const relatedBlogs = ref([])
const route = useRoute()

onMounted(async () => {
  try {
    const id = route.params.id

    // Lấy bài viết chi tiết
    const resDetail = await axios.get(`http://localhost:8000/api/v1/posts/${id}`)
    blog.value = resDetail.data?.data || resDetail.data

    // Lấy các bài viết liên quan
    const resAll = await axios.get('http://localhost:8000/api/v1/posts')
    const allPosts = resAll.data?.data || resAll.data || []
    relatedBlogs.value = allPosts.filter(post => post.post_id != id)
  } catch (err) {
    console.error('Không tìm thấy bài viết:', err)
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

</script>

<style scoped>
/* Giữ nguyên CSS của bạn */
</style>
