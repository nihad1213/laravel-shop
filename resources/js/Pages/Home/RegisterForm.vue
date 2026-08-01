<script setup>
import { Link } from '@inertiajs/vue3'
</script>

<template>
  <div class="flex min-h-screen flex-col justify-center bg-[#2C2A4A] px-6 py-12 lg:px-8">
    <div class="sm:mx-auto sm:w-full sm:max-w-sm">
      <Link href="#" class="flex justify-center">
        <img
          class="h-10 w-auto"
          src="https://tailwindcss.com/plus-assets/img/logos/mark.svg?color=indigo&shade=500"
          alt="Laravel Shop"
        />
      </Link>
      <h2 class="mt-8 text-center text-2xl/9 font-bold tracking-tight text-white">
        Create your account
      </h2>
      <p class="mt-2 text-center text-sm/6 text-white/60">
        Join us, it only takes a minute.
      </p>
    </div>

    <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
      <div class="rounded-3xl bg-[#4F518C] p-8 outline-1 -outline-offset-1 outline-[#DABFFF]/10 shadow-xl">
        <form class="space-y-6">
          <div>
            <label for="name" class="block text-sm/6 font-semibold text-white">
              Full name
            </label>
            <div class="mt-2">
              <input
                id="name"
                type="text"
                name="name"
                autocomplete="name"
                class="block w-full rounded-lg border-0 bg-[#2C2A4A]/50 px-3 py-2 text-sm/6 text-white outline-1 -outline-offset-1 outline-[#DABFFF]/20 placeholder:text-white/40 focus:outline-2 focus:-outline-offset-2 focus:outline-[#7FDEFF]"
              />
            </div>
          </div>

          <div>
            <label for="email" class="block text-sm/6 font-semibold text-white">
              Email address
            </label>
            <div class="mt-2">
              <input
                id="email"
                type="email"
                name="email"
                autocomplete="email"
                class="block w-full rounded-lg border-0 bg-[#2C2A4A]/50 px-3 py-2 text-sm/6 text-white outline-1 -outline-offset-1 outline-[#DABFFF]/20 placeholder:text-white/40 focus:outline-2 focus:-outline-offset-2 focus:outline-[#7FDEFF]"
              />
            </div>
          </div>

          <div>
            <label for="password" class="block text-sm/6 font-semibold text-white">
              Password
            </label>
            <div class="mt-2">
              <input
                id="password"
                type="password"
                name="password"
                autocomplete="new-password"
                class="block w-full rounded-lg border-0 bg-[#2C2A4A]/50 px-3 py-2 text-sm/6 text-white outline-1 -outline-offset-1 outline-[#DABFFF]/20 placeholder:text-white/40 focus:outline-2 focus:-outline-offset-2 focus:outline-[#7FDEFF]"
              />
            </div>
          </div>

          <div>
            <label for="password_confirmation" class="block text-sm/6 font-semibold text-white">
              Confirm password
            </label>
            <div class="mt-2">
              <input
                id="password_confirmation"
                type="password"
                name="password_confirmation"
                autocomplete="new-password"
                class="block w-full rounded-lg border-0 bg-[#2C2A4A]/50 px-3 py-2 text-sm/6 text-white outline-1 -outline-offset-1 outline-[#DABFFF]/20 placeholder:text-white/40 focus:outline-2 focus:-outline-offset-2 focus:outline-[#7FDEFF]"
              />
            </div>
          </div>

          <div>
            <button
              type="submit"
              class="flex w-full justify-center rounded-lg bg-[#907AD6] px-3 py-2.5 text-sm/6 font-bold text-white shadow-sm hover:bg-[#7FDEFF] hover:text-[#2C2A4A] transition-colors"
            >
              Create account
            </button>
          </div>
        </form>
      </div>

      <p class="mt-8 text-center text-sm/6 text-white/60">
        Already have an account?
        <Link :href="route('login')" class="font-bold text-[#907AD6] hover:text-[#7FDEFF] transition-colors">
          Log in here
        </Link>
      </p>
    </div>
  </div>
</template>