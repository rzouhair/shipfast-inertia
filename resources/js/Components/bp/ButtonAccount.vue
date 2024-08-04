<script setup lang="tsx">
import { Link } from '@inertiajs/vue3';

// TODO: Implement authenticated user
const isLoading = ref(false)
const open = ref(false)

const user = ref<null | {
  name: string;
  email: string;
  image: string;
}>({
  name: "John Doe",
  email: "john@doe.com",
  image: "https://i.pravatar.cc/300",
});

function handleBilling () {
  // TODO: Implement billing
  console.log('Billing')
}

function handleSignOut () {
  // TODO: Implement sign out
  console.log('Sign out')
}
</script>

<template>
  <Popover v-model:open="open">
    <PopoverTrigger as-child>
      <button class="btn">
        <img
          v-if="user?.image"
          :src="user?.image"
          :alt="user?.name || 'Account'"
          :width="24"
          :height="24"
          class="w-6 h-6 rounded-full shrink-0"
          referrerpolicy="no-referrer"
        />
        <span v-else class="w-6 h-6 bg-base-300 flex justify-center items-center rounded-full shrink-0">
          {{ user?.name?.charAt(0) || user?.email?.charAt(0) }}
        </span>
        {{ user?.name || "Account" }}

        <span v-if="isLoading" class="loading loading-spinner loading-xs"></span>
        <svg
          v-else
          xmlns="http://www.w3.org/2000/svg"
          viewBox="0 0 20 20"
          fill="currentColor"
          :class="[
            'w-5 h-5 duration-200 opacity-50',
            {
              'transform rotate-180': open,
            },
          ]"
        >
          <path
            fillRule="evenodd"
            d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z"
            clipRule="evenodd"
          />
        </svg>
      </button>
    </PopoverTrigger>
    <PopoverContent class="w-80 p-0">
      <div class="overflow-hidden p-2">
        <div class="space-y-0.5 text-sm">
          <button
            class="btn btn-link flex items-center gap-2 hover:bg-base-300 duration-200 py-2 px-4 w-full rounded-lg font-medium"
            @click="handleBilling"
          >
            <svg
              xmlns="http://www.w3.org/2000/svg"
              viewBox="0 0 20 20"
              fill="currentColor"
              class="w-5 h-5"
            >
              <path
                fillRule="evenodd"
                d="M2.5 4A1.5 1.5 0 001 5.5V6h18v-.5A1.5 1.5 0 0017.5 4h-15zM19 8.5H1v6A1.5 1.5 0 002.5 16h15a1.5 1.5 0 001.5-1.5v-6zM3 13.25a.75.75 0 01.75-.75h1.5a.75.75 0 010 1.5h-1.5a.75.75 0 01-.75-.75zm4.75-.75a.75.75 0 000 1.5h3.5a.75.75 0 000-1.5h-3.5z"
                clipRule="evenodd"
              />
            </svg>
            Billing
          </button>
          <Link
            as="button"
            method="post"
            href="/auth/logout"
            class="btn btn-error flex items-center gap-2 hover:bg-error/20 hover:text-error duration-200 py-1.5 px-4 w-full rounded-lg font-medium"
          >
            <svg
              xmlns="http://www.w3.org/2000/svg"
              viewBox="0 0 20 20"
              fill="currentColor"
              class="w-5 h-5"
            >
              <path
                fillRule="evenodd"
                d="M3 4.25A2.25 2.25 0 015.25 2h5.5A2.25 2.25 0 0113 4.25v2a.75.75 0 01-1.5 0v-2a.75.75 0 00-.75-.75h-5.5a.75.75 0 00-.75.75v11.5c0 .414.336.75.75.75h5.5a.75.75 0 00.75-.75v-2a.75.75 0 011.5 0v2A2.25 2.25 0 0110.75 18h-5.5A2.25 2.25 0 013 15.75V4.25z"
                clipRule="evenodd"
              />
              <path
                fillRule="evenodd"
                d="M6 10a.75.75 0 01.75-.75h9.546l-1.048-.943a.75.75 0 111.004-1.114l2.5 2.25a.75.75 0 010 1.114l-2.5 2.25a.75.75 0 11-1.004-1.114l1.048-.943H6.75A.75.75 0 016 10z"
                clipRule="evenodd"
              />
            </svg>
            Logout
          </Link>
        </div>
      </div>
    </PopoverContent>
  </Popover>
</template>