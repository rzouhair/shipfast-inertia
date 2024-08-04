<script setup lang="ts">
defineProps<{
  emoji: string;
  text: string;
}>()
</script>

<template>
  <div class="w-full md:w-48 flex flex-col gap-2 items-center justify-center">
    <span class="text-4xl">{{ emoji }}</span>
    <h3 class="font-bold">{{ text }}</h3>
  </div>
</template>