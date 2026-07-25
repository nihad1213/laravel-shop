<script setup>
defineProps({
  item: {
    type: Object,
    required: true,
  },
});
</script>

<template>
  <div class="group flex h-full flex-col overflow-hidden rounded-xl border border-gray-200 bg-white transition duration-200 hover:-translate-y-1 hover:shadow-lg">
    <div class="relative aspect-square overflow-hidden bg-gray-100">
      <img
        :src="item.image"
        :alt="`${item.title} cover art`"
        class="h-full w-full object-cover transition duration-300 group-hover:scale-105"
        loading="lazy"
      />

      <span
        v-if="item.badge"
        class="absolute top-2 left-2 rounded-full bg-[#2C2A4A] px-2.5 py-1 text-[11px] font-bold tracking-wide text-white uppercase"
      >
        {{ item.badge }}
      </span>

      <span
        class="absolute top-2 right-2 rounded-full bg-white/90 px-2.5 py-1 text-[11px] font-bold text-[#2C2A4A]"
      >
        {{ item.format }}
      </span>
    </div>

    <div class="flex flex-1 flex-col p-4">
      <h3 class="truncate font-bold text-[#2C2A4A]">{{ item.title }}</h3>
      <p class="mt-0.5 truncate text-sm text-gray-500">{{ item.artist }}</p>

      <div class="mt-3 flex items-center justify-between">
        <span class="text-base font-bold text-[#2C2A4A]">${{ item.price.toFixed(2) }}</span>

        <button
          type="button"
          class="rounded-full bg-[#7FDEFF] p-2 text-[#2C2A4A] transition hover:bg-[#907AD6] hover:text-white"
          aria-label="Add to cart"
        >
          <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <circle cx="9" cy="21" r="1" />
            <circle cx="20" cy="21" r="1" />
            <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6" />
          </svg>
        </button>
      </div>
    </div>
  </div>
</template>