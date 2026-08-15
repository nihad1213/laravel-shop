<script setup>
import { computed } from 'vue'
import { Link, usePage } from '@inertiajs/vue3'
import { GlobeAltIcon, Squares2X2Icon } from '@heroicons/vue/20/solid'

const page = usePage()
const user = computed(() => page.props.auth?.user)

const initial = computed(() => user.value?.name?.trim()?.charAt(0)?.toUpperCase() ?? '?')

const isAdminPage = computed(() => page.url.startsWith('/admin'))
</script>

<template>
    <div v-if="user?.is_admin" class="bg-[#101014] border-b border-white/10 text-[13px] leading-none">
        <div class="mx-auto flex max-w-7xl items-stretch justify-between px-2 lg:px-4">
            <Link
                v-if="isAdminPage"
                :href="route('home')"
                class="flex items-center gap-1.5 px-3 py-2 font-medium text-white/80 hover:bg-white/10 hover:text-white transition-colors"
            >
                <GlobeAltIcon class="size-4 text-[#7FDEFF]" aria-hidden="true" />
                Go to Website
            </Link>
            <Link
                v-else
                :href="route('admin.dashboard')"
                class="flex items-center gap-1.5 px-3 py-2 font-medium text-white/80 hover:bg-white/10 hover:text-white transition-colors"
            >
                <Squares2X2Icon class="size-4 text-[#7FDEFF]" aria-hidden="true" />
                Go to Admin
            </Link>

            <Link
                :href="route('admin.dashboard')"
                class="flex items-center gap-2 px-3 py-2 text-white/60 hover:bg-white/10 hover:text-white transition-colors"
            >
                <span>Howdy, {{ user.name }}</span>
                <span class="flex size-5 items-center justify-center rounded-full bg-[#7FDEFF] text-[11px] font-bold text-[#101014]">
                    {{ initial }}
                </span>
            </Link>
        </div>
    </div>
</template>
