<script setup>
import MainLayout from '@/Layouts/MainLayout.vue';
import { usePage } from '@inertiajs/vue3';

const page = usePage();
const user = page.props.auth.user;
</script>

<template>
    <MainLayout>
        <div class="mx-auto max-w-7xl px-6 py-16 lg:px-8">
            <div class="mb-10">
                <div
                    class="bg-[#2C2A4A] py-3.5 pl-6 pr-10 inline-block max-w-full"
                    style="clip-path: polygon(0 0, calc(100% - 28px) 0, 100% 50%, calc(100% - 28px) 100%, 0 100%);"
                >
                    <h1 class="text-lg sm:text-xl font-bold text-white whitespace-nowrap">
                        Admin Dashboard
                    </h1>
                </div>
            </div>

            <p class="text-gray-600">
                Welcome, {{ user.name }}. This is the admin area.
            </p>
        </div>
    </MainLayout>
</template>
