<script setup lang="ts">
</script>

<template>
  <section class="bg-base-100">
    <div class="space-y-6 md:space-y-8 max-w-lg mx-auto px-8 py-16 md:py-32 ">
      <div class="rating !flex justify-center">
        <svg
          v-for="i in 5"
          :key="i"
          xmlns="http://www.w3.org/2000/svg"
          viewBox="0 0 20 20"
          fill="currentColor"
          class="w-5 h-5 text-warning"
        >
          <path
            fillRule="evenodd"
            d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.83 4.401-4.753.381c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691 1.456 1.405 1.02L10 15.591l4.069 2.485c.713.436 1.598-.207 1.404-1.02l-1.106-4.637 3.62-3.102c.635-.544.297-1.584-.536-1.65l-4.752-.382-1.831-4.401z"
            clipRule="evenodd"
          />
        </svg>
      </div>
      <div class="text-base leading-relaxed space-y-2 max-w-md mx-auto text-center">
        <p>
          <span class="bg-warning/25 px-1.5">
            I don&apos;t want to pay Stripe $2 for every invoice.
          </span>&nbsp;
          I don&apos;t want to spend 10 minutes manually crafting every
          invoice either.
        </p>
        <p>
          Zenvoice solved this problem once and for all. The app is simple,
          but it nails the job perfectly.
        </p>
      </div>
      <div class="flex justify-center items-center gap-3 md:gap-4">
        <img
          class="w-10 h-10 md:w-12 md:h-12 rounded-full object-cover"
          src="https://images.unsplash.com/photo-1438761681033-6461ffad8d80?q=80&w=4140&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
          alt="XYZ feedback for ZenVoice"
          :width="48"
          :height="48"
        />
        <div>
          <p class="font-semibold">Someone Nice</p>
          <p class="text-base-content/80 text-sm">23.1K followers on 𝕏</p>
        </div>
      </div>
    </div>
  </section>
</template>