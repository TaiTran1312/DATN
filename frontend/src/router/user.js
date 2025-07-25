import HomeView from '@/views/user/HomeView.vue'
import AboutView from '@/views/user/AboutView.vue'
import ContactView from '@/views/user/ContactVue.vue'
import BlogView from '@/views/user/BlogView.vue'
import RoomView from '@/views/user/RoomView.vue'
import RoomDetail from '@/views/user/RoomDetail.vue'
import BlogDetail from '@/views/user/BlogDetail.vue'
import ServiceView from '@/views/user/ServiceView.vue'
import ServiceDetail from '@/views/user/ServiceDetail.vue'
import HistoryBooking from '@/views/user/HistoryBooking.vue'
import LoginView from '@/views/user/LoginView.vue'
import Register from '@/views/user/Register.vue'
import Profile from '@/views/user/ProfileView.vue'

export default [
    {
      path: '/',
      name: 'home',
      component: HomeView,
    },
    {
      path: '/about',
      name: 'about',
      // route level code-splitting
      // this generates a separate chunk (About.[hash].js) for this route
      // which is lazy-loaded when the route is visited.
      component: AboutView,
    },
    {
      path: '/contact',
      name: 'contact',
      component: ContactView
    },
    {
      path: '/blog',
      name: 'blog',
      component: BlogView,
    },
    {
      path: '/room',
      name: 'room',
      component: RoomView,
    },
    // {
    //   path: '/roomdetail',
    //   name: 'roomdetail',
    //   component: RoomDetail,
    // },
    {
      path: '/roomdetail/:id',
      name: 'RoomDetail',
      component: () => import('@/views/user/RoomDetail.vue')
    },
    {
      path: '/blogdetail/:id',
      name: 'blogdetail',
      component: () => import('@/views/user/BlogDetail.vue'),
    },
    {
      path: '/service',
      name: 'service',
      component: ServiceView,
    },
    {
      path: '/servicedetail/:id',
      name: 'servicedetail',
      component: () => import('@/views/user/ServiceDetail.vue'),
    },
    {
      path: '/historybooking',
      name: 'historybooking',
      component: HistoryBooking,
    },
    {
      path: '/login',
      name: 'login',
      component: LoginView,
    },
    {
      path: '/register',
      name: 'register',
      component: Register,
    },
    {
      path: '/profile',
      name: 'profile',
      component: Profile,
    }
]