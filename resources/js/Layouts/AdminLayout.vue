<script setup>
import { computed, ref } from 'vue'
import { Link, usePage, router } from '@inertiajs/vue3'
import { Dialog, DialogPanel, TransitionChild, TransitionRoot } from '@headlessui/vue'
import {
    Squares2X2Icon,
    UsersIcon,
    CubeIcon,
    EnvelopeIcon,
    GlobeAltIcon,
    Bars3Icon,
    XMarkIcon,
    ArrowRightStartOnRectangleIcon,
} from '@heroicons/vue/24/outline'

defineProps({
    title: { type: String, default: '' },
})

const page = usePage()
const user = computed(() => page.props.auth?.user)
const initial = computed(() => user.value?.name?.trim()?.charAt(0)?.toUpperCase() ?? '?')

const navigation = [
    { name: 'Dashboard', route: 'admin.dashboard', icon: Squares2X2Icon },
    { name: 'Users', route: 'admin.users', icon: UsersIcon },
    { name: 'Products', route: 'admin.products', icon: CubeIcon },
    { name: 'Subscribers', route: 'admin.subscribers', icon: EnvelopeIcon },
]

const isCurrent = (routeName) => route().current(routeName) || route().current(`${routeName}.*`)

const sidebarOpen = ref(false)

function logout() {
    router.post(route('logout'))
}
</script>

<template>
    <div class="min-h-screen bg-gray-50">
        <!-- Mobile sidebar -->
        <TransitionRoot as="template" :show="sidebarOpen">
            <Dialog class="relative z-50 lg:hidden" @close="sidebarOpen = false">
                <TransitionChild
                    as="template"
                    enter="transition-opacity ease-linear duration-300"
                    enter-from="opacity-0"
                    enter-to="opacity-100"
                    leave="transition-opacity ease-linear duration-300"
                    leave-from="opacity-100"
                    leave-to="opacity-0"
                >
                    <div class="fixed inset-0 bg-black/50" />
                </TransitionChild>

                <div class="fixed inset-0 flex">
                    <TransitionChild
                        as="template"
                        enter="transition ease-in-out duration-300 transform"
                        enter-from="-translate-x-full"
                        enter-to="translate-x-0"
                        leave="transition ease-in-out duration-300 transform"
                        leave-from="translate-x-0"
                        leave-to="-translate-x-full"
                    >
                        <DialogPanel class="relative mr-16 flex w-full max-w-xs flex-1">
                            <TransitionChild
                                as="template"
                                enter="ease-in-out duration-300"
                                enter-from="opacity-0"
                                enter-to="opacity-100"
                                leave="ease-in-out duration-300"
                                leave-from="opacity-100"
                                leave-to="opacity-0"
                            >
                                <div class="absolute left-full top-0 flex w-16 justify-center pt-5">
                                    <button type="button" class="-m-2.5 p-2.5" @click="sidebarOpen = false">
                                        <span class="sr-only">Close sidebar</span>
                                        <XMarkIcon class="size-6 text-white" aria-hidden="true" />
                                    </button>
                                </div>
                            </TransitionChild>

                            <div class="flex grow flex-col gap-y-5 overflow-y-auto bg-[#201e38] px-6 pb-4">
                                <div class="flex h-16 shrink-0 items-center gap-2">
                                    <span class="flex size-8 items-center justify-center rounded-lg bg-[#7FDEFF] text-sm font-bold text-[#201e38]">LS</span>
                                    <span class="text-sm font-bold tracking-wide text-white">Admin Panel</span>
                                </div>
                                <nav class="flex flex-1 flex-col">
                                    <ul role="list" class="flex flex-1 flex-col gap-y-1">
                                        <li v-for="item in navigation" :key="item.name">
                                            <Link
                                                :href="route(item.route)"
                                                @click="sidebarOpen = false"
                                                class="group flex items-center gap-x-3 rounded-lg border-l-2 px-3 py-2 text-sm font-semibold transition-colors"
                                                :class="isCurrent(item.route)
                                                    ? 'border-[#7FDEFF] bg-white/10 text-white'
                                                    : 'border-transparent text-white/60 hover:border-white/20 hover:bg-white/5 hover:text-white'"
                                            >
                                                <component
                                                    :is="item.icon"
                                                    class="size-5 shrink-0"
                                                    :class="isCurrent(item.route) ? 'text-[#7FDEFF]' : 'text-white/40 group-hover:text-white/70'"
                                                    aria-hidden="true"
                                                />
                                                {{ item.name }}
                                            </Link>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </DialogPanel>
                    </TransitionChild>
                </div>
            </Dialog>
        </TransitionRoot>

        <!-- Desktop sidebar -->
        <div class="hidden lg:fixed lg:inset-y-0 lg:z-40 lg:flex lg:w-64 lg:flex-col">
            <div class="flex grow flex-col gap-y-6 overflow-y-auto bg-[#201e38] px-5 pb-4">
                <div class="flex h-16 shrink-0 items-center gap-2">
                    <span class="flex size-8 items-center justify-center rounded-lg bg-[#7FDEFF] text-sm font-bold text-[#201e38]">LS</span>
                    <span class="text-sm font-bold tracking-wide text-white">Admin Panel</span>
                </div>

                <nav class="flex flex-1 flex-col">
                    <ul role="list" class="flex flex-1 flex-col gap-y-1">
                        <li v-for="item in navigation" :key="item.name">
                            <Link
                                :href="route(item.route)"
                                class="group flex items-center gap-x-3 rounded-lg border-l-2 px-3 py-2 text-sm font-semibold transition-colors"
                                :class="isCurrent(item.route)
                                    ? 'border-[#7FDEFF] bg-white/10 text-white'
                                    : 'border-transparent text-white/60 hover:border-white/20 hover:bg-white/5 hover:text-white'"
                            >
                                <component
                                    :is="item.icon"
                                    class="size-5 shrink-0"
                                    :class="isCurrent(item.route) ? 'text-[#7FDEFF]' : 'text-white/40 group-hover:text-white/70'"
                                    aria-hidden="true"
                                />
                                {{ item.name }}
                            </Link>
                        </li>
                    </ul>

                    <div class="mt-auto flex flex-col gap-y-1 border-t border-white/10 pt-4">
                        <Link
                            :href="route('home')"
                            class="group flex items-center gap-x-3 rounded-lg px-3 py-2 text-sm font-semibold text-white/60 transition-colors hover:bg-white/5 hover:text-white"
                        >
                            <GlobeAltIcon class="size-5 shrink-0 text-white/40 group-hover:text-white/70" aria-hidden="true" />
                            View Website
                        </Link>
                        <button
                            type="button"
                            @click="logout"
                            class="group flex items-center gap-x-3 rounded-lg px-3 py-2 text-left text-sm font-semibold text-white/60 transition-colors hover:bg-white/5 hover:text-white"
                        >
                            <ArrowRightStartOnRectangleIcon class="size-5 shrink-0 text-white/40 group-hover:text-white/70" aria-hidden="true" />
                            Log out
                        </button>
                    </div>
                </nav>
            </div>
        </div>

        <!-- Content column -->
        <div class="lg:pl-64">
            <div class="sticky top-0 z-30 flex h-16 items-center gap-x-4 border-b border-gray-200 bg-white px-4 shadow-sm sm:px-6 lg:px-8">
                <button type="button" class="-m-2.5 p-2.5 text-gray-500 lg:hidden" @click="sidebarOpen = true">
                    <span class="sr-only">Open sidebar</span>
                    <Bars3Icon class="size-6" aria-hidden="true" />
                </button>

                <h1 class="flex-1 text-base font-bold text-gray-900">{{ title }}</h1>

                <div class="flex items-center gap-x-3">
                    <span class="hidden text-sm text-gray-500 sm:inline">{{ user?.name }}</span>
                    <span class="flex size-8 items-center justify-center rounded-full bg-[#907AD6] text-xs font-bold text-white">
                        {{ initial }}
                    </span>
                </div>
            </div>

            <main class="px-4 py-8 sm:px-6 lg:px-8">
                <slot />
            </main>
        </div>
    </div>
</template>
