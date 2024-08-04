<script setup lang="ts">
import { PaginatedData } from '@/types/pagination';
import { Head, router, usePage } from '@inertiajs/vue3';
import { Mock } from './Partials/MocksTable.vue';

const props = defineProps({
  mocks: {
    type: Object as () => PaginatedData<Mock>,
    required: true,
  },
})

const MocksData = computed<PaginatedData<Mock>>(() => props.mocks as PaginatedData<Mock>);

function openCreateMockDialog () {
  router.get('/admin/mocks/create')
}
</script>

<template>
  <AuthenticatedLayout>
    <Head title="Mocks" />

    <template #header>
      <AppStyledHeader>Mocks</AppStyledHeader>
    </template>

    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
          <div class="mb-4">
            <Button class="ml-auto mr-0 block" @click="openCreateMockDialog">Create Mock</Button>
          </div>
          <MocksTable :mocks="MocksData" />
        </div>
      </div>
    </div>
  </AuthenticatedLayout>
</template>
