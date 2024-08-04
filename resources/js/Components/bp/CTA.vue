<script lang="ts" setup>
import config from '@/config';

</script>

<template>
  <section class="relative hero overflow-hidden min-h-screen">
    <img
      src="https://images.unsplash.com/photo-1571171637578-41bc2dd41cd2?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=3540&q=80"
      alt="Background"
      class="object-cover w-full"
    />
    <div class="relative hero-overlay bg-neutral bg-opacity-70"></div>
    <div class="relative hero-content text-center text-neutral-content p-8">
      <div class="flex flex-col items-center max-w-xl p-8 md:p-0">
        <h2 class="font-bold text-3xl md:text-5xl tracking-tight mb-8 md:mb-12">
          Boost your app, launch, earn
        </h2>
        <p class="text-lg opacity-80 mb-12 md:mb-16">
          Don&apos;t waste time integrating APIs or designing a pricing
          section...
        </p>

        <button class="btn btn-primary btn-wide">
          Get {{ config.appName }}
        </button>
      </div>
    </div>
  </section>
</template>