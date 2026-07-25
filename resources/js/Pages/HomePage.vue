<script setup>
import MainLayout from '@/Layouts/MainLayout.vue';
import ItemsCarousel from '@/Components/ItemsCarousel.vue';
import BlogCard from '@/Components/BlogCard.vue';

const bestSelling = [
  { id: 1, title: 'Midnight Static', artist: 'Coral Drift', price: 24.99, image: 'https://picsum.photos/seed/vinyl1/400/400', format: 'Vinyl', badge: 'Best Seller' },
  { id: 2, title: 'Glass Harbor', artist: 'The Nightwires', price: 19.5, image: 'https://picsum.photos/seed/vinyl2/400/400', format: 'CD' },
  { id: 3, title: 'Paper Moons', artist: 'Ivy & Echo', price: 27.0, image: 'https://picsum.photos/seed/vinyl3/400/400', format: 'Vinyl', badge: 'New' },
  { id: 4, title: 'Static Bloom', artist: 'Marlowe', price: 22.25, image: 'https://picsum.photos/seed/vinyl4/400/400', format: 'Vinyl' },
  { id: 5, title: 'Low Tide Radio', artist: 'Salt & Cedar', price: 18.99, image: 'https://picsum.photos/seed/vinyl5/400/400', format: 'CD' },
  { id: 6, title: 'Amber Signals', artist: 'Foxglove', price: 26.5, image: 'https://picsum.photos/seed/vinyl6/400/400', format: 'Vinyl' },
  { id: 7, title: 'Amber Signals', artist: 'Foxglove', price: 26.5, image: 'https://picsum.photos/seed/vinyl6/400/400', format: 'Vinyl' },

];

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

const blogPosts = [
  { id: 1, title: 'How to Store Your Vinyl Collection the Right Way', excerpt: 'Humidity, sunlight, and shelf angle all matter more than you think when it comes to keeping records in shape.', image: 'https://picsum.photos/seed/blog1/400/250', date: 'Jul 12, 2026', category: 'Guides' },
  { id: 2, title: '5 Overlooked Pressings Worth a Second Look', excerpt: 'Some of the best sounding records never got the hype. Here are five that deserve more attention.', image: 'https://picsum.photos/seed/blog2/400/250', date: 'Jul 6, 2026', category: 'Collecting' },
  { id: 3, title: 'CD or Vinyl: Does the Format Actually Change the Sound?', excerpt: 'We break down the real differences between formats, beyond the usual debate.', image: 'https://picsum.photos/seed/blog3/400/250', date: 'Jun 28, 2026', category: 'Deep Dive' },
  { id: 4, title: 'Inside a Record Shop: A Day on the Floor', excerpt: 'What it actually takes to keep a crate-digging destination running week to week.', image: 'https://picsum.photos/seed/blog4/400/250', date: 'Jun 19, 2026', category: 'Stories' },
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
                        class="bg-[#2C2A4A] py-3.5 pl-6 pr-10 inline-block max-w-full"
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