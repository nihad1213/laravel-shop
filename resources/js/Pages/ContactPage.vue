<script setup>
import MainLayout from '@/Layouts/MainLayout.vue';
import { reactive } from 'vue';

const form = reactive({
  name: '',
  email: '',
  subject: '',
  message: '',
});

function submitContactForm() {
  console.log('Contact form submitted:', { ...form });
}
</script>

<template>
    <MainLayout>
        <div class="mt-10 mb-16">

            <div class="mb-10">
                <div
                    class="bg-[#2C2A4A] py-3.5 pl-6 pr-10 inline-block max-w-full"
                    style="clip-path: polygon(0 0, calc(100% - 28px) 0, 100% 50%, calc(100% - 28px) 100%, 0 100%);"
                >
                    <h1 class="text-lg sm:text-xl font-bold text-white whitespace-nowrap">
                        Contact Us
                    </h1>
                </div>
            </div>

            <div class="grid grid-cols-1 gap-10 lg:grid-cols-2">

                <!-- Contact form -->
                <div class="rounded-xl border border-gray-200 bg-white p-6 sm:p-8">
                    <h2 class="text-xl font-bold text-[#2C2A4A]">Send us a message</h2>
                    <p class="mt-1 text-sm text-gray-500">We usually reply within one business day.</p>

                    <form class="mt-6 space-y-5" @submit.prevent="submitContactForm">
                        <div class="grid grid-cols-1 gap-5 sm:grid-cols-2">
                            <div>
                                <label for="name" class="block text-sm font-bold text-[#2C2A4A]">Name</label>
                                <input
                                    id="name"
                                    v-model="form.name"
                                    type="text"
                                    name="name"
                                    autocomplete="name"
                                    required
                                    placeholder="Your name"
                                    class="mt-1.5 block w-full rounded-md border border-gray-300 px-3 py-2 text-sm text-[#2C2A4A] placeholder:text-gray-400 focus:border-[#7FDEFF] focus:ring-2 focus:ring-[#7FDEFF]/40 focus:outline-none"
                                />
                            </div>
                            <div>
                                <label for="email" class="block text-sm font-bold text-[#2C2A4A]">Email</label>
                                <input
                                    id="email"
                                    v-model="form.email"
                                    type="email"
                                    name="email"
                                    autocomplete="email"
                                    required
                                    placeholder="you@example.com"
                                    class="mt-1.5 block w-full rounded-md border border-gray-300 px-3 py-2 text-sm text-[#2C2A4A] placeholder:text-gray-400 focus:border-[#7FDEFF] focus:ring-2 focus:ring-[#7FDEFF]/40 focus:outline-none"
                                />
                            </div>
                        </div>

                        <div>
                            <label for="subject" class="block text-sm font-bold text-[#2C2A4A]">Subject</label>
                            <input
                                id="subject"
                                v-model="form.subject"
                                type="text"
                                name="subject"
                                required
                                placeholder="What's this about?"
                                class="mt-1.5 block w-full rounded-md border border-gray-300 px-3 py-2 text-sm text-[#2C2A4A] placeholder:text-gray-400 focus:border-[#7FDEFF] focus:ring-2 focus:ring-[#7FDEFF]/40 focus:outline-none"
                            />
                        </div>

                        <div>
                            <label for="message" class="block text-sm font-bold text-[#2C2A4A]">Message</label>
                            <textarea
                                id="message"
                                v-model="form.message"
                                name="message"
                                rows="5"
                                required
                                placeholder="Tell us how we can help"
                                class="mt-1.5 block w-full resize-none rounded-md border border-gray-300 px-3 py-2 text-sm text-[#2C2A4A] placeholder:text-gray-400 focus:border-[#7FDEFF] focus:ring-2 focus:ring-[#7FDEFF]/40 focus:outline-none"
                            ></textarea>
                        </div>

                        <button
                            type="submit"
                            class="w-full rounded-md bg-[#2C2A4A] px-4 py-2.5 text-sm font-bold text-white transition hover:bg-[#4F518C] sm:w-auto"
                        >
                            Send message
                        </button>
                    </form>
                </div>

                <!-- Map + contact info -->
                <div class="flex flex-col gap-6">
                    <div class="overflow-hidden rounded-xl border border-gray-200 bg-gray-100">
                        <iframe
                            title="Store location map"
                            class="h-64 w-full sm:h-80"
                            style="border:0"
                            loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"
                            src="https://www.google.com/maps?q=New+York,NY&output=embed"
                        ></iframe>
                    </div>

                    <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                        <div class="rounded-xl border border-gray-200 bg-white p-5">
                            <div class="flex h-10 w-10 items-center justify-center rounded-full bg-[#7FDEFF]">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-[#2C2A4A]" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z" />
                                    <circle cx="12" cy="10" r="3" />
                                </svg>
                            </div>
                            <h3 class="mt-3 text-sm font-bold text-[#2C2A4A]">Address</h3>
                            <p class="mt-1 text-sm text-gray-500">123 Vinyl Lane, New York, NY 10001</p>
                        </div>

                        <div class="rounded-xl border border-gray-200 bg-white p-5">
                            <div class="flex h-10 w-10 items-center justify-center rounded-full bg-[#7FDEFF]">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-[#2C2A4A]" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72c.127.96.362 1.903.7 2.81a2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45c.907.338 1.85.573 2.81.7A2 2 0 0 1 22 16.92z" />
                                </svg>
                            </div>
                            <h3 class="mt-3 text-sm font-bold text-[#2C2A4A]">Phone</h3>
                            <p class="mt-1 text-sm text-gray-500">(555) 012-3456</p>
                        </div>

                        <div class="rounded-xl border border-gray-200 bg-white p-5">
                            <div class="flex h-10 w-10 items-center justify-center rounded-full bg-[#7FDEFF]">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-[#2C2A4A]" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M4 4h16v16H4z" opacity="0" />
                                    <path d="M22 6l-10 7L2 6" />
                                    <path d="M2 6h20v12H2z" />
                                </svg>
                            </div>
                            <h3 class="mt-3 text-sm font-bold text-[#2C2A4A]">Email</h3>
                            <p class="mt-1 text-sm text-gray-500">hello@vinylshop.com</p>
                        </div>

                        <div class="rounded-xl border border-gray-200 bg-white p-5">
                            <div class="flex h-10 w-10 items-center justify-center rounded-full bg-[#7FDEFF]">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-[#2C2A4A]" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <circle cx="12" cy="12" r="10" />
                                    <path d="M12 6v6l4 2" />
                                </svg>
                            </div>
                            <h3 class="mt-3 text-sm font-bold text-[#2C2A4A]">Hours</h3>
                            <p class="mt-1 text-sm text-gray-500">Mon-Sat, 10am - 7pm</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </MainLayout>
</template>