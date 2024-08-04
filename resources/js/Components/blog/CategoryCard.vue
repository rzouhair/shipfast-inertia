<script setup lang="ts">
import { categoryType } from '@/types/content';
import { JSX } from 'vue/jsx-runtime';
import { Link } from '@inertiajs/vue3';

withDefaults(defineProps<{
  category: categoryType;
  tag?: keyof JSX.IntrinsicElements;
}>(), {
  tag: 'h2'
})
</script>

<template>
  <Link
    class="p-4 bg-base-200 text-base-content rounded-box duration-200 hover:bg-neutral hover:text-neutral-content"
    :href="`/blog/category/${category.slug}`"
    :title="category.name"
    rel="tag"
  >
    <component :is="tag" class="md:text-lg font-medium">
      {{ category.name }}
    </component>
  </Link>
</template>