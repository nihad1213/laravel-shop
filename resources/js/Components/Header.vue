<script setup>
import { computed, ref } from 'vue'
import {
  Dialog,
  DialogPanel,
  Disclosure,
  DisclosureButton,
  DisclosurePanel,
  Popover,
  PopoverButton,
  PopoverGroup,
  PopoverPanel,
} from '@headlessui/vue'
import {
  Bars3Icon,
  MusicalNoteIcon,
  RectangleStackIcon,
  ShoppingBagIcon,
  SparklesIcon,
  Square3Stack3DIcon,
  TrophyIcon,
  XMarkIcon,
  UserCircleIcon,
} from '@heroicons/vue/24/outline';
import { ArrowRightIcon, ChevronDownIcon, PhoneIcon } from '@heroicons/vue/20/solid';
import { Link, router, usePage } from '@inertiajs/vue3';
import { route } from 'ziggy-js';

const products = [
  { name: 'All Records', description: 'Browse the full catalog of vinyl and CDs', href: route('products.index'), icon: Square3Stack3DIcon },
  { name: 'Vinyl', description: 'Records pressed on wax, sorted by genre and era', href: route('products.index', { format: 'Vinyl' }), icon: MusicalNoteIcon },
  { name: 'CDs', description: 'Compact discs for the format purists', href: route('products.index', { format: 'CD' }), icon: RectangleStackIcon },
  { name: 'New Arrivals', description: 'Freshly added to the shelves this week', href: route('products.index', { featured: 'new' }), icon: SparklesIcon },
  { name: 'Best Sellers', description: "This week's most popular picks", href: route('products.index', { featured: 'best-sellers' }), icon: TrophyIcon },
]
const callsToAction = [
  { name: 'Browse All Records', href: route('products.index'), icon: ArrowRightIcon },
  { name: 'Contact Us', href: route('contact'), icon: PhoneIcon },
]

const mobileMenuOpen = ref(false)

const cartItemCount = ref(3)

const page = usePage();
const user = computed(() => page.props.auth?.user);

function logout() {
  mobileMenuOpen.value = false
  router.post(route('logout'));
}
</script>

<template>
  <header class="bg-[#2C2A4A]">
    <nav class="mx-auto flex max-w-7xl items-center justify-between p-6 lg:px-8" aria-label="Global">
      <div class="flex lg:flex-1">
        <Link :href="route('home')" class="-m-1.5 p-1.5">
          <span class="sr-only">Laravel Shop</span>
          <img class="h-8 w-auto" src="https://tailwindcss.com/plus-assets/img/logos/mark.svg?color=indigo&shade=500" alt="" />
        </Link>
      </div>

      <div class="flex lg:hidden">
        <button
          type="button"
          class="-m-2.5 inline-flex items-center justify-center rounded-md p-2.5 text-white"
          @click="mobileMenuOpen = true"
        >
          <span class="sr-only">Open main menu</span>
          <Bars3Icon class="size-6" aria-hidden="true" />
        </button>
      </div>

      <PopoverGroup class="hidden lg:flex lg:gap-x-12">
        <Popover class="relative">
          <PopoverButton class="flex items-center gap-x-1 text-sm/6 font-semibold text-white">
            Products
            <ChevronDownIcon class="size-5 flex-none text-[#907AD6]" aria-hidden="true" />
          </PopoverButton>

          <transition enter-active-class="transition ease-out duration-200" enter-from-class="opacity-0 translate-y-1" enter-to-class="translate-y-0" leave-active-class="transition ease-in duration-150" leave-from-class="translate-y-0" leave-to-class="opacity-0 translate-y-1">
            <PopoverPanel class="absolute left-1/2 z-10 mt-3 w-screen max-w-md -translate-x-1/2 overflow-hidden rounded-3xl bg-[#4F518C] outline-1 -outline-offset-1 outline-[#DABFFF]/10">
              <div class="p-4">
                <div v-for="item in products" :key="item.name" class="group relative flex items-center gap-x-6 rounded-lg p-4 text-sm/6 hover:bg-[#DABFFF]/10">
                  <div class="flex size-11 flex-none items-center justify-center rounded-lg bg-[#2C2A4A]/50 group-hover:bg-[#2C2A4A]/70">
                    <component :is="item.icon" class="size-6 text-[#907AD6] group-hover:text-[#7FDEFF]" aria-hidden="true" />
                  </div>
                  <div class="flex-auto">
                    <Link :href="item.href" class="block font-bold text-white">
                      {{ item.name }}
                      <span class="absolute inset-0"></span>
                    </Link>
                    <p class="mt-1 text-white/70">{{ item.description }}</p>
                  </div>
                </div>
              </div>
              <div class="grid grid-cols-2 divide-x divide-[#DABFFF]/10 bg-[#2C2A4A]/40">
                <Link v-for="item in callsToAction" :key="item.name" :href="item.href" class="flex items-center justify-center gap-x-2.5 p-3 text-sm/6 font-bold text-white hover:bg-[#2C2A4A]/40">
                  <component :is="item.icon" class="size-5 flex-none text-[#907AD6]" aria-hidden="true" />
                  {{ item.name }}
                </Link>
              </div>
            </PopoverPanel>
          </transition>
        </Popover>

        <Link :href="route('about-us')" class="text-sm/6 font-bold text-white">About Us</Link>
        <Link :href="route('contact')" class="text-sm/6 font-bold text-white">Contact</Link>
      </PopoverGroup>

      <!-- Desktop Right Navigation -->
      <div class="hidden lg:flex lg:flex-1 lg:items-center lg:justify-end lg:gap-x-6">
        <!-- Basket Icon with Badge -->
        <Link href="#" class="relative -m-2 p-2 text-white hover:text-[#7FDEFF] transition-colors">
          <span class="sr-only">View basket</span>
          <ShoppingBagIcon class="size-6" aria-hidden="true" />
          <span
            v-if="cartItemCount > 0"
            class="absolute -top-1 -right-1 flex size-4 items-center justify-center rounded-full bg-[#907AD6] text-[10px] font-bold text-white"
          >
            {{ cartItemCount }}
          </span>
        </Link>

        <span class="h-6 w-px bg-[#DABFFF]/20" aria-hidden="true"></span>

        <template v-if="user">
          <Popover class="relative">
            <PopoverButton class="flex items-center gap-x-1 text-white hover:text-[#7FDEFF] transition-colors">
              <UserCircleIcon class="size-7" aria-hidden="true" />
              <span class="text-sm/6 font-bold">{{ user.name }}</span>
              <ChevronDownIcon class="size-4" aria-hidden="true" />
            </PopoverButton>
            <transition enter-active-class="transition ease-out duration-200" enter-from-class="opacity-0 translate-y-1" enter-to-class="translate-y-0" leave-active-class="transition ease-in duration-150" leave-from-class="translate-y-0" leave-to-class="opacity-0 translate-y-1">
              <PopoverPanel class="absolute right-0 z-10 mt-3 w-48 rounded-2xl bg-[#4F518C] p-2 outline-1 -outline-offset-1 outline-[#DABFFF]/10">
                <button
                  type="button"
                  @click="logout"
                  class="block w-full rounded-lg px-4 py-2 text-left text-sm/6 font-bold text-white hover:bg-[#2C2A4A]/40"
                >
                  Log out
                </button>
              </PopoverPanel>
            </transition>
          </Popover>
        </template>
        <template v-else>
          <Link :href="route('login')" class="text-sm/6 font-bold text-white hover:text-[#7FDEFF] transition-colors">
            Log in <span aria-hidden="true">&rarr;</span>
          </Link>
        </template>
      </div>
    </nav>

    <!-- Mobile menu -->
    <Dialog class="lg:hidden" :open="mobileMenuOpen" @close="mobileMenuOpen = false">
      <div class="fixed inset-0 z-50" />
      <DialogPanel class="fixed inset-y-0 right-0 z-50 w-full overflow-y-auto bg-[#2C2A4A] px-6 py-6 sm:max-w-sm sm:ring-1 sm:ring-white/10">
        <div class="flex items-center justify-between">
          <Link :href="route('home')" class="-m-1.5 p-1.5" @click="mobileMenuOpen = false">
            <span class="sr-only">Laravel Shop</span>
            <img class="h-8 w-auto" src="https://tailwindcss.com/plus-assets/img/logos/mark.svg?color=indigo&shade=500" alt="" />
          </Link>
          <button type="button" class="-m-2.5 rounded-md p-2.5 text-white" @click="mobileMenuOpen = false">
            <span class="sr-only">Close menu</span>
            <XMarkIcon class="size-6" aria-hidden="true" />
          </button>
        </div>
        <div class="mt-6 flow-root">
          <div class="-my-6 divide-y divide-white/10">
            <div class="space-y-2 py-6">
              <Disclosure v-slot="{ open }" as="div">
                <DisclosureButton class="flex w-full items-center justify-between rounded-lg py-2 pl-3 pr-3.5 text-base/7 font-bold text-white hover:bg-white/5">
                  Products
                  <ChevronDownIcon class="size-5 flex-none" :class="open ? 'rotate-180' : ''" aria-hidden="true" />
                </DisclosureButton>
                <DisclosurePanel class="mt-2 space-y-2">
                  <a
                    v-for="item in products"
                    :key="item.name"
                    :href="item.href"
                    class="block rounded-lg py-2 pl-6 pr-3 text-sm/7 font-semibold text-white/80 hover:bg-white/5"
                  >
                    {{ item.name }}
                  </a>
                </DisclosurePanel>
              </Disclosure>
              <Link :href="route('about-us')" class="block rounded-lg py-2 pl-3 pr-3.5 text-base/7 font-bold text-white hover:bg-white/5" @click="mobileMenuOpen = false">
                About Us
              </Link>
              <Link :href="route('contact')" class="block rounded-lg py-2 pl-3 pr-3.5 text-base/7 font-bold text-white hover:bg-white/5" @click="mobileMenuOpen = false">
                Contact
              </Link>
            </div>
            <div class="py-6">
              <template v-if="user">
                <button
                  type="button"
                  class="block w-full rounded-lg py-2.5 pl-3 pr-3.5 text-left text-base/7 font-bold text-white hover:bg-white/5"
                  @click="logout"
                >
                  Log out
                </button>
              </template>
              <template v-else>
                <Link :href="route('login')" class="block rounded-lg py-2.5 pl-3 pr-3.5 text-base/7 font-bold text-white hover:bg-white/5" @click="mobileMenuOpen = false">
                  Log in
                </Link>
              </template>
            </div>
          </div>
        </div>
      </DialogPanel>
    </Dialog>
  </header>
</template>
