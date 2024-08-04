<script setup lang="ts">
import { categoryType } from '@/types/content';

defineProps<{
  categories: categoryType[],
}>()
</script>

<template>
  <BpHeader />
  <main class="mx-auto max-w-screen-xl px-4 py-8">
    <slot />

    <section>
      <p class="font-bold text-2xl lg:text-4xl tracking-tight text-center mb-8 md:mb-12">
        Browse articles by category
      </p>

      <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
        <CategoryCard v-for="category in categories" :key="category.slug" :category="category" tag="div" />
      </div>
    </section>
  </main>
  <BpFooter />
</template>