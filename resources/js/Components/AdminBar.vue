<script setup>
import { computed } from 'vue'
import { Link, usePage } from '@inertiajs/vue3'
import { Cog6ToothIcon } from '@heroicons/vue/20/solid'

const page = usePage()
const user = computed(() => page.props.auth?.user)
</script>

<template>
    <div v-if="user?.is_admin" class="bg-[#1F1D38] text-white text-xs sm:text-sm">
        <div class="mx-auto flex max-w-7xl items-center justify-between px-6 py-2 lg:px-8">
            <Link :href="route('admin.dashboard')" class="flex items-center gap-1.5 font-semibold hover:text-[#7FDEFF] transition-colors">
                <Cog6ToothIcon class="size-4" aria-hidden="true" />
                Go to Admin
            </Link>
            <span class="text-white/60">Howdy, {{ user.name }}</span>
        </div>
    </div>
</template>
