<script setup lang="ts">
import { Link } from '@inertiajs/vue3';
import config from '@/config';
</script>

<template>
	<AppHead />

  <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100 dark:bg-gray-900" :data-theme="config.colors.theme">
    <div>
      <Link href="/admin">
      <ApplicationLogo class="w-20 h-20 fill-current text-gray-500" />
      </Link>
    </div>

    <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg">
      <slot />
    </div>
  </div>
</template>
