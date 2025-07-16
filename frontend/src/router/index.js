import { createRouter, createWebHistory } from 'vue-router'
import adminRoutes from '@/router/admin'
import userRoutes from '@/router/user'



const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    ...adminRoutes,
    ...userRoutes
  ],
  
})

export default router
