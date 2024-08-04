<script setup lang="ts">
import { articleType } from '@/types/content';
import { Link } from '@inertiajs/vue3';

defineProps<{
  article: articleType;
}>()
</script>

<template>
  <Link
    :href="`/blog/author/${article.author.slug}`"
    :title="`Posts by ${article.author.name}`"
    class="inline-flex items-center gap-2 group"
    rel="author"
  >
    <span itemProp="author">
      <img
        :src="article.author.avatar"
        :alt="`Avatar of ${article.author.name}`"
        :width="28"
        :height="28"
        class="w-7 h-7 rounded-full object-cover object-center"
      />
    </span>
    <span class="group-hover:underline">{{article.author.name}}</span>
  </Link>
</template>