<script setup lang="tsx">
import config from '@/config';
import { getSEOTags, schemaMarkup, SeoTags } from '@/Utils/seo';
import { Head } from '@inertiajs/vue3';

const props = defineProps<{
  metadata?: SeoTags;
}>()

const seoMetadata = getSEOTags(props.metadata);

const canonicalBase = seoMetadata.metadataBase
const canonicalUrl = computed(() => {
  const url = `${canonicalBase}${seoMetadata.alternates?.canonical || ''}`;
  return url.replace(/([^:]\/)\/+/g, '$1');
});
</script>

<template>
  <Head>
    <title>{{ seoMetadata.title }}</title>
    <meta name="description" :content="seoMetadata.description">
    <meta property="og:title" :content="seoMetadata.openGraph?.title">
    <meta property="og:description" :content="seoMetadata.openGraph?.description">
    <meta property="og:url" :content="seoMetadata.openGraph?.url">
    <meta property="og:type" :content="seoMetadata.openGraph?.type">

    <meta name="twitter:card" :content="seoMetadata.twitter?.card">
    <meta name="twitter:title" :content="seoMetadata.twitter?.title">
    <meta name="twitter:description" :content="seoMetadata.twitter?.description">
    <meta name="twitter:image" :content="seoMetadata.twitter?.card">
    
    <meta name="keywords" :content="seoMetadata.keywords.join(',')">

    <link rel="canonical" :href="canonicalUrl">

    <template v-if="metadata?.extraTags" v-for="{ tag, ...attrs } in metadata.extraTags">
      <component :is="tag" v-bind="attrs" v-if="tag" />
    </template>

    <component is="script" type="application/ld+json">{{ JSON.stringify(schemaMarkup) }}</component>
  </Head>
</template>