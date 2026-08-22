<script setup>
import AdminLayout from '@/Layouts/AdminLayout.vue'
import BlogPostFormFields from '@/Components/Admin/BlogPostFormFields.vue'
import { useForm, Link } from '@inertiajs/vue3'
import { route } from 'ziggy-js'

const props = defineProps({
    blogPost: { type: Object, required: true },
})

const form = useForm({
    title: props.blogPost.title,
    category: props.blogPost.category,
    excerpt: props.blogPost.excerpt,
    image: props.blogPost.image ?? '',
    published_at: props.blogPost.published_at.slice(0, 10),
    is_published: props.blogPost.is_published,
})

function submit() {
    form.put(route('admin.blog-posts.update', props.blogPost.id))
}
</script>

<template>
    <AdminLayout title="Edit Blog Post">
        <div class="mb-6">
            <h2 class="text-2xl font-bold text-gray-900">Edit Blog Post</h2>
            <p class="mt-1 text-sm text-gray-500">Update details for "{{ blogPost.title }}".</p>
        </div>

        <div class="mx-auto max-w-3xl">
            <form @submit.prevent="submit" class="space-y-6 rounded-xl border border-gray-200 bg-white p-6 shadow-sm">
                <BlogPostFormFields :form="form" />

                <div class="flex items-center justify-end gap-3 border-t border-gray-100 pt-6">
                    <Link :href="route('admin.blog-posts.index')" class="rounded-lg px-4 py-2 text-sm font-semibold text-gray-600 hover:bg-gray-100">
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
