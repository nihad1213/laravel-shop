<script setup>
import AdminLayout from '@/Layouts/AdminLayout.vue'
import { Link, router } from '@inertiajs/vue3'
import { route } from 'ziggy-js'
import { PlusIcon, PencilSquareIcon, TrashIcon } from '@heroicons/vue/24/outline'

defineProps({
    products: { type: Array, default: () => [] },
})

function formatPrice(value) {
    return `$${Number(value).toFixed(2)}`
}

function destroy(product) {
    if (confirm(`Delete "${product.title}"? This can't be undone.`)) {
        router.delete(route('admin.products.destroy', product.id))
    }
}
</script>

<template>
    <AdminLayout title="Products">
        <div class="mb-6 flex items-center justify-between">
            <div>
                <h2 class="text-2xl font-bold text-gray-900">Products</h2>
                <p class="mt-1 text-sm text-gray-500">{{ products.length }} {{ products.length === 1 ? 'product' : 'products' }} in the catalog.</p>
            </div>
            <Link
                :href="route('admin.products.create')"
                class="flex items-center gap-2 rounded-lg bg-[#907AD6] px-4 py-2 text-sm font-bold text-white transition hover:bg-[#7a63c2]"
            >
                <PlusIcon class="size-4" aria-hidden="true" />
                Add Product
            </Link>
        </div>

        <div v-if="products.length === 0" class="flex flex-col items-center justify-center rounded-xl border border-dashed border-gray-300 bg-white px-6 py-20 text-center">
            <h3 class="text-lg font-bold text-gray-900">No products yet</h3>
            <p class="mt-1 max-w-sm text-sm text-gray-500">Add your first record to start building the catalog.</p>
            <Link
                :href="route('admin.products.create')"
                class="mt-4 flex items-center gap-2 rounded-lg bg-[#907AD6] px-4 py-2 text-sm font-bold text-white transition hover:bg-[#7a63c2]"
            >
                <PlusIcon class="size-4" aria-hidden="true" />
                Add Product
            </Link>
        </div>

        <div v-else class="overflow-hidden rounded-xl border border-gray-200 bg-white shadow-sm">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500">Product</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500">Format</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500">Price</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500">Stock</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500">Status</th>
                        <th class="px-6 py-3"></th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    <tr v-for="product in products" :key="product.id" class="hover:bg-gray-50">
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-3">
                                <img
                                    v-if="product.image"
                                    :src="product.image"
                                    :alt="product.title"
                                    class="size-10 shrink-0 rounded-lg object-cover"
                                />
                                <span v-else class="flex size-10 shrink-0 items-center justify-center rounded-lg bg-[#DABFFF]/30 text-xs font-bold text-[#4F518C]">
                                    {{ product.title.charAt(0).toUpperCase() }}
                                </span>
                                <div>
                                    <p class="text-sm font-semibold text-gray-900">{{ product.title }}</p>
                                    <p class="text-sm text-gray-500">{{ product.artist }}</p>
                                </div>
                            </div>
                        </td>
                        <td class="whitespace-nowrap px-6 py-4 text-sm text-gray-500">{{ product.format }}</td>
                        <td class="whitespace-nowrap px-6 py-4 text-sm font-medium text-gray-900">{{ formatPrice(product.price) }}</td>
                        <td class="whitespace-nowrap px-6 py-4 text-sm text-gray-500">{{ product.stock }}</td>
                        <td class="whitespace-nowrap px-6 py-4">
                            <span
                                class="inline-flex items-center rounded-full px-2.5 py-0.5 text-xs font-semibold"
                                :class="product.is_active ? 'bg-[#7FDEFF]/30 text-[#2C2A4A]' : 'bg-gray-100 text-gray-500'"
                            >
                                {{ product.is_active ? 'Active' : 'Hidden' }}
                            </span>
                        </td>
                        <td class="whitespace-nowrap px-6 py-4 text-right">
                            <div class="flex items-center justify-end gap-2">
                                <Link
                                    :href="route('admin.products.edit', product.id)"
                                    class="rounded-lg p-2 text-gray-500 hover:bg-gray-100 hover:text-[#4F518C]"
                                    aria-label="Edit product"
                                >
                                    <PencilSquareIcon class="size-4" aria-hidden="true" />
                                </Link>
                                <button
                                    type="button"
                                    class="rounded-lg p-2 text-gray-500 hover:bg-red-50 hover:text-red-600"
                                    aria-label="Delete product"
                                    @click="destroy(product)"
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
