<script setup>
import MainLayout from '@/Layouts/MainLayout.vue';

const values = [
  {
    title: 'Curated Selection',
    description: 'Every record is picked and graded by hand — no blind crates, no surprises when it arrives.',
    icon: 'M12 3v18m0-18l-4 4m4-4l4 4M4 21h16',
  },
  {
    title: 'Fair Pricing',
    description: 'We price against real sale history, not wishful listings, so you know what a record is actually worth.',
    icon: 'M12 1v22M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6',
  },
  {
    title: 'Community First',
    description: 'Trade-ins, listening nights, and local releases — the shop exists because the collectors do.',
    icon: 'M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2M9 11a4 4 0 1 0 0-8 4 4 0 0 0 0 8zM23 21v-2a4 4 0 0 0-3-3.87M16 3.13a4 4 0 0 1 0 7.75',
  },
];

const stats = [
  { label: 'Years running', value: '12' },
  { label: 'Records curated', value: '40K+' },
  { label: 'Cities we ship to', value: '60+' },
];
</script>

<template>
    <MainLayout>
        <div class="mt-10 mb-16">

            <div class="mb-10">
                <div
                    class="bg-[#2C2A4A] py-3.5 pl-6 pr-10 inline-block max-w-full"
                    style="clip-path: polygon(0 0, calc(100% - 28px) 0, 100% 50%, calc(100% - 28px) 100%, 0 100%);"
                >
                    <h1 class="text-lg sm:text-xl font-bold text-white whitespace-nowrap">
                        About Us
                    </h1>
                </div>
            </div>

            <div class="grid grid-cols-1 items-center gap-10 lg:grid-cols-2">
                <div>
                    <h2 class="text-2xl font-bold text-[#2C2A4A] sm:text-3xl">
                        We started this shop because the record wall at home ran out of space.
                    </h2>
                    <p class="mt-4 text-gray-600">
                        What began as a personal collection outgrowing a spare room turned into a storefront
                        for people who care about how music sounds, not just how it streams. We hunt down
                        pressings worth owning, grade them honestly, and price them fairly — whether that's
                        a first pressing from decades back or this week's new release.
                    </p>
                    <p class="mt-4 text-gray-600">
                        Every record that reaches our shelves has been played, checked, and graded by someone
                        who'd want to know the truth about its condition before buying it themselves.
                    </p>
                </div>

                <div class="overflow-hidden rounded-xl bg-gray-100">
                    <img
                        src="https://picsum.photos/seed/aboutus-store/800/600"
                        alt="Inside the record shop"
                        class="h-full w-full object-cover"
                        loading="lazy"
                    />
                </div>
            </div>

            <div class="mt-16 grid grid-cols-1 gap-6 rounded-xl border border-gray-200 bg-white p-8 sm:grid-cols-3">
                <div v-for="stat in stats" :key="stat.label" class="text-center">
                    <p class="text-3xl font-bold text-[#2C2A4A]">{{ stat.value }}</p>
                    <p class="mt-1 text-sm text-gray-500">{{ stat.label }}</p>
                </div>
            </div>

            <div class="mt-16">
                <h2 class="text-center text-2xl font-bold text-[#2C2A4A]">What we stand for</h2>
                <div class="mt-8 grid grid-cols-1 gap-6 sm:grid-cols-3">
                    <div
                        v-for="value in values"
                        :key="value.title"
                        class="rounded-xl border border-gray-200 bg-white p-6 transition hover:-translate-y-1 hover:shadow-lg"
                    >
                        <div class="flex h-11 w-11 items-center justify-center rounded-full bg-[#7FDEFF]">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-[#2C2A4A]" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path :d="value.icon" />
                            </svg>
                        </div>
                        <h3 class="mt-4 font-bold text-[#2C2A4A]">{{ value.title }}</h3>
                        <p class="mt-2 text-sm text-gray-500">{{ value.description }}</p>
                    </div>
                </div>
            </div>

        </div>
    </MainLayout>
</template>