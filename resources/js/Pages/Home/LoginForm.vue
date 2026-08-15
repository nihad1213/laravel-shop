<script setup>
import { Link, useForm } from '@inertiajs/vue3';
import { route } from 'ziggy-js';
import { Ziggy } from '@/ziggy';
import Header from '@/Components/Header.vue';
import Footer from '@/Components/Footer.vue';

const form = useForm({
  email: '',
  password: '',
  remember: false,
});

function submit() {
  form.post(route('login.store', undefined, undefined, Ziggy), {
    onFinish: () => form.reset('password'),
  })
}

</script>

<template>
  <div class="flex min-h-screen flex-col bg-white">
    <Header />

    <main class="flex flex-1 flex-col justify-center px-6 py-12 lg:px-8">
      <div class="sm:mx-auto sm:w-full sm:max-w-sm">
        <Link href="#" class="flex justify-center">
          <img
            class="h-10 w-auto"
            src="https://tailwindcss.com/plus-assets/img/logos/mark.svg?color=indigo&shade=500"
            alt="Laravel Shop"
          />
        </Link>
        <h2 class="mt-8 text-center text-2xl/9 font-bold tracking-tight text-[#2C2A4A]">
          Sign in to your account
        </h2>
        <p class="mt-2 text-center text-sm/6 text-[#2C2A4A]/60">
          Welcome back, we missed you.
        </p>
      </div>

      <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
        <div class="rounded-3xl bg-white p-8 outline-1 -outline-offset-1 outline-[#2C2A4A]/10 shadow-xl">
          <form class="space-y-6" @submit.prevent="submit">
            <div>
              <label for="email" class="block text-sm/6 font-semibold text-[#2C2A4A]">Email address</label>
              <div class="mt-2">
                <input
                  id="email"
                  v-model="form.email"
                  type="email"
                  name="email"
                  autocomplete="email"
                  class="block w-full rounded-lg border-0 bg-[#2C2A4A]/5 px-3 py-2 text-sm/6 text-[#2C2A4A] outline-1 -outline-offset-1 outline-[#2C2A4A]/15 placeholder:text-[#2C2A4A]/40 focus:outline-2 focus:-outline-offset-2 focus:outline-[#907AD6]"
                />
                <p v-if="form.errors.email" class="mt-1 text-sm text-red-600">{{ form.errors.email }}</p>
              </div>
            </div>          

            <div>
              <div class="flex items-center justify-between">
                <label for="password" class="block text-sm/6 font-semibold text-[#2C2A4A]">Password</label>
                <Link href="#" class="text-sm font-semibold text-[#907AD6] hover:text-[#4F518C] transition-colors">
                  Forgot password?
                </Link>
              </div>
              <div class="mt-2">
                <input
                  id="password"
                  v-model="form.password"
                  type="password"
                  name="password"
                  autocomplete="current-password"
                  class="block w-full rounded-lg border-0 bg-[#2C2A4A]/5 px-3 py-2 text-sm/6 text-[#2C2A4A] outline-1 -outline-offset-1 outline-[#2C2A4A]/15 placeholder:text-[#2C2A4A]/40 focus:outline-2 focus:-outline-offset-2 focus:outline-[#907AD6]"
                />
                <p v-if="form.errors.password" class="mt-1 text-sm text-red-600">{{ form.errors.password }}</p>
              </div>
            </div>          

            <div class="flex items-center">
              <input
                id="remember"
                v-model="form.remember"
                type="checkbox"
                name="remember"
                class="size-4 rounded border-[#2C2A4A]/20 bg-white text-[#907AD6] focus:ring-[#907AD6]"
              />
              <label for="remember" class="ml-2 block text-sm text-[#2C2A4A]/70">Remember me</label>
            </div>          

            <div>
              <button
                type="submit"
                :disabled="form.processing"
                class="flex w-full justify-center rounded-lg bg-[#907AD6] px-3 py-2.5 text-sm/6 font-bold text-white shadow-sm hover:bg-[#7FDEFF] hover:text-[#2C2A4A] transition-colors disabled:opacity-50"
              >
                Sign in
              </button>
            </div>
          </form>
        </div>

        <p class="mt-8 text-center text-sm/6 text-[#2C2A4A]/60">
          Don't have an account?
          <Link :href="route('register', undefined, undefined, Ziggy)" class="font-bold text-[#907AD6] hover:text-[#4F518C] transition-colors">
            Register here
          </Link>
        </p>
      </div>
    </main>

    <Footer />
  </div>
</template>