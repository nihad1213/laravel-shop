<script setup>
import AdminLayout from '@/Layouts/AdminLayout.vue'

defineProps({
    users: { type: Array, default: () => [] },
})

function formatDate(value) {
    return new Date(value).toLocaleDateString(undefined, { year: 'numeric', month: 'short', day: 'numeric' })
}
</script>

<template>
    <AdminLayout title="Users">
        <div class="mb-6 flex items-center justify-between">
            <div>
                <h2 class="text-2xl font-bold text-gray-900">Users</h2>
                <p class="mt-1 text-sm text-gray-500">{{ users.length }} registered {{ users.length === 1 ? 'user' : 'users' }}.</p>
            </div>
        </div>

        <div class="overflow-hidden rounded-xl border border-gray-200 bg-white shadow-sm">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500">Name</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500">Email</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500">Role</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500">Joined</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    <tr v-for="u in users" :key="u.id" class="hover:bg-gray-50">
                        <td class="whitespace-nowrap px-6 py-4">
                            <div class="flex items-center gap-3">
                                <span class="flex size-8 items-center justify-center rounded-full bg-[#907AD6] text-xs font-bold text-white">
                                    {{ u.name.charAt(0).toUpperCase() }}
                                </span>
                                <span class="text-sm font-medium text-gray-900">{{ u.name }}</span>
                            </div>
                        </td>
                        <td class="whitespace-nowrap px-6 py-4 text-sm text-gray-500">{{ u.email }}</td>
                        <td class="whitespace-nowrap px-6 py-4">
                            <span
                                class="inline-flex items-center rounded-full px-2.5 py-0.5 text-xs font-semibold"
                                :class="u.is_admin ? 'bg-[#7FDEFF]/30 text-[#2C2A4A]' : 'bg-gray-100 text-gray-600'"
                            >
                                {{ u.is_admin ? 'Admin' : 'Customer' }}
                            </span>
                        </td>
                        <td class="whitespace-nowrap px-6 py-4 text-sm text-gray-500">{{ formatDate(u.created_at) }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </AdminLayout>
</template>
