<script setup lang="ts">
export interface FAQItemProps {
  question: string;
  answer: string|VNode;
}
defineProps<{
  faqList: FAQItemProps[];
}>()
</script>

<template>
  <section class="bg-base-200" id="faq">
    <div class="py-24 px-8 max-w-7xl mx-auto flex flex-col md:flex-row gap-12">
      <div class="flex flex-col text-left basis-1/2">
        <p class="inline-block font-semibold text-primary mb-4">FAQ</p>
        <p class="sm:text-4xl text-3xl font-extrabold text-base-content">
          Frequently Asked Questions
        </p>
      </div>

      <ul class="basis-1/2">
        <FaqItem v-for="(item, i) in faqList" :key="i" :item="item" />
      </ul>
    </div>
  </section>
</template>