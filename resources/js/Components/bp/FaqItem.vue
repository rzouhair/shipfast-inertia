<script lang="ts" setup>
import { FAQItemProps } from './FAQ.vue'
defineProps<{
  item: FAQItemProps;
}>()

const accordion = ref()
const isOpen = ref(false)
</script>

<template>
  <li>
    <button
      class="relative flex gap-2 items-center w-full py-5 text-base font-semibold text-left border-t md:text-lg border-base-content/10"
      @click="isOpen = !isOpen"
      :aria-expanded="isOpen"
    >
      <span
        :class="[
          'flex-1 text-base-content',
          {
            'text-primary': isOpen,
          }
        ]"
      >
        {{ item?.question }}
      </span>
      <svg
        class="`flex-shrink-0 w-4 h-4 ml-auto fill-current`"
        viewBox="0 0 16 16"
        xmlns="http://www.w3.org/2000/svg"
      >
        <rect
          y="7"
          width="16"
          height="2"
          rx="1"
          :class="[
            'transform origin-center transition duration-200 ease-out',
            {
              'rotate-180': isOpen,
            }
          ]"
        />
        <rect
          y="7"
          width="16"
          height="2"
          rx="1"
          :class="[
            'transform origin-center rotate-90 transition duration-200 ease-out',
            {
              'rotate-180 hidden': isOpen,
            }
          ]"
        />
      </svg>
    </button>

    <div
      ref="accordion"
      class="`transition-all duration-300 ease-in-out opacity-80 overflow-hidden`"
      :style="isOpen
        ? { maxHeight: accordion?.current?.scrollHeight, opacity: 1 }
        : { maxHeight: 0, opacity: 0 }"
    >
      <div class="pb-5 leading-relaxed">{{ item?.answer }}</div>
    </div>
  </li>
</template>
