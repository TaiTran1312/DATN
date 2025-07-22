import { createRouter, createWebHistory } from 'vue-router'

// Import các route riêng biệt
import adminRoutes from '@/router/admin'
import userRoutes from '@/router/user'

// Tạo router
const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    ...userRoutes,
    ...adminRoutes,
    {
      path: '/:pathMatch(.*)*',
      name: 'NotFound',
      component: () => import('@/views/NotFound.vue') // fallback nếu không tìm thấy
    }
  ],
  scrollBehavior() {
    return { top: 0 }
  }
})

export default router
