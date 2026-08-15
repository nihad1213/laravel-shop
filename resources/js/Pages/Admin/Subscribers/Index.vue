<script setup>
import AdminLayout from '@/Layouts/AdminLayout.vue'
import { EnvelopeIcon } from '@heroicons/vue/24/outline'
</script>

<template>
    <AdminLayout title="Subscribers">
        <div class="flex flex-col items-center justify-center rounded-xl border border-dashed border-gray-300 bg-white px-6 py-20 text-center">
            <span class="flex size-14 items-center justify-center rounded-full bg-[#DABFFF]/30">
                <EnvelopeIcon class="size-7 text-[#4F518C]" aria-hidden="true" />
            </span>
            <h2 class="mt-4 text-lg font-bold text-gray-900">Subscriber management is coming soon</h2>
            <p class="mt-1 max-w-sm text-sm text-gray-500">
                Newsletter subscribers will show up here once the subscription feature is wired up.
            </p>
        </div>
    </AdminLayout>
</template>
