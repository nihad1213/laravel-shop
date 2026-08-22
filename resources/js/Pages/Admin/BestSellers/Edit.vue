<script setup>
import AdminLayout from '@/Layouts/AdminLayout.vue'
import { useForm, Link } from '@inertiajs/vue3'
import { route } from 'ziggy-js'

const props = defineProps({
    bestSeller: { type: Object, required: true },
})

const form = useForm({
    position: props.bestSeller.position,
})

function submit() {
    form.put(route('admin.best-sellers.update', props.bestSeller.id))
}
</script>

<template>
    <AdminLayout title="Edit Best Seller">
        <div class="mb-6">
            <h2 class="text-2xl font-bold text-gray-900">Edit Best Seller</h2>
            <p class="mt-1 text-sm text-gray-500">Update the carousel position for "{{ bestSeller.product.title }}".</p>
        </div>

        <div class="mx-auto max-w-3xl">
            <form @submit.prevent="submit" class="space-y-6 rounded-xl border border-gray-200 bg-white p-6 shadow-sm">
                <div class="flex items-center gap-3 rounded-lg bg-gray-50 px-4 py-3">
                    <img
                        v-if="bestSeller.product.image"
                        :src="bestSeller.product.image"
                        :alt="bestSeller.product.title"
                        class="size-10 shrink-0 rounded-lg object-cover"
                    />
                    <div>
                        <p class="text-sm font-semibold text-gray-900">{{ bestSeller.product.title }}</p>
                        <p class="text-sm text-gray-500">{{ bestSeller.product.artist }}</p>
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700">Position</label>
                    <input
                        v-model="form.position"
                        type="number"
                        min="0"
                        class="mt-1 block w-full max-w-xs rounded-lg border-gray-300 shadow-sm focus:border-[#907AD6] focus:ring-[#907AD6]"
                    />
                    <p class="mt-1 text-xs text-gray-400">Lower numbers appear first in the carousel.</p>
                    <p v-if="form.errors.position" class="mt-1 text-sm text-red-600">{{ form.errors.position }}</p>
                </div>

                <div class="flex items-center justify-end gap-3 border-t border-gray-100 pt-6">
                    <Link :href="route('admin.best-sellers.index')" class="rounded-lg px-4 py-2 text-sm font-semibold text-gray-600 hover:bg-gray-100">
                        Cancel
                    </Link>
                    <button
                        type="submit"
                        :disabled="form.processing"
                        class="rounded-lg bg-[#907AD6] px-5 py-2 text-sm font-bold text-white transition hover:bg-[#7a63c2] disabled:opacity-50"
                    >
                        Save Changes
                    </button>
                </div>
            </form>
        </div>
    </AdminLayout>
</template>
