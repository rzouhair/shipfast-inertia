<script setup lang="tsx">
import { articleType } from '@/types/content';
import { Link } from '@inertiajs/vue3';
import { JSX } from 'vue/jsx-runtime';

interface Props {
  article: articleType;
  tag?: keyof JSX.IntrinsicElements;
  showCategory?: boolean;
  isImagePriority?: boolean;
}
withDefaults(defineProps<Props>(), {
  tag: 'h2',
  showCategory: true,
  isImagePriority: false,
})
</script>

<template>
  <article class="card bg-base-200 rounded-box overflow-hidden">
    <Link
      v-if="article.metadata.image"
      :href="`/blog/${article.slug}`"
      :title="article.title"
      class="link link-hover hover:link-primary w-full max-h-[350px] overflow-hidden"
      rel="bookmark"
    >
      <figure class="size-full">
        <img
          :src="article.metadata.image"
          :alt="`${article.title} cover image`"
          width="600"
          height="338"
          :priority="isImagePriority"
          placeholder="blur"
          class="aspect-video object-cover object-center hover:scale-[1.03] duration-200 ease-in-out w-full h-full"
        />
      </figure>
    </Link>
    <div class="card-body">
      <div v-if="showCategory" class="flex flex-wrap gap-2">
        <CategoryBadge v-for="category in article.categories" :key="category.slug" :category="category" />
      </div>

      <component :is="tag" class="mb-1 text-xl md:text-2xl font-bold">
        <Link
          :href="`/blog/${article.slug}`"
          class="link link-hover hover:link-primary"
          :title="article.title"
          rel="bookmark"
        >
          {{article.title}}
        </Link>
      </component>

      <div class=" text-base-content/80 space-y-4">
        <p class="">{{article.metadata.description}}</p>

        <div class="flex items-center gap-4 text-sm">
          <Avatar :article="article" />

          <span itemProp="datePublished">
            {{new Date(article.metadata.published_at).toLocaleDateString("en-US", {
              month: "long",
              day: "numeric",
            })}}
          </span>
        </div>
      </div>
    </div>
  </article>
</template>