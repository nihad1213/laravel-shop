<script setup>
defineProps({
  post: {
    type: Object,
    required: true,
    // expected shape: { id, title, excerpt, image, date, category }
  },
});
</script>

<template>
  <article class="group flex h-full flex-col overflow-hidden rounded-xl border border-gray-200 bg-white transition duration-200 hover:-translate-y-1 hover:shadow-lg">
    <div class="relative aspect-16/10 overflow-hidden bg-gray-100">
      <img
        :src="post.image"
        :alt="post.title"
        class="h-full w-full object-cover transition duration-300 group-hover:scale-105"
        loading="lazy"
      />
      <span class="absolute top-2 left-2 rounded-full bg-[#907AD6] px-2.5 py-1 text-[11px] font-bold tracking-wide text-white uppercase">
        {{ post.category }}
      </span>
    </div>

    <div class="flex flex-1 flex-col p-4">
      <span class="text-xs font-bold tracking-wide text-[#907AD6] uppercase">{{ post.date }}</span>
      <h3 class="mt-1 line-clamp-2 font-bold text-[#2C2A4A]">{{ post.title }}</h3>
      <p class="mt-2 line-clamp-2 text-sm text-gray-500">{{ post.excerpt }}</p>

      <a href="#" class="mt-4 inline-flex items-center gap-1 text-sm font-bold text-[#2C2A4A] transition hover:text-[#907AD6]">
        Read more
        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
          <path d="M5 12h14M12 5l7 7-7 7" />
        </svg>
      </a>
    </div>
  </article>
</template>