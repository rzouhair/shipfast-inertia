<script setup lang="tsx">
import { JSX } from 'vue/jsx-runtime';

export interface Feature {
  title: string;
  description: string;
  type?: "video" | "image";
  path?: string;
  format?: string;
  alt?: string;
  svg?: JSX.Element;
}

const FeaturesAccordionMedia = defineComponent({
  props: {
    feature: {
      type: Object as () => Feature,
      required: true,
    },
  },
  setup(props) {
    const { type, path, format, alt } = props.feature;
    const style = "rounded-2xl aspect-square w-full sm:w-[26rem]";
    const size = {
      width: 500,
      height: 500,
    };

    return () => {
      if (type === "video") {
        return (
          <video
            class={style}
            auto-play
            muted
            loop
            playsinline
            controls
            width={size.width}
            height={size.height}
          >
            <source src={path} type={format} />
          </video>
        );
      } else if (type === "image") {
        return (
          <img
            src={path}
            alt={alt}
            class={`${style} object-cover object-center`}
            width={size.width}
            height={size.height}
          />
        );
      } else {
        return <div class={`${style} !border-none`}></div>;
      }
    };
  },
});

const features = [
  {
    title: "Emails",
    description:
      "Send transactional emails, setup your DNS to avoid spam folder (DKIM, DMARC, SPF in subdomain), and listen to webhook to receive & forward emails",
    type: "video",
    path: "https://d3m8mk7e1mf7xn.cloudfront.net/app/newsletter.webm",
    format: "video/webm",
    svg: (
      <svg
        xmlns="http://www.w3.org/2000/svg"
        fill="none"
        viewBox="0 0 24 24"
        stroke-width={1.5}
        stroke="currentColor"
        class="w-6 h-6"
      >
        <path
          stroke-linecap="round"
          d="M16.5 12a4.5 4.5 0 11-9 0 4.5 4.5 0 019 0zm0 0c0 1.657 1.007 3 2.25 3S21 13.657 21 12a9 9 0 10-2.636 6.364M16.5 12V8.25"
        />
      </svg>
    ),
  },
  {
    title: "Payments",
    description:
      "Create checkout sessions, handle webhooks to update user's account (subscriptions, one-time payments...) and tips to setup your account & reduce chargebacks",
    type: "image",
    path: "https://images.unsplash.com/photo-1571171637578-41bc2dd41cd2?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=3540&q=80",
    alt: "A computer",
    svg: (
      <svg
        xmlns="http://www.w3.org/2000/svg"
        fill="none"
        viewBox="0 0 24 24"
        stroke-width={1.5}
        stroke="currentColor"
        class="w-6 h-6"
      >
        <path
          stroke-linecap="round"
          stroke-linejoin="round"
          d="M2.25 8.25h19.5M2.25 9h19.5m-16.5 5.25h6m-6 2.25h3m-3.75 3h15a2.25 2.25 0 002.25-2.25V6.75A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25v10.5A2.25 2.25 0 004.5 19.5z"
        />
      </svg>
    ),
  },
  {
    title: "Authentication",
    description:
      "Magic links setup, login with Google walkthrough, save user in MongoDB/Supabase, private/protected pages & API calls",
    svg: (
      <svg
        xmlns="http://www.w3.org/2000/svg"
        fill="none"
        viewBox="0 0 24 24"
        stroke-width={1.5}
        stroke="currentColor"
        class="w-6 h-6"
      >
        <path
          stroke-linecap="round"
          stroke-linejoin="round"
          d="M17.982 18.725A7.488 7.488 0 0012 15.75a7.488 7.488 0 00-5.982 2.975m11.963 0a9 9 0 10-11.963 0m11.963 0A8.966 8.966 0 0112 21a8.966 8.966 0 01-5.982-2.275M15 9.75a3 3 0 11-6 0 3 3 0 016 0z"
        />
      </svg>
    ),
  },
  {
    title: "Style",
    description:
      "Components, animations & sections (like this features section), 20+ themes with daisyUI, automatic dark mode",
    svg: (
      <svg
        xmlns="http://www.w3.org/2000/svg"
        fill="none"
        viewBox="0 0 24 24"
        stroke-width={1.5}
        stroke="currentColor"
        class="w-6 h-6"
      >
        <path
          stroke-linecap="round"
          stroke-linejoin="round"
          d="M9.53 16.122a3 3 0 00-5.78 1.128 2.25 2.25 0 01-2.4 2.245 4.5 4.5 0 008.4-2.245c0-.399-.078-.78-.22-1.128zm0 0a15.998 15.998 0 003.388-1.62m-5.043-.025a15.994 15.994 0 011.622-3.395m3.42 3.42a15.995 15.995 0 004.764-4.648l3.876-5.814a1.151 1.151 0 00-1.597-1.597L14.146 6.32a15.996 15.996 0 00-4.649 4.763m3.42 3.42a6.776 6.776 0 00-3.42-3.42"
        />
      </svg>
    ),
  },
] as Feature[];

const featureSelected = ref(0)
</script>

<template>
  <section
    class="py-24 md:py-32 space-y-24 md:space-y-32 max-w-7xl mx-auto bg-base-100 "
    id="features"
  >
    <div class="px-8">
      <h2 class="font-extrabold text-4xl lg:text-6xl tracking-tight mb-12 md:mb-24">
        All you need to ship your startup fast
        <span class="bg-neutral text-neutral-content px-2 md:px-4 ml-1 md:ml-1.5 leading-relaxed whitespace-nowrap">
          and get profitable
        </span>
      </h2>
      <div class=" flex flex-col md:flex-row gap-12 md:gap-24">
        <div class="grid grid-cols-1 items-stretch gap-8 sm:gap-12 lg:grid-cols-2 lg:gap-20">
          <ul class="w-full">
            <FeaturesAccordionItem
              v-for="(feature, i) in features"
              :key="feature.title"
              :feature="feature"
              :isOpen="featureSelected === i"
              @setFeatureSelected="featureSelected = i"
            />
          </ul>

          <FeaturesAccordionMedia :feature="features[featureSelected]" :key="featureSelected" />
        </div>
      </div>
    </div>
  </section>
</template>