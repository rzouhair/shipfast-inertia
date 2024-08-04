<script setup lang="ts">
</script>

<template>
  <section class="bg-neutral text-neutral-content">
    <div class="max-w-7xl mx-auto px-8 py-16 md:py-32 text-center">
      <h2 class="max-w-3xl mx-auto font-extrabold text-4xl md:text-5xl tracking-tight mb-6 md:mb-8">
        80% of startups fail because founders never launch
      </h2>
      <p class="max-w-xl mx-auto text-lg opacity-90 leading-relaxed mb-12 md:mb-20">
        Emails, DNS records, user authentication... There&apos;s so much going
        on.
      </p>

      <div class="flex flex-col md:flex-row justify-center items-center md:items-start gap-6">
        <ProblemStep emoji="🧑‍💻" text="8 hrs to add Stripe" />

        <ProblemArrow class="max-md:-scale-x-100 md:-rotate-90" />

        <ProblemStep emoji="😮‍💨" text="Struggle to find time" />

        <ProblemArrow class="md:-scale-x-100 md:-rotate-90" />

        <ProblemStep emoji="😔" text="Quit project" />
      </div>
    </div>
  </section>
</template>
