<template>
  <div class="slider-container">
    <button class="nav-button prev-button" @click="prevSlide">&#10094;</button>

    <img :src="images[currentIndex]" class="main-image" alt="Main Room" />

    <button class="nav-button next-button" @click="nextSlide">&#10095;</button>

    <div class="thumbnail-container">
      <img
        v-for="(img, index) in images"
        :key="index"
        :src="img"
        :class="{ active: index === currentIndex }"
        @click="changeImage(index)"
      />
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      images: [
        "/img/room_1.jpg",
        "/img/room_2.jpg",
        "/img/room_3.jpg",
        "/img/room_4.jpg",
        "/img/room_5.jpg",
      ],
      currentIndex: 0,
      intervalId: null
    };
  },
  methods: {
    changeImage(index) {
      this.currentIndex = index;
    },
    nextSlide() {
      this.currentIndex = (this.currentIndex + 1) % this.images.length;
    },
    prevSlide() {
      this.currentIndex =
        (this.currentIndex - 1 + this.images.length) % this.images.length;
    },
    autoSlide() {
      this.intervalId = setInterval(this.nextSlide, 3000);
    }
  },
  mounted() {
    this.autoSlide(); // chạy sau khi component hiển thị
  },
  beforeUnmount() {
    clearInterval(this.intervalId); // tránh rò rỉ bộ nhớ
  }
};
</script>

<style>

</style>