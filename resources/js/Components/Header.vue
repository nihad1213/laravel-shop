<script setup>
import { ref } from 'vue'
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
  ArrowPathIcon,
  Bars3Icon,
  ChartPieIcon,
  CursorArrowRaysIcon,
  FingerPrintIcon,
  ShoppingBagIcon, // <--- Added Shopping Bag Icon
  SquaresPlusIcon,
  XMarkIcon,
} from '@heroicons/vue/24/outline';
import { ChevronDownIcon, PhoneIcon, PlayCircleIcon } from '@heroicons/vue/20/solid';
import { Link } from '@inertiajs/vue3';

const products = [
  { name: 'Analytics', description: 'Get a better understanding of your traffic', href: '#', icon: ChartPieIcon },
  { name: 'Engagement', description: 'Speak directly to your customers', href: '#', icon: CursorArrowRaysIcon },
  { name: 'Security', description: 'Your customers’ data will be safe and secure', href: '#', icon: FingerPrintIcon },
  { name: 'Integrations', description: 'Connect with third-party tools', href: '#', icon: SquaresPlusIcon },
  { name: 'Automations', description: 'Build strategic funnels that will convert', href: '#', icon: ArrowPathIcon },
]
const callsToAction = [
  { name: 'Watch demo', href: '#', icon: PlayCircleIcon },
  { name: 'Contact sales', href: '#', icon: PhoneIcon },
]

const mobileMenuOpen = ref(false)

// Optional: Item count for cart badge (replace with your Pinia store or prop)
const cartItemCount = ref(3) 
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

      <!-- Mobile Right Controls (Cart + Mobile Menu Toggle) -->
      <div class="flex items-center gap-x-4 lg:hidden">
        <!-- Mobile Cart Icon -->
        <Link href="#" class="relative -m-2.5 p-2.5 text-white hover:text-[#7FDEFF] transition-colors">
          <span class="sr-only">View cart</span>
          <ShoppingBagIcon class="size-6" aria-hidden="true" />
          <span v-if="cartItemCount > 0" class="absolute top-1 right-1 flex size-4 items-center justify-center rounded-full bg-[#907AD6] text-[10px] font-bold text-white">
            {{ cartItemCount }}
          </span>
        </Link>

        <button type="button" class="-m-2.5 inline-flex items-center justify-center rounded-md p-2.5 text-[#907AD6]" @click="mobileMenuOpen = true">
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
                    <a :href="item.href" class="block font-bold text-white">
                      {{ item.name }}
                      <span class="absolute inset-0"></span>
                    </a>
                    <p class="mt-1 text-white/70">{{ item.description }}</p>
                  </div>
                </div>
              </div>
              <div class="grid grid-cols-2 divide-x divide-[#DABFFF]/10 bg-[#2C2A4A]/40">
                <a v-for="item in callsToAction" :key="item.name" :href="item.href" class="flex items-center justify-center gap-x-2.5 p-3 text-sm/6 font-bold text-white hover:bg-[#2C2A4A]/40">
                  <component :is="item.icon" class="size-5 flex-none text-[#907AD6]" aria-hidden="true" />
                  {{ item.name }}
                </a>
              </div>
            </PopoverPanel>
          </transition>
        </Popover>

        <a href="#" class="text-sm/6 font-bold text-white">Marketplace</a>
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

        <a href="#" class="text-sm/6 font-bold text-white hover:text-[#7FDEFF] transition-colors">
          Log in <span aria-hidden="true">&rarr;</span>
        </a>
      </div>
    </nav>

    <!-- Mobile Navigation Drawer -->
    <Dialog class="lg:hidden" @close="mobileMenuOpen = false" :open="mobileMenuOpen">
      <div class="fixed inset-0 z-50"></div>
      <DialogPanel class="fixed inset-y-0 right-0 z-50 w-full overflow-y-auto bg-[#2C2A4A] p-6 sm:max-w-sm sm:ring-1 sm:ring-[#DABFFF]/10">
        <div class="flex items-center justify-between">
          <a href="#" class="-m-1.5 p-1.5">
            <span class="sr-only">Your Company</span>
            <img class="h-8 w-auto" src="https://tailwindcss.com/plus-assets/img/logos/mark.svg?color=indigo&shade=500" alt="" />
          </a>
          <button type="button" class="-m-2.5 rounded-md p-2.5 text-[#907AD6]" @click="mobileMenuOpen = false">
            <span class="sr-only">Close menu</span>
            <XMarkIcon class="size-6" aria-hidden="true" />
          </button>
        </div>
        <div class="mt-6 flow-root">
          <div class="-my-6 divide-y divide-[#DABFFF]/10">
            <div class="space-y-2 py-6">
              <Disclosure as="div" class="-mx-3" v-slot="{ open }">
                <DisclosureButton class="flex w-full items-center justify-between rounded-lg py-2 pr-3.5 pl-3 text-base/7 font-semibold text-white hover:bg-[#DABFFF]/10">
                  Product
                  <ChevronDownIcon :class="[open ? 'rotate-180' : '', 'size-5 flex-none']" aria-hidden="true" />
                </DisclosureButton>
                <DisclosurePanel class="mt-2 space-y-2">
                  <DisclosureButton v-for="item in [...products, ...callsToAction]" :key="item.name" as="a" :href="item.href" class="block rounded-lg py-2 pr-3 pl-6 text-sm/7 font-bold text-white hover:bg-[#DABFFF]/10">{{ item.name }}</DisclosureButton>
                </DisclosurePanel>
              </Disclosure>
              <a href="#" class="-mx-3 block rounded-lg px-3 py-2 text-base/7 font-bold text-white hover:bg-[#DABFFF]/10">Features</a>
              <a href="#" class="-mx-3 block rounded-lg px-3 py-2 text-base/7 font-bold text-white hover:bg-[#DABFFF]/10">Marketplace</a>
              <a href="#" class="-mx-3 block rounded-lg px-3 py-2 text-base/7 font-bold text-white hover:bg-[#DABFFF]/10">Company</a>
              
              <!-- Mobile Cart Link -->
              <a href="#" class="-mx-3 flex items-center justify-between rounded-lg px-3 py-2 text-base/7 font-bold text-white hover:bg-[#DABFFF]/10">
                <span class="flex items-center gap-x-2">
                  <ShoppingBagIcon class="size-5 text-[#907AD6]" aria-hidden="true" />
                  Basket
                </span>
                <span v-if="cartItemCount > 0" class="rounded-full bg-[#907AD6] px-2 py-0.5 text-xs text-white">
                  {{ cartItemCount }}
                </span>
              </a>
            </div>
            <div class="py-6">
              <a href="#" class="-mx-3 block rounded-lg px-3 py-2.5 text-base/7 font-bold text-white hover:bg-[#DABFFF]/10">Log in</a>
            </div>
          </div>
        </div>
      </DialogPanel>
    </Dialog>
  </header>
</template>