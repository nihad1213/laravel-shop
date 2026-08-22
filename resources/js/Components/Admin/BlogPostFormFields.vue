<script setup>
defineProps({
    form: { type: Object, required: true },
})
</script>

<template>
    <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">
        <div class="sm:col-span-2">
            <label class="block text-sm font-semibold text-gray-700">Title</label>
            <input
                v-model="form.title"
                type="text"
                class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-[#907AD6] focus:ring-[#907AD6]"
            />
            <p v-if="form.errors.title" class="mt-1 text-sm text-red-600">{{ form.errors.title }}</p>
        </div>

        <div>
            <label class="block text-sm font-semibold text-gray-700">Category</label>
            <input
                v-model="form.category"
                type="text"
                placeholder="e.g. Guides, Collecting, Stories"
                class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-[#907AD6] focus:ring-[#907AD6]"
            />
            <p v-if="form.errors.category" class="mt-1 text-sm text-red-600">{{ form.errors.category }}</p>
        </div>

        <div>
            <label class="block text-sm font-semibold text-gray-700">Published Date</label>
            <input
                v-model="form.published_at"
                type="date"
                class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-[#907AD6] focus:ring-[#907AD6]"
            />
            <p v-if="form.errors.published_at" class="mt-1 text-sm text-red-600">{{ form.errors.published_at }}</p>
        </div>

        <div class="sm:col-span-2">
            <label class="block text-sm font-semibold text-gray-700">
                Image URL <span class="font-normal text-gray-400">(optional)</span>
            </label>
            <input
                v-model="form.image"
                type="text"
                placeholder="https://..."
                class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-[#907AD6] focus:ring-[#907AD6]"
            />
            <p v-if="form.errors.image" class="mt-1 text-sm text-red-600">{{ form.errors.image }}</p>
        </div>

        <div class="sm:col-span-2">
            <label class="block text-sm font-semibold text-gray-700">Excerpt</label>
            <textarea
                v-model="form.excerpt"
                rows="4"
                class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-[#907AD6] focus:ring-[#907AD6]"
            ></textarea>
            <p v-if="form.errors.excerpt" class="mt-1 text-sm text-red-600">{{ form.errors.excerpt }}</p>
        </div>

        <div class="sm:col-span-2">
            <label class="flex items-center gap-2 text-sm font-semibold text-gray-700">
                <input v-model="form.is_published" type="checkbox" class="rounded border-gray-300 text-[#907AD6] focus:ring-[#907AD6]" />
                Published (visible on the homepage)
            </label>
        </div>
    </div>
</template>
