<script setup>
import { Swiper, SwiperSlide } from 'swiper/vue';
import { Navigation } from 'swiper/modules';
import 'swiper/css';
import 'swiper/css/navigation';
import VinylCard from '@/Components/VinylCard.vue';

defineProps({
  items: {
    type: Array,
    required: true,
  },
});
</script>

<template>
  <div class="group/carousel relative">
    <Swiper
      :modules="[Navigation]"
      :navigation="{ nextEl: '.carousel-next', prevEl: '.carousel-prev' }"
      :space-between="16"
      :slides-per-view="2"
      :breakpoints="{
        480: { slidesPerView: 2 },
        640: { slidesPerView: 3 },
        1024: { slidesPerView: 4 },
        1280: { slidesPerView: 5 },
      }"
    >
      <SwiperSlide v-for="item in items" :key="item.id" class="h-auto pb-1">
        <VinylCard :item="item" />
      </SwiperSlide>
    </Swiper>

    <button
      type="button"
      class="carousel-prev absolute top-1/2 left-2 z-10 -translate-y-1/2 rounded-full border border-gray-200 bg-white p-2 text-[#2C2A4A] opacity-0 shadow-md transition group-hover/carousel:opacity-100 hover:bg-[#2C2A4A] hover:text-white"
      aria-label="Previous items"
    >
      <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
        <path d="M15 18l-6-6 6-6" />
      </svg>
    </button>
    <button
      type="button"
      class="carousel-next absolute top-1/2 right-2 z-10 -translate-y-1/2 rounded-full border border-gray-200 bg-white p-2 text-[#2C2A4A] opacity-0 shadow-md transition group-hover/carousel:opacity-100 hover:bg-[#2C2A4A] hover:text-white"
      aria-label="Next items"
    >
      <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
        <path d="M9 18l6-6-6-6" />
      </svg>
    </button>
  </div>
</template>