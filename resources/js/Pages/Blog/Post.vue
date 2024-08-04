<script setup lang="ts">
import { articleType, categoryType } from '@/types/content';
import { Link } from '@inertiajs/vue3';

defineProps<{
  post: articleType,
  categories: categoryType[]
}>()
</script>

<template>
  <BlogLayout :categories="categories">
    <header>
      <Link href="/blog" class="btn btn-ghost">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5"><path fill-rule="evenodd" d="M15 10a.75.75 0 01-.75.75H7.612l2.158 1.96a.75.75 0 11-1.04 1.08l-3.5-3.25a.75.75 0 010-1.08l3.5-3.25a.75.75 0 111.04 1.08L7.612 9.25h6.638A.75.75 0 0115 10z" clip-rule="evenodd"></path></svg>
        Back to Blog
      </Link>
      <div class="mt-8 flex items-center gap-4 mb-6">
        <CategoryBadge
          v-for="category in post.categories"
          :category="category"
          :key="category.slug"
          class="!badge-lg"
        />
        <div class="flex-1" />
        <span class="text-base-content/80" itemProp="datePublished">
          {{new Date(post.metadata.published_at).toLocaleDateString("en-US", {
            month: "long",
            day: "numeric",
            year: "numeric",
          })}} by
        </span>
        <Avatar :article="post" />
      </div>

      <div class="mb-8 flex flex-col gap-4">
        <h1 class="text-4xl md:text-5xl lg:text-6xl font-extrabold tracking-tight">
          {{post.title}}
        </h1>

        <p v-if="post.metadata?.description" class="text-base-content/80 md:text-lg max-w-[700px]">
          {{post.metadata?.description}}
        </p>
      </div>
    </header>
    <article class="prose prose-md prose-p:py-0 prose-headings:my-3 mb-12 w-full" v-html="post.content" />
  </BlogLayout>
</template>