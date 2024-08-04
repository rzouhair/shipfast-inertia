<script setup lang="tsx">
import { Head, Link } from '@inertiajs/vue3';

defineProps<{
  canLogin?: boolean;
  canRegister?: boolean;
  laravelVersion: string;
  phpVersion: string;
}>();

function handleImageError() {
  document.getElementById('screenshot-container')?.classList.add('!hidden');
  document.getElementById('docs-card')?.classList.add('!row-span-1');
  document.getElementById('docs-card-content')?.classList.add('!flex-row');
  document.getElementById('background')?.classList.add('!hidden');
}
</script>

<template>
  <DefaultLayout>
    <Hero />
    <Problem />
    <Testimonials11 />
    <FeaturesAccordion />
    <Pricing />
    <!-- <FAQ /> -->
    <CTA />
  </DefaultLayout>
</template>
