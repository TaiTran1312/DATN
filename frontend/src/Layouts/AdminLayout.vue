<template>
    <h2 class="admin-text">ADMIN</h2>
    <div class="container-admin">
        <Sidebar />
        <main class="main-content">
            <slot /> 
      </main>
    </div>
</template>

<script setup>
import Sidebar from '@/components/admin/HeaderAdmin.vue'
</script>

<style>

</style>