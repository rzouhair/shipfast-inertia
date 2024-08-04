<script setup lang="ts">
const plans: {
  isFeatured?: boolean;
  priceId: string;
  name: string;
  description?: string;
  price: number;
  priceAnchor?: number;
  features: {
      name: string;
  }[];
}[] = [
  {
    isFeatured: false,
    priceId: 'price_1JZ9Z2Lz1jgjJ9z2',
    name: 'Starter',
    description: 'For small projects',
    price: 29,
    priceAnchor: 49,
    features: [
      { name: 'Unlimited projects' },
      { name: 'Unlimited users' },
      { name: 'Unlimited storage' },
    ],
  },
  {
    isFeatured: true,
    priceId: 'price_1JZ9Z2Lz1jgjJ9z3',
    name: 'Pro',
    description: 'For medium projects',
    price: 49,
    priceAnchor: 79,
    features: [
      { name: 'All Starter features' },
      { name: 'Priority support' },
      { name: 'Unlimited projects' },
    ],
  },
  {
    priceId: 'price_1JZ9Z2Lz1jgjJ9z4',
    name: 'Enterprise',
    description: 'For large projects',
    price: 99,
    priceAnchor: 149,
    features: [
      { name: 'All Pro features' },
      { name: 'Dedicated support' },
      { name: 'Unlimited projects' },
    ],
  },
]
</script>

<template>
  <section class="bg-base-200 overflow-hidden" id="pricing">
    <div class="py-24 px-8 max-w-5xl mx-auto">
      <div class="flex flex-col text-center w-full mb-20">
        <p class="font-medium text-primary mb-8">Pricing</p>
        <h2 class="font-bold text-3xl lg:text-5xl tracking-tight">
          Save hours of repetitive code and ship faster!
        </h2>
      </div>

      <div class="relative flex justify-center flex-col lg:flex-row items-center lg:items-stretch gap-8">
        <div v-for="plan in plans" :key="plan.priceId" class="relative w-full max-w-lg">
          <div v-if="plan.isFeatured" class="absolute top-0 left-1/2 -translate-x-1/2 -translate-y-1/2 z-20">
            <span
              class="badge text-xs text-base-200 font-semibold border-0 bg-primary"
            >
              POPULAR
            </span>
          </div>

          <div
            v-if="plan.isFeatured"
            class="absolute -inset-[1px] rounded-[9px] bg-primary z-10"
          ></div>

          <div class="relative flex flex-col h-full gap-5 lg:gap-8 z-10 bg-base-100 p-8 rounded-lg">
            <div class="flex justify-between items-center gap-4">
              <div>
                <p class="text-lg lg:text-xl font-bold">{{ plan.name }}</p>
                <p v-if="plan.description" class="text-base-content/80 mt-2">
                  {{ plan.description }}
                </p>
              </div>
            </div>
            <div class="flex gap-2">
              <div v-if="plan.priceAnchor" class="flex flex-col justify-end mb-[4px] text-lg ">
                <p class="relative">
                  <span class="absolute bg-base-content h-[1.5px] inset-x-0 top-[53%]"></span>
                  <span class="text-base-content/80">
                    ${{ plan.priceAnchor }}
                  </span>
                </p>
              </div>
              <p class="text-5xl tracking-tight font-extrabold">
                ${{ plan.price }}
              </p>
              <div class="flex flex-col justify-end mb-[4px]">
                <p class="text-xs text-base-content/60 uppercase font-semibold">
                  USD
                </p>
              </div>
            </div>
            <ul v-if="plan.features" class="space-y-2.5 leading-relaxed text-base flex-1">
              <li v-for="(feature, i) in plan.features" :key="i" class="flex items-center gap-2">
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  viewBox="0 0 20 20"
                  fill="currentColor"
                  class="w-[18px] h-[18px] opacity-80 shrink-0"
                >
                  <path
                    fillRule="evenodd"
                    d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z"
                    clipRule="evenodd"
                  />
                </svg>

                <span>{{ feature.name }} </span>
              </li>
            </ul>
            <div class="space-y-2">
              <ButtonCheckout :priceId="plan.priceId" />

              <p class="flex items-center justify-center gap-2 text-sm text-center text-base-content/80 font-medium relative">
                Pay once. Access forever.
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</template>