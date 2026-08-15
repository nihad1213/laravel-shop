<script setup>
import AdminLayout from '@/Layouts/AdminLayout.vue'
import ProductFormFields from '@/Components/Admin/ProductFormFields.vue'
import { useForm, Link } from '@inertiajs/vue3'
import { route } from 'ziggy-js'

const form = useForm({
    title: '',
    artist: '',
    format: 'Vinyl',
    price: '',
    stock: 0,
    badge: '',
    image: '',
    description: '',
    is_active: true,
})

function submit() {
    form.post(route('admin.products.store'))
}
</script>

<template>
    <AdminLayout title="Add Product">
        <div class="mb-6">
            <h2 class="text-2xl font-bold text-gray-900">Add Product</h2>
            <p class="mt-1 text-sm text-gray-500">Add a new record to the catalog.</p>
        </div>

        <div class="mx-auto max-w-3xl">
            <form @submit.prevent="submit" class="space-y-6 rounded-xl border border-gray-200 bg-white p-6 shadow-sm">
                <ProductFormFields :form="form" />

                <div class="flex items-center justify-end gap-3 border-t border-gray-100 pt-6">
                    <Link :href="route('admin.products.index')" class="rounded-lg px-4 py-2 text-sm font-semibold text-gray-600 hover:bg-gray-100">
                        Cancel
                    </Link>
                    <button
                        type="submit"
                        :disabled="form.processing"
                        class="rounded-lg bg-[#907AD6] px-5 py-2 text-sm font-bold text-white transition hover:bg-[#7a63c2] disabled:opacity-50"
                    >
                        Save Product
                    </button>
                </div>
            </form>
        </div>
    </AdminLayout>
</template>
