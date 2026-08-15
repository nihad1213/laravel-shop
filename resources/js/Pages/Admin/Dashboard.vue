<script setup>
import AdminLayout from '@/Layouts/AdminLayout.vue'
import { usePage } from '@inertiajs/vue3'
import { UsersIcon, ShieldCheckIcon, CubeIcon, EnvelopeIcon } from '@heroicons/vue/24/outline'

const page = usePage()
const user = page.props.auth.user

defineProps({
    stats: { type: Object, default: () => ({}) },
})

const cards = [
    { name: 'Total Users', key: 'users', icon: UsersIcon },
    { name: 'Admins', key: 'admins', icon: ShieldCheckIcon },
    { name: 'Products', key: 'products', icon: CubeIcon },
    { name: 'Subscribers', value: '—', icon: EnvelopeIcon },
]
</script>

<template>
    <AdminLayout title="Dashboard">
        <div class="mb-8">
            <h2 class="text-2xl font-bold text-gray-900">Welcome back, {{ user.name }}</h2>
            <p class="mt-1 text-sm text-gray-500">Here's what's happening with your shop.</p>
        </div>

        <div class="grid grid-cols-1 gap-5 sm:grid-cols-2 lg:grid-cols-4">
            <div
                v-for="card in cards"
                :key="card.name"
                class="flex items-center gap-4 rounded-xl border border-gray-200 bg-white p-5 shadow-sm"
            >
                <span class="flex size-11 shrink-0 items-center justify-center rounded-lg bg-[#DABFFF]/30">
                    <component :is="card.icon" class="size-6 text-[#4F518C]" aria-hidden="true" />
                </span>
                <div>
                    <p class="text-sm font-medium text-gray-500">{{ card.name }}</p>
                    <p class="text-2xl font-bold text-gray-900">{{ card.value ?? stats[card.key] ?? '—' }}</p>
                </div>
            </div>
        </div>
    </AdminLayout>
</template>
