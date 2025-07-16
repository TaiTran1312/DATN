<template>

        <!-- Sidebar -->
        <aside class="sidebar">
            <div class="admin-info">
                <div class="avatar"><img src="/img/image (6).png" alt=""></div>
                <div class="name">ADMIN</div>
            </div>
            <ul class="menu">
                <li><router-link to="/admin">Thống kê</router-link></li>
                <li><router-link to="/admin/user">Quản lý user</router-link></li>
                <li><router-link to="/admin/room">Quản lý phòng</router-link></li>
                <li><router-link to="/admin/typeroom">Quản lý loại phòng</router-link></li>
                <li><router-link to="/admin/order">Quản lý đặt phòng</router-link></li>
                <li><router-link to="/admin/review">Quản lý đánh giá</router-link></li>
                <li><router-link to="/admin/post">Quản lý bài viết</router-link></li>
                <li><router-link to="/admin/service">Quản lý dịch vụ</router-link></li>
                <li><router-link to="/admin/contact">Quản lý liên hệ</router-link></li>
                <li><router-link to="/admin/notification">Quản lý thông báo</router-link></li>
            </ul>
        </aside>  
        
    
</template>

<script>
export default {

}
</script>

<style>

</style>