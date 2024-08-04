<script setup lang="ts">
import { Mock } from '@/Pages/Mock/Partials/MocksTable.vue';
import { Head } from '@inertiajs/vue3';

defineProps<{
  mock: Mock
}>()
</script>

<template>
  <AuthenticatedLayout>
    <Head title="Mock Trial" />

    <template #header>
      <AppStyledHeader>Mock trial</AppStyledHeader>
    </template>

    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
          <AppGeneratorSingle :mock="mock" />
        </div>
      </div>
    </div>
  </AuthenticatedLayout>
</template>
