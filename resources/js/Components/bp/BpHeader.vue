<script setup lang="ts">
// Import logo

import config from '@/config';
import ButtonSignin from './ButtonSignin.vue';
import { Link } from '@inertiajs/vue3';
const isOpen = ref<boolean>(false);

// TODO: make search params reactive
const searchParams = ref<string>('');
const links = ref<{
  href: string;
  label: string;
}[]>([
  {
    href: "/#pricing",
    label: "Pricing",
  },
  {
    href: "/blog",
    label: "Blog",
  },
  {
    href: "/#testimonials",
    label: "Reviews",
  },
  {
    href: "/#faq",
    label: "FAQ",
  },
]);

watch(searchParams, (newVal) => {
  isOpen.value = false
});
</script>

<template>
  <header class="bg-base-200">
    <nav
      class="container flex items-center justify-between px-8 py-4 mx-auto"
      aria-label="Global"
    >
      <!-- Your logo/name on large screens -->
      <div class="flex lg:flex-1">
        <Link
          class="flex items-center gap-2 shrink-0 "
          href="/"
          :title="`${config.appName} homepage`"
        >
          <img
            src="/images/icon.png"
            :alt="`${config.appName} logo`"
            class="w-8"
            placeholder="blur"
            priority={true}
            width={32}
            height={32}
          />
          <span class="font-extrabold text-lg text-foreground">{{ config.appName }}</span>
        </Link>
      </div>
      <!-- Burger button to open menu on mobile -->
      <div class="flex lg:hidden">
        <button
          type="button"
          class="-m-2.5 inline-flex items-center justify-center rounded-md p-2.5"
          @click="isOpen = !isOpen"
        >
          <span class="sr-only">Open main menu</span>
          <svg
            xmlns="http://www.w3.org/2000/svg"
            fill="none"
            viewBox="0 0 24 24"
            strokeWidth={1.5}
            stroke="currentColor"
            class="w-6 h-6 text-base-content"
          >
            <path
              strokeLinecap="round"
              strokeLinejoin="round"
              d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5"
            />
          </svg>
        </button>
      </div>

      <!-- Your links on large screens -->
      <div class="hidden lg:flex lg:justify-center lg:gap-12 lg:items-center">
        <Link
          v-for="link in links"
          :href="link.href"
          :key="link.href"
          class="link link-hover"
          :title="link.label"
        >
          {{ link.label }}
        </Link>
      </div>

      <!-- CTA on large screens -->
      <div class="hidden lg:flex lg:justify-end lg:flex-1">
        <ButtonSignin />
      </div>
    </nav>

    <!-- Mobile menu, show/hide based on menu state. -->
    <div :class="[
      'relative z-50',
      {
        'hidden': !isOpen,
      }
    ]">
      <div
        :class="`fixed inset-y-0 right-0 z-10 w-full px-8 py-4 overflow-y-auto bg-base-200 sm:max-w-sm sm:ring-1 sm:ring-neutral/10 transform origin-right transition ease-in-out duration-300`"
      >
      <!-- Your logo/name on small screens -->
        <div class="flex items-center justify-between">
          <Link
            class="flex items-center gap-2 shrink-0 "
            :title="`${config.appName} homepage`"
            href="/"
          >
            <img
              src="/images/icon.png"
              :alt="`${config.appName} logo`"
              class="w-8"
              placeholder="blur"
              :priority="true"
              :width="32"
              :height="32"
            />
            <span class="font-extrabold text-lg">{{ config.appName }}</span>
          </Link>
          <button
            type="button"
            class="-m-2.5 rounded-md p-2.5"
            @click="isOpen = false"
          >
            <span class="sr-only">Close menu</span>
            <svg
              xmlns="http://www.w3.org/2000/svg"
              fill="none"
              viewBox="0 0 24 24"
              strokeWidth={1.5}
              stroke="currentColor"
              class="w-6 h-6"
            >
              <path
                strokeLinecap="round"
                strokeLinejoin="round"
                d="M6 18L18 6M6 6l12 12"
              />
            </svg>
          </button>
        </div>

        <!-- Your links on small screens -->
        <div class="flow-root mt-6">
          <div class="py-4">
            <div class="flex flex-col gap-y-4 items-start">
              <Link
                v-for="link in links"
                :href="link.href"
                :key="link.href"
                class="link link-hover"
                :title="link.label"
              >
                {{ link.label }}
              </Link>
            </div>
          </div>
          <div class="divider"></div>
          <!-- Your CTA on small screens -->
          <div class="flex flex-col">
            <ButtonSignin />
          </div>
        </div>
      </div>
    </div>
  </header>
</template>