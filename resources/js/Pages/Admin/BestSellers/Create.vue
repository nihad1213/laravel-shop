<script setup>
import AdminLayout from '@/Layouts/AdminLayout.vue'
import { useForm, Link } from '@inertiajs/vue3'
import { route } from 'ziggy-js'

const props = defineProps({
    products: { type: Array, default: () => [] },
})

const form = useForm({
    product_id: '',
    position: 0,
})

function submit() {
    form.post(route('admin.best-sellers.store'))
}
</script>

<template>
    <AdminLayout title="Add Best Seller">
        <div class="mb-6">
            <h2 class="text-2xl font-bold text-gray-900">Add Best Seller</h2>
            <p class="mt-1 text-sm text-gray-500">Feature a product in this week's best selling carousel.</p>
        </div>

        <div class="mx-auto max-w-3xl">
            <form @submit.prevent="submit" class="space-y-6 rounded-xl border border-gray-200 bg-white p-6 shadow-sm">
                <div v-if="products.length === 0" class="rounded-lg border border-dashed border-gray-300 bg-gray-50 px-4 py-6 text-center text-sm text-gray-500">
                    Every product is already featured. Remove one first, or add a new product to the catalog.
                </div>

                <div v-else class="grid grid-cols-1 gap-6 sm:grid-cols-2">
                    <div class="sm:col-span-2">
                        <label class="block text-sm font-semibold text-gray-700">Product</label>
                        <select
                            v-model="form.product_id"
                            class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-[#907AD6] focus:ring-[#907AD6]"
                        >
                            <option value="" disabled>Select a product&hellip;</option>
                            <option v-for="product in products" :key="product.id" :value="product.id">
                                {{ product.title }} &mdash; {{ product.artist }}
                            </option>
                        </select>
                        <p v-if="form.errors.product_id" class="mt-1 text-sm text-red-600">{{ form.errors.product_id }}</p>
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-700">Position</label>
                        <input
                            v-model="form.position"
                            type="number"
                            min="0"
                            class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-[#907AD6] focus:ring-[#907AD6]"
                        />
                        <p class="mt-1 text-xs text-gray-400">Lower numbers appear first in the carousel.</p>
                        <p v-if="form.errors.position" class="mt-1 text-sm text-red-600">{{ form.errors.position }}</p>
                    </div>
                </div>

                <div class="flex items-center justify-end gap-3 border-t border-gray-100 pt-6">
                    <Link :href="route('admin.best-sellers.index')" class="rounded-lg px-4 py-2 text-sm font-semibold text-gray-600 hover:bg-gray-100">
                        Cancel
                    </Link>
                    <button
                        type="submit"
                        :disabled="form.processing || products.length === 0"
                        class="rounded-lg bg-[#907AD6] px-5 py-2 text-sm font-bold text-white transition hover:bg-[#7a63c2] disabled:opacity-50"
                    >
                        Add to Carousel
                    </button>
                </div>
            </form>
        </div>
    </AdminLayout>
</template>
