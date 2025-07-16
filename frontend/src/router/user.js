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
    {
      path: '/roomdetail',
      name: 'roomdetail',
      component: RoomDetail,
    },
    {
      path: '/blogdetail',
      name: 'blogdetail',
      component: BlogDetail,
    },
    {
      path: '/service',
      name: 'service',
      component: ServiceView,
    },
    {
      path: '/servicedetail',
      name: 'servicedetail',
      component: ServiceDetail,
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
]