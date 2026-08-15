<script setup>
import AdminBar from '@/Components/AdminBar.vue';
import Header from '@/Components/Header.vue';
import Footer from '@/Components/Footer.vue';
</script>

<template>
    <div>
        <AdminBar />
        <Header />
        <main>
            <slot />
        </main>
        <Footer />
    </div>
</template>