<script setup>
import AdminLayout from '@/Layouts/AdminLayout.vue'
import { Link, router } from '@inertiajs/vue3'
import { route } from 'ziggy-js'
import { PlusIcon, PencilSquareIcon, TrashIcon } from '@heroicons/vue/24/outline'

defineProps({
    blogPosts: { type: Array, default: () => [] },
})

function formatDate(value) {
    return new Date(value).toLocaleDateString('en-US', { year: 'numeric', month: 'short', day: 'numeric' })
}

function destroy(post) {
    if (confirm(`Delete "${post.title}"? This can't be undone.`)) {
        router.delete(route('admin.blog-posts.destroy', post.id))
    }
}
</script>

<template>
    <AdminLayout title="Blog Posts">
        <div class="mb-6 flex items-center justify-between">
            <div>
                <h2 class="text-2xl font-bold text-gray-900">Blog Posts</h2>
                <p class="mt-1 text-sm text-gray-500">{{ blogPosts.length }} {{ blogPosts.length === 1 ? 'post' : 'posts' }} in the blog.</p>
            </div>
            <Link
                :href="route('admin.blog-posts.create')"
                class="flex items-center gap-2 rounded-lg bg-[#907AD6] px-4 py-2 text-sm font-bold text-white transition hover:bg-[#7a63c2]"
            >
                <PlusIcon class="size-4" aria-hidden="true" />
                Add Post
            </Link>
        </div>

        <div v-if="blogPosts.length === 0" class="flex flex-col items-center justify-center rounded-xl border border-dashed border-gray-300 bg-white px-6 py-20 text-center">
            <h3 class="text-lg font-bold text-gray-900">No blog posts yet</h3>
            <p class="mt-1 max-w-sm text-sm text-gray-500">Write your first post to start filling the homepage blog section.</p>
            <Link
                :href="route('admin.blog-posts.create')"
                class="mt-4 flex items-center gap-2 rounded-lg bg-[#907AD6] px-4 py-2 text-sm font-bold text-white transition hover:bg-[#7a63c2]"
            >
                <PlusIcon class="size-4" aria-hidden="true" />
                Add Post
            </Link>
        </div>

        <div v-else class="overflow-hidden rounded-xl border border-gray-200 bg-white shadow-sm">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500">Post</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500">Category</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500">Published</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500">Status</th>
                        <th class="px-6 py-3"></th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    <tr v-for="post in blogPosts" :key="post.id" class="hover:bg-gray-50">
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-3">
                                <img
                                    v-if="post.image"
                                    :src="post.image"
                                    :alt="post.title"
                                    class="size-10 shrink-0 rounded-lg object-cover"
                                />
                                <span v-else class="flex size-10 shrink-0 items-center justify-center rounded-lg bg-[#DABFFF]/30 text-xs font-bold text-[#4F518C]">
                                    {{ post.title.charAt(0).toUpperCase() }}
                                </span>
                                <p class="text-sm font-semibold text-gray-900">{{ post.title }}</p>
                            </div>
                        </td>
                        <td class="whitespace-nowrap px-6 py-4 text-sm text-gray-500">{{ post.category }}</td>
                        <td class="whitespace-nowrap px-6 py-4 text-sm text-gray-500">{{ formatDate(post.published_at) }}</td>
                        <td class="whitespace-nowrap px-6 py-4">
                            <span
                                class="inline-flex items-center rounded-full px-2.5 py-0.5 text-xs font-semibold"
                                :class="post.is_published ? 'bg-[#7FDEFF]/30 text-[#2C2A4A]' : 'bg-gray-100 text-gray-500'"
                            >
                                {{ post.is_published ? 'Published' : 'Draft' }}
                            </span>
                        </td>
                        <td class="whitespace-nowrap px-6 py-4 text-right">
                            <div class="flex items-center justify-end gap-2">
                                <Link
                                    :href="route('admin.blog-posts.edit', post.id)"
                                    class="rounded-lg p-2 text-gray-500 hover:bg-gray-100 hover:text-[#4F518C]"
                                    aria-label="Edit post"
                                >
                                    <PencilSquareIcon class="size-4" aria-hidden="true" />
                                </Link>
                                <button
                                    type="button"
                                    class="rounded-lg p-2 text-gray-500 hover:bg-red-50 hover:text-red-600"
                                    aria-label="Delete post"
                                    @click="destroy(post)"
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
