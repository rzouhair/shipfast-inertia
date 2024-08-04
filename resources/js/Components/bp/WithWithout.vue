<script setup lang="ts">

defineProps<{
  title: string;
  withoutTitle: string;
  withoutItems: string[];

  withTitle: string;
  withItems: string[];
}>()
</script>

<template>
  <section class="bg-base-100">
    <div class="max-w-5xl mx-auto px-8 py-16 md:py-32 ">
      <h2 class="text-center font-extrabold text-3xl md:text-5xl tracking-tight mb-12 md:mb-20">
        {{ title }}
      </h2>

      <div class="flex flex-col md:flex-row justify-center items-center md:items-start gap-8 md:gap-12">
        <div class="bg-error/20 text-error p-8 md:p-12 rounded-lg w-full ">
          <h3 class="font-bold text-lg mb-4">
            {{ withoutTitle }}
          </h3>

          <ul class="list-disc list-inside space-y-1.5 ">
            <!-- Pains the user is experiencing by not using your product -->
            <li v-for="(item, index) in withoutItems" :key="index" class="flex gap-2 items-center">
              <svg
                xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 16 16"
                fill="currentColor"
                class="w-4 h-4 shrink-0 opacity-75"
              >
                <path d="M5.28 4.22a.75.75 0 0 0-1.06 1.06L6.94 8l-2.72 2.72a.75.75 0 1 0 1.06 1.06L8 9.06l2.72 2.72a.75.75 0 1 0 1.06-1.06L9.06 8l2.72-2.72a.75.75 0 0 0-1.06-1.06L8 6.94 5.28 4.22Z" />
              </svg>
              {{ item }}
            </li>
          </ul>
        </div>

        <div class="bg-success/20 text-success p-8 md:p-12 rounded-lg w-full">
          <h3 class="font-bold text-lg mb-4">
            {{ withTitle }}
          </h3>

          <ul class="list-disc list-inside space-y-1.5 ">
            <!-- Features of your product fixing the pain (try to match each with/withot lines) -->
            <li v-for="(item, index) in withItems" :key="index" class="flex gap-2 items-center">
              <svg
                xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 16 16"
                fill="currentColor"
                class="w-4 h-4 shrink-0 opacity-75"
              >
                <path
                  fillRule="evenodd"
                  d="M12.416 3.376a.75.75 0 0 1 .208 1.04l-5 7.5a.75.75 0 0 1-1.154.114l-3-3a.75.75 0 0 1 1.06-1.06l2.353 2.353 4.493-6.74a.75.75 0 0 1 1.04-.207Z"
                  clipRule="evenodd"
                />
              </svg>
              {{ item }}
            </li>
          </ul>
        </div>
      </div>
    </div>
  </section>
</template>