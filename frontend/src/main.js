// Import CSS chung
import './assets/main.css'
import 'bootstrap/dist/css/bootstrap.min.css'

// Import Vue core
import { createApp } from 'vue'
import App from './App.vue'

// Import router và store
import router from './router'
import { createPinia } from 'pinia'

// Khởi tạo app
const app = createApp(App)

// Kích hoạt Pinia và Router
app.use(createPinia())
app.use(router)

// Mount vào DOM
app.mount('#app')
