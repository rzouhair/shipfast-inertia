<script setup lang="ts">
</script>

<template>
  <AuthenticatedLayout>
    <template #header>
      <h2 class="font-semibold text-xl leading-tight">Dashboard</h2>
    </template>

    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-base-200 overflow-hidden shadow-sm sm:rounded-lg">
          <div class="p-6">You're logged in!</div>
        </div>
      </div>
    </div>
  </AuthenticatedLayout>
</template>
