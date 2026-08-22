<script setup>
import MainLayout from '@/Layouts/MainLayout.vue';
import VinylCard from '@/Components/VinylCard.vue';
import { Link } from '@inertiajs/vue3';
import { route } from 'ziggy-js';

const props = defineProps({
  products: { type: Object, required: true },
  filters: { type: Object, default: () => ({}) },
});

const filterTabs = [
  { label: 'All Records', format: null, featured: null },
  { label: 'Vinyl', format: 'Vinyl', featured: null },
  { label: 'CDs', format: 'CD', featured: null },
  { label: 'New Arrivals', format: null, featured: 'new' },
  { label: 'Best Sellers', format: null, featured: 'best-sellers' },
];

function isActive(tab) {
  return (props.filters.format ?? null) === tab.format && (props.filters.featured ?? null) === tab.featured;
}

function tabHref(tab) {
  const query = {};
  if (tab.format) query.format = tab.format;
  if (tab.featured) query.featured = tab.featured;
  return route('products.index', query);
}
</script>

<template>
  <MainLayout>
    <div class="mt-10 mb-16">
      <div class="mb-6">
        <div
          class="bg-[#2C2A4A] py-3.5 pl-6 pr-10 inline-block max-w-full"
          style="clip-path: polygon(0 0, calc(100% - 28px) 0, 100% 50%, calc(100% - 28px) 100%, 0 100%);"
        >
          <h1 class="text-lg sm:text-xl font-bold text-white whitespace-nowrap">
            Vinyl Records &amp; CDs
          </h1>
        </div>
      </div>

      <div class="mb-8 flex flex-wrap gap-2">
        <Link
          v-for="tab in filterTabs"
          :key="tab.label"
          :href="tabHref(tab)"
          class="rounded-full px-4 py-2 text-sm font-bold transition"
          :class="isActive(tab) ? 'bg-[#907AD6] text-white' : 'bg-gray-100 text-[#2C2A4A] hover:bg-gray-200'"
        >
          {{ tab.label }}
        </Link>
      </div>

      <div v-if="products.data.length === 0" class="rounded-xl border border-dashed border-gray-300 px-6 py-20 text-center text-gray-500">
        No records match this filter yet.
      </div>

      <div v-else class="grid grid-cols-2 gap-6 sm:grid-cols-3 lg:grid-cols-4">
        <VinylCard v-for="item in products.data" :key="item.id" :item="item" />
      </div>

      <nav v-if="products.links.length > 3" class="mt-10 flex flex-wrap items-center justify-center gap-1">
        <template v-for="(link, index) in products.links" :key="index">
          <span
            v-if="!link.url"
            class="rounded-lg px-3 py-2 text-sm font-semibold text-gray-300"
            v-html="link.label"
          />
          <Link
            v-else
            :href="link.url"
            class="rounded-lg px-3 py-2 text-sm font-semibold transition"
            :class="link.active ? 'bg-[#907AD6] text-white' : 'text-[#2C2A4A] hover:bg-gray-100'"
            v-html="link.label"
          />
        </template>
      </nav>
    </div>
  </MainLayout>
</template>
