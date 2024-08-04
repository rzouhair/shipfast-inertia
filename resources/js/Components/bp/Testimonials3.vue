<script setup lang="ts">
import config from '@/config';

defineProps<{
  testimonials: {
    username?: string;
    name: string;
    text: string;
    img?: string;
  }[]
}>()
</script>

<template>
  <section id="testimonials">
    <div class="py-24 px-8 max-w-7xl mx-auto">
      <div class="flex flex-col text-center w-full mb-20">
        <div class="mb-8">
          <h2 class="sm:text-5xl text-4xl font-extrabold text-base-content">
            212 makers are already shipping faster!
          </h2>
        </div>
        <p class="lg:w-2/3 mx-auto leading-relaxed text-base text-base-content/80">
          Don&apos;t take our word for it. Here&apos;s what they have to say
          about ShipFast.
        </p>
      </div>

      <ul
        role="list"
        class="flex flex-col items-center lg:flex-row lg:items-stretch gap-6 lg:gap-8"
      >
        <li v-for="(testimonial, i) in testimonials" :key="i">
          <figure class="relative max-w-lg h-full p-6 md:p-10 bg-base-200 rounded-2xl max-md:text-sm flex flex-col">
            <blockquote class="relative flex-1">
              <p class="text-base-content/80 leading-relaxed">
                {{ testimonial.text }}
              </p>
            </blockquote>
            <figcaption class="relative flex items-center justify-start gap-4 pt-4 mt-4 md:gap-8 md:pt-8 md:mt-8 border-t border-base-content/5">
              <div class="w-full flex items-center justify-between gap-2">
                <div>
                  <div class="font-medium text-base-content md:mb-0.5">
                    {{ testimonial.name }}
                  </div>
                  <div v-if="testimonial.username" class="mt-0.5 text-sm text-base-content/80">
                    @{{ testimonial.username }}
                  </div>
                </div>

                <div class="overflow-hidden rounded-full bg-base-300 shrink-0">
                  <img
                    v-if="testimonial.img"
                    class="w-10 h-10 md:w-12 md:h-12 rounded-full object-cover"
                    :src="testimonial.img"
                    :alt="`${testimonial.name}'s testimonial for ${config.appName}`"
                    :width="48"
                    :height="48"
                  />
                  <span v-else class="w-10 h-10 md:w-12 md:h-12 rounded-full flex justify-center items-center text-lg font-medium bg-base-300">
                    {{ testimonial.name.charAt(0) }}
                  </span>
                </div>
              </div>
            </figcaption>
          </figure>
        </li>
      </ul>
    </div>
  </section>
</template>
