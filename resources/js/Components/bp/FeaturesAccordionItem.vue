<script setup lang="ts">
defineProps<{
  feature: any;
  isOpen: boolean;
}>()

const emit = defineEmits(['setFeatureSelected']);
const accordion = ref()
</script>

<template>
  <li>
    <button
      class="relative flex gap-2 items-center w-full py-5 text-base font-medium text-left md:text-lg"
      @click="emit('setFeatureSelected')"
      :aria-expanded="isOpen"
    >
      <span :class="[
        'duration-100',
        {
          'text-primary': isOpen
        }
      ]">
        <component :is="feature.svg" />
      </span>
      <span
        :class="[
          'flex-1 text-base-content',
          {
            'text-primary font-semibold': isOpen
          }
        ]"
      >
        <h3 class="inline">{{ feature.title }}</h3>
      </span>
    </button>

    <div
      ref="accordion"
      class="transition-all duration-300 ease-in-out text-base-content-secondary overflow-hidden"
      :style="{
        maxHeight: isOpen ? `${accordion?.scrollHeight}px` : 0,
        opacity: isOpen ? 1 : 0
      }"
    >
      <div class="pb-5 leading-relaxed">{{ feature.description }}</div>
    </div>
  </li>
</template>