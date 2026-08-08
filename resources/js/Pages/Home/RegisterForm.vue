<script setup>
import { Link, useForm } from '@inertiajs/vue3';
import { route } from 'ziggy-js'; 
import Header from '@/Components/Header.vue';
import Footer from '@/Components/Footer.vue';

const form = useForm({
  name: '',
  email: '',
  password: '',
  password_confirmation: '',
});

function submit() {
  form.post(route('register.store'), {
    onFinish: () => form.reset('password', 'password_confirmation'),
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
          Create your account
        </h2>
        <p class="mt-2 text-center text-sm/6 text-[#2C2A4A]/60">
          Join us, it only takes a minute.
        </p>
      </div>

      <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
        <div class="rounded-3xl bg-white p-8 outline-1 -outline-offset-1 outline-[#2C2A4A]/10 shadow-xl">
          <form class="space-y-6" @submit.prevent="submit">
            <div>
              <label for="name" class="block text-sm/6 font-semibold text-[#2C2A4A]">
                Full name
              </label>
              <div class="mt-2">
                <input
                  id="name"
                  v-model="form.name"
                  type="text"
                  name="name"
                  autocomplete="name"
                  class="block w-full rounded-lg border-0 bg-[#2C2A4A]/5 px-3 py-2 text-sm/6 text-[#2C2A4A] outline-1 -outline-offset-1 outline-[#2C2A4A]/15 placeholder:text-[#2C2A4A]/40 focus:outline-2 focus:-outline-offset-2 focus:outline-[#907AD6]"
                />
                <p v-if="form.errors.name" class="mt-1 text-sm text-red-600">{{ form.errors.name }}</p>
              </div>
            </div>

            <div>
              <label for="email" class="block text-sm/6 font-semibold text-[#2C2A4A]">
                Email address
              </label>
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
              <label for="password" class="block text-sm/6 font-semibold text-[#2C2A4A]">
                Password
              </label>
              <div class="mt-2">
                <input
                  id="password"
                  v-model="form.password"
                  type="password"
                  name="password"
                  autocomplete="new-password"
                  class="block w-full rounded-lg border-0 bg-[#2C2A4A]/5 px-3 py-2 text-sm/6 text-[#2C2A4A] outline-1 -outline-offset-1 outline-[#2C2A4A]/15 placeholder:text-[#2C2A4A]/40 focus:outline-2 focus:-outline-offset-2 focus:outline-[#907AD6]"
                />
                <p v-if="form.errors.password" class="mt-1 text-sm text-red-600">{{ form.errors.password }}</p>
              </div>
            </div>

            <div>
              <label for="password_confirmation" class="block text-sm/6 font-semibold text-[#2C2A4A]">
                Confirm password
              </label>
              <div class="mt-2">
                <input
                  id="password_confirmation"
                  v-model="form.password_confirmation"
                  type="password"
                  name="password_confirmation"
                  autocomplete="new-password"
                  class="block w-full rounded-lg border-0 bg-[#2C2A4A]/5 px-3 py-2 text-sm/6 text-[#2C2A4A] outline-1 -outline-offset-1 outline-[#2C2A4A]/15 placeholder:text-[#2C2A4A]/40 focus:outline-2 focus:-outline-offset-2 focus:outline-[#907AD6]"
                />
                <p v-if="form.errors.password_confirmation" class="mt-1 text-sm text-red-600">{{ form.errors.password_confirmation }}</p>
              </div>
            </div>

            <div>
              <button
                type="submit"
                :disabled="form.processing"
                class="flex w-full justify-center rounded-lg bg-[#907AD6] px-3 py-2.5 text-sm/6 font-bold text-white shadow-sm hover:bg-[#7FDEFF] hover:text-[#2C2A4A] transition-colors disabled:opacity-50 disabled:cursor-not-allowed"
              >
                {{ form.processing ? 'Creating account...' : 'Create account' }}
              </button>
            </div>
          </form>
        </div>

        <p class="mt-8 text-center text-sm/6 text-[#2C2A4A]/60">
          Already have an account?
          <Link :href="route('login')" class="font-bold text-[#907AD6] hover:text-[#4F518C] transition-colors">
            Log in here
          </Link>
        </p>
      </div>
    </main>

    <Footer />
  </div>
</template>