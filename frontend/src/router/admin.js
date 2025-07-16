import Dashbroad from '@/views/admin/Dashbroad.vue'
import AdminComment from '@/views/admin/comments/AdminComment.vue'
import AdminReview from '@/views/admin/reviews/AdminReview.vue'
import AdminContact from '@/views/admin/contacts/AdminContact.vue'
import AdminRoom from '@/views/admin/rooms/AdminRoom.vue'
import AdminService from '@/views/admin/services/AdminService.vue'
import AdminTypeRoom from '@/views/admin/typerooms/AdminTypeRoom.vue'
import AdminUser from '@/views/admin/users/AdminUser.vue'
import AdminBooking from '@/views/admin/bookings/AdminBooking.vue'
import AdminPost from '@/views/admin/posts/AdminPost.vue'
import AdminNotification from '@/views/admin/notifications/AdminNotification.vue'
import AdminOrder from '@/views/admin/orders/AdminOrder.vue'
import AdminOrderDetail from '@/views/admin/orderdetails/AdminOrderDetail.vue'

import AddRoom from '@/views/admin/rooms/AddRoom.vue'
import AddService from '@/views/admin/services/AddService.vue'
import AddTypeRoom from '@/views/admin/typerooms/AddTypeRoom.vue'
import AddUser from '@/views/admin/users/AddUser.vue'
import AddBooking from '@/views/admin/bookings/AddBooking.vue'
import AddComment from '@/views/admin/comments/AddComment.vue'
import AddReview from '@/views/admin/reviews/AddReview.vue'
import AddPost from '@/views/admin/posts/AddPost.vue'
import AddNotification from '@/views/admin/notifications/AddNotification.vue'
import AddContact from '@/views/admin/contacts/AddContact.vue'
import AddOrder from '@/views/admin/orders/AddOrder.vue'

import UpdateRoom from '@/views/admin/rooms/UpdateRoom.vue'
import UpdateService from '@/views/admin/services/UpdateService.vue'
import UpdateTypeRoom from '@/views/admin/typerooms/UpdateTypeRoom.vue'
import UpdateUser from '@/views/admin/users/UpdateUser.vue'
import UpdateBooking from '@/views/admin/bookings/UpdateBooking.vue'
import UpdateComment from '@/views/admin/comments/UpdateComment.vue'
import UpdateReview from '@/views/admin/reviews/UpdateReview.vue'
import UpdatePost from '@/views/admin/posts/UpdatePost.vue'
import UpdateNotification from '@/views/admin/notifications/UpdateNotification.vue'
import UpdateContact from '@/views/admin/contacts/UpdateContact.vue'
import UpdateOrder from '@/views/admin/orders/UpdateOrder.vue'

export default [
  // ⚙️ Dashboard
  { path: '/admin', name: 'admin', component: Dashbroad },

  // 📘 Post
  { path: '/admin/post', name: 'admin-post', component: AdminPost },
  { path: '/admin/posts/add', name: 'admin-add-post', component: AddPost },
  { path: '/admin/posts/:id/update-post', name: 'admin-update-post', component: UpdatePost },

  // 💬 Comment
  { path: '/admin/comment', name: 'admin-comment', component: AdminComment },
  { path: '/admin/comment/add', name: 'admin-add-comment', component: AddComment },
  { path: '/admin/comments/:id/update-comment', name: 'admin-update-comment', component: UpdateComment },
    
  // ⭐ Review
  { path: '/admin/review', name: 'admin-review', component: AdminReview },
  { path: '/admin/reviews/add', name: 'admin-add-review', component: AddReview },
  { path: '/admin/reviews/:id/update-review', name: 'admin-update-review', component: UpdateReview },

  // 📞 Contact & Notice
  { path: '/admin/contact', name: 'admin-contact', component: AdminContact },
  { path: '/admin/contacts/add', name: 'admin-add-contact', component: AddContact },
  { path: '/admin/contacts/:id/update-contact', name: 'admin-update-contact', component: UpdateContact },


  // 🏨 Room
  { path: '/admin/room', name: 'admin-room', component: AdminRoom },
  { path: '/admin/rooms/add-room',name: 'admin-add-room',component: AddRoom},
  { path: '/admin/rooms/:id/update-room', name: 'admin-update-room', component: UpdateRoom },

  // 📅 Booking
  { path: '/admin/booking', name: 'admin-booking', component: AdminBooking },
  { path: '/admin/bookings/add', name: 'admin-add-booking', component: AddBooking },
  { path: '/admin/bookings/:id/update-booking', name: 'admin-update-booking', component: UpdateBooking },
                                
  // 🛏 Type Room
  { path: '/admin/typeroom', name: 'admin-typeroom', component: AdminTypeRoom },
  { path: '/admin/typerooms/add', name: 'admin-add-typeroom', component: AddTypeRoom },
  { path: '/admin/typerooms/:id/update-typeroom', name: 'admin-update-typeroom', component: UpdateTypeRoom },

  // 🧾 Service
  { path: '/admin/service', name: 'admin-service', component: AdminService },
  { path: '/admin/services/add-service', name: 'admin-add-service', component: AddService },
  { path: '/admin/services/:id/update-service', name: 'admin-update-service', component: UpdateService },

  // 🔔 Notification
  { path: '/admin/notification', name: 'admin-notification', component: AdminNotification },
  { path: '/admin/notification/add', name: 'admin-add-notification', component: AddNotification },
  { path: '/admin/notifications/:id/update-notification', name: 'admin-update-notification', component: UpdateNotification }, 

  // 🧍 User
  { path: '/admin/user', name: 'admin-user', component: AdminUser },
  { path: '/admin/user/add', name: 'admin-add-user', component: AddUser },
  { path: '/admin/users/:id/update-user', name: 'admin-update-user', component: UpdateUser },

  // 🛒 Order
  { path: '/admin/order', name: 'admin-order', component: AdminOrder },
  { path: '/admin/orders/add', name: 'admin-add-order', component: AddOrder },
  { path: '/admin/orders/:id/update', name: 'admin-update-order', component: UpdateOrder },
  { path: '/admin/orders/:id/details', name: 'admin-order-detail', component: AdminOrderDetail },
]

