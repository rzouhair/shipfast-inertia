<script setup lang="ts">
import { categoryType } from '@/types/content';
import { Link } from '@inertiajs/vue3';

defineProps<{
  category: categoryType;
}>()
</script>

<template>
    <Link
      :href="`/blog/category/${category.slug}`"
      class="badge-primary badge-sm md:badge-md hover:badge-outline rounded-full transition-colors"
      :title="`Posts in ${category.name}`"
      rel="tag"
    >
      {{category.name}}
    </Link>
</template>