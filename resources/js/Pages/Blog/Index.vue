<script setup lang="tsx">
import config from '@/config';
import { articleType, categoryType } from '@/types/content';
import { PaginatedData } from '@/types/pagination';
import { Head } from '@inertiajs/vue3';

const props = defineProps<{
  posts: articleType[];
  categories: categoryType[];
  paginated_posts: PaginatedData<articleType>;
  pagination: {
    page: number;
    per_page: number;
    total: number
  }
}>()
</script>

<template>
  <Head title="Blog" />

  <BlogLayout :categories="categories">
    <section class="text-center max-w-xl mx-auto mt-12 mb-24 md:mb-32">
      <h1 class="font-extrabold text-3xl lg:text-5xl tracking-tight mb-6">
        The {{ config.appName }} Blog
      </h1>
      <p class="text-lg opacity-80 leading-relaxed">
        Learn how to ship your startup in days, not weeks. And get the latest
        updates about the boilerplate
      </p>
    </section>

    <section class="mb-12">
      <template v-if="paginated_posts.data.length">
        <div class="grid lg:grid-cols-2 mb-12 gap-8">
          <ArticleCard
            v-for="(article, i) in paginated_posts.data"
            :article="article"
            :key="article.slug"
            :isImagePriority="i <= 2"
          />
        </div>
        <PaginationLinks class="mb-4 flex items-center justify-end" :pagination="paginated_posts" />
      </template>
      <template v-else>
        <p class="flex items-center justify-center rounded-md text-center font-bold bg-base-200 py-12">No posts found</p>
      </template>
    </section>
  </BlogLayout>
</template>