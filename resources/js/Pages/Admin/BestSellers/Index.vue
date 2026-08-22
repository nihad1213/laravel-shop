<script setup>
import AdminLayout from '@/Layouts/AdminLayout.vue'
import { Link, router } from '@inertiajs/vue3'
import { route } from 'ziggy-js'
import { PlusIcon, PencilSquareIcon, TrashIcon } from '@heroicons/vue/24/outline'

defineProps({
    bestSellers: { type: Array, default: () => [] },
})

function formatPrice(value) {
    return `$${Number(value).toFixed(2)}`
}

function destroy(bestSeller) {
    if (confirm(`Remove "${bestSeller.product.title}" from this week's best sellers?`)) {
        router.delete(route('admin.best-sellers.destroy', bestSeller.id))
    }
}
</script>

<template>
    <AdminLayout title="Best Sellers">
        <div class="mb-6 flex items-center justify-between">
            <div>
                <h2 class="text-2xl font-bold text-gray-900">This Week's Best Selling Vinyl Records &amp; CDs</h2>
                <p class="mt-1 text-sm text-gray-500">
                    {{ bestSellers.length }} {{ bestSellers.length === 1 ? 'product' : 'products' }} featured on the homepage carousel.
                </p>
            </div>
            <Link
                :href="route('admin.best-sellers.create')"
                class="flex items-center gap-2 rounded-lg bg-[#907AD6] px-4 py-2 text-sm font-bold text-white transition hover:bg-[#7a63c2]"
            >
                <PlusIcon class="size-4" aria-hidden="true" />
                Add Best Seller
            </Link>
        </div>

        <div v-if="bestSellers.length === 0" class="flex flex-col items-center justify-center rounded-xl border border-dashed border-gray-300 bg-white px-6 py-20 text-center">
            <h3 class="text-lg font-bold text-gray-900">No best sellers yet</h3>
            <p class="mt-1 max-w-sm text-sm text-gray-500">Feature products here to show them in the homepage "This Week's Best Selling" carousel.</p>
            <Link
                :href="route('admin.best-sellers.create')"
                class="mt-4 flex items-center gap-2 rounded-lg bg-[#907AD6] px-4 py-2 text-sm font-bold text-white transition hover:bg-[#7a63c2]"
            >
                <PlusIcon class="size-4" aria-hidden="true" />
                Add Best Seller
            </Link>
        </div>

        <div v-else class="overflow-hidden rounded-xl border border-gray-200 bg-white shadow-sm">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500">Position</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500">Product</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500">Format</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500">Price</th>
                        <th class="px-6 py-3"></th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    <tr v-for="bestSeller in bestSellers" :key="bestSeller.id" class="hover:bg-gray-50">
                        <td class="whitespace-nowrap px-6 py-4 text-sm font-medium text-gray-900">{{ bestSeller.position }}</td>
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-3">
                                <img
                                    v-if="bestSeller.product.image"
                                    :src="bestSeller.product.image"
                                    :alt="bestSeller.product.title"
                                    class="size-10 shrink-0 rounded-lg object-cover"
                                />
                                <span v-else class="flex size-10 shrink-0 items-center justify-center rounded-lg bg-[#DABFFF]/30 text-xs font-bold text-[#4F518C]">
                                    {{ bestSeller.product.title.charAt(0).toUpperCase() }}
                                </span>
                                <div>
                                    <p class="text-sm font-semibold text-gray-900">{{ bestSeller.product.title }}</p>
                                    <p class="text-sm text-gray-500">{{ bestSeller.product.artist }}</p>
                                </div>
                            </div>
                        </td>
                        <td class="whitespace-nowrap px-6 py-4 text-sm text-gray-500">{{ bestSeller.product.format }}</td>
                        <td class="whitespace-nowrap px-6 py-4 text-sm font-medium text-gray-900">{{ formatPrice(bestSeller.product.price) }}</td>
                        <td class="whitespace-nowrap px-6 py-4 text-right">
                            <div class="flex items-center justify-end gap-2">
                                <Link
                                    :href="route('admin.best-sellers.edit', bestSeller.id)"
                                    class="rounded-lg p-2 text-gray-500 hover:bg-gray-100 hover:text-[#4F518C]"
                                    aria-label="Edit best seller"
                                >
                                    <PencilSquareIcon class="size-4" aria-hidden="true" />
                                </Link>
                                <button
                                    type="button"
                                    class="rounded-lg p-2 text-gray-500 hover:bg-red-50 hover:text-red-600"
                                    aria-label="Remove best seller"
                                    @click="destroy(bestSeller)"
                                >
                                    <TrashIcon class="size-4" aria-hidden="true" />
                                </button>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </AdminLayout>
</template>
