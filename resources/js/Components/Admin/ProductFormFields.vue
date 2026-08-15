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
            <label class="block text-sm font-semibold text-gray-700">Artist</label>
            <input
                v-model="form.artist"
                type="text"
                class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-[#907AD6] focus:ring-[#907AD6]"
            />
            <p v-if="form.errors.artist" class="mt-1 text-sm text-red-600">{{ form.errors.artist }}</p>
        </div>

        <div>
            <label class="block text-sm font-semibold text-gray-700">Format</label>
            <select
                v-model="form.format"
                class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-[#907AD6] focus:ring-[#907AD6]"
            >
                <option value="Vinyl">Vinyl</option>
                <option value="CD">CD</option>
            </select>
            <p v-if="form.errors.format" class="mt-1 text-sm text-red-600">{{ form.errors.format }}</p>
        </div>

        <div>
            <label class="block text-sm font-semibold text-gray-700">Price ($)</label>
            <input
                v-model="form.price"
                type="number"
                step="0.01"
                min="0"
                class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-[#907AD6] focus:ring-[#907AD6]"
            />
            <p v-if="form.errors.price" class="mt-1 text-sm text-red-600">{{ form.errors.price }}</p>
        </div>

        <div>
            <label class="block text-sm font-semibold text-gray-700">Stock</label>
            <input
                v-model="form.stock"
                type="number"
                min="0"
                class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-[#907AD6] focus:ring-[#907AD6]"
            />
            <p v-if="form.errors.stock" class="mt-1 text-sm text-red-600">{{ form.errors.stock }}</p>
        </div>

        <div>
            <label class="block text-sm font-semibold text-gray-700">
                Badge <span class="font-normal text-gray-400">(optional)</span>
            </label>
            <input
                v-model="form.badge"
                type="text"
                placeholder="e.g. New, Best Seller, Rare"
                class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-[#907AD6] focus:ring-[#907AD6]"
            />
            <p v-if="form.errors.badge" class="mt-1 text-sm text-red-600">{{ form.errors.badge }}</p>
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
            <label class="block text-sm font-semibold text-gray-700">
                Description <span class="font-normal text-gray-400">(optional)</span>
            </label>
            <textarea
                v-model="form.description"
                rows="4"
                class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-[#907AD6] focus:ring-[#907AD6]"
            ></textarea>
            <p v-if="form.errors.description" class="mt-1 text-sm text-red-600">{{ form.errors.description }}</p>
        </div>

        <div class="sm:col-span-2">
            <label class="flex items-center gap-2 text-sm font-semibold text-gray-700">
                <input v-model="form.is_active" type="checkbox" class="rounded border-gray-300 text-[#907AD6] focus:ring-[#907AD6]" />
                Active (visible in the shop)
            </label>
        </div>
    </div>
</template>
