<script setup>
import MainLayout from '@/Layouts/MainLayout.vue';
import ItemsCarousel from '@/Components/ItemsCarousel.vue';
import BlogCard from '@/Components/BlogCard.vue';

defineProps({
  bestSelling: { type: Array, default: () => [] },
  blogPosts: { type: Array, default: () => [] },
});

const mostValuable = [
  { id: 7, title: 'The Quiet Engine', artist: 'Holloway', price: 189.0, image: 'https://picsum.photos/seed/vinyl7/400/400', format: 'Vinyl', badge: 'Rare' },
  { id: 8, title: 'Velvet Static', artist: 'Ruth Anders', price: 245.0, image: 'https://picsum.photos/seed/vinyl8/400/400', format: 'Vinyl', badge: 'Rare' },
  { id: 9, title: 'Copper Skies', artist: 'The Long Signal', price: 132.5, image: 'https://picsum.photos/seed/vinyl9/400/400', format: 'CD' },
  { id: 10, title: 'Iron & Honey', artist: 'Dune Larson', price: 165.0, image: 'https://picsum.photos/seed/vinyl10/400/400', format: 'Vinyl' },
  { id: 11, title: 'Faded Postcards', artist: 'Wren Talbot', price: 210.0, image: 'https://picsum.photos/seed/vinyl11/400/400', format: 'Vinyl', badge: 'Rare' },
];

const mostCollected = [
  { id: 12, title: 'Neon Sermon', artist: 'Blue Static', price: 34.0, image: 'https://picsum.photos/seed/vinyl12/400/400', format: 'Vinyl' },
  { id: 13, title: 'Departure Songs', artist: 'The Wayfarers', price: 29.99, image: 'https://picsum.photos/seed/vinyl13/400/400', format: 'CD' },
  { id: 14, title: 'Marigold', artist: 'Junebird', price: 31.5, image: 'https://picsum.photos/seed/vinyl14/400/400', format: 'Vinyl', badge: 'Collector Pick' },
  { id: 15, title: 'Hollow Bells', artist: 'Ashgrove', price: 27.75, image: 'https://picsum.photos/seed/vinyl15/400/400', format: 'Vinyl' },
  { id: 16, title: 'Static Orchard', artist: 'Fenwick', price: 25.0, image: 'https://picsum.photos/seed/vinyl16/400/400', format: 'CD' },
];
</script>

<template>
    <MainLayout>
        <div class="mt-10 mb-10 align-content-center">
            <div class="mb-10">
                <div class="mb-6">
                    <div
                        class="bg-[#2C2A4A] py-3.5 pl-6 pr-10 inline-block max-w-full"
                        style="clip-path: polygon(0 0, calc(100% - 28px) 0, 100% 50%, calc(100% - 28px) 100%, 0 100%);"
                    >
                        <h1 class="text-lg sm:text-xl font-bold text-white whitespace-nowrap">
                            This Week's Best Selling Vinyl Records &amp; CDs
                        </h1>
                    </div>
                </div>
                <ItemsCarousel :items="bestSelling" />
            </div>

            <div class="mb-10">
                <div class="mb-6">
                    <div
                        class="bg-[#2C2A4A] py-3.5 pl-6 pr-10 inline-block max-w-full"
                        style="clip-path: polygon(0 0, calc(100% - 28px) 0, 100% 50%, calc(100% - 28px) 100%, 0 100%);"
                    >
                        <h1 class="text-lg sm:text-xl font-bold text-white whitespace-nowrap">
                            This Week's Most Valuable Vinyl Records &amp; CDs
                        </h1>
                    </div>
                </div>
                <ItemsCarousel :items="mostValuable" />
            </div>

            <div class="mb-10">
                <div class="mb-6">
                    <div
                        class="bg-[#2C2A4A] py-3.5 pl-6 pr-10 inline-block max-w-full"
                        style="clip-path: polygon(0 0, calc(100% - 28px) 0, 100% 50%, calc(100% - 28px) 100%, 0 100%);"
                    >
                        <h1 class="text-lg sm:text-xl font-bold text-white whitespace-nowrap">
                            This Week's Most Collected Vinyl Records &amp; CDs
                        </h1>
                    </div>
                </div>
                <ItemsCarousel :items="mostCollected" />
            </div>

            <div class="mb-10">
                <div class="mb-6">
                    <div
                        class="bg-[#2C2A4A] py-3.5 pl-4 pr-10 inline-block max-w-full"
                        style="clip-path: polygon(0 0, calc(100% - 28px) 0, 100% 50%, calc(100% - 28px) 100%, 0 100%);"
                    >
                        <h1 class="text-lg sm:text-xl font-bold text-white whitespace-nowrap">
                            Blogs
                        </h1>
                    </div>
                </div>
                <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-4">
                    <BlogCard v-for="post in blogPosts" :key="post.id" :post="post" />
                </div>
            </div>
        </div>
    </MainLayout>
</template>