<script setup lang="tsx">
import config from '@/config';
import { JSX } from 'vue/jsx-runtime';

const refTypes: {
  productHunt: {
    id: string;
    ariaLabel: string;
    svg: JSX.Element;
  };
  twitter: {
    id: string;
    ariaLabel: string;
    svg: JSX.Element;
  };
  video: {
    id: string;
    ariaLabel?: null;
    svg?: null;
  };
  other: { id: string; ariaLabel?: null; svg?: null };
} = {
  productHunt: {
    id: "product_hunt",
    ariaLabel: "See user review on Product Hunt",
    svg: (
      <svg
        xmlns="http://www.w3.org/2000/svg"
        viewBox="0 0 26.245 26.256"
        class="w-[18px] h-[18px]"
      >
        <path
          d="M26.254 13.128c0 7.253-5.875 13.128-13.128 13.128S-.003 20.382-.003 13.128 5.872 0 13.125 0s13.128 5.875 13.128 13.128"
          fill="#da552f"
        />
        <path
          d="M14.876 13.128h-3.72V9.2h3.72c1.083 0 1.97.886 1.97 1.97s-.886 1.97-1.97 1.97m0-6.564H8.53v13.128h2.626v-3.938h3.72c2.538 0 4.595-2.057 4.595-4.595s-2.057-4.595-4.595-4.595"
          fill="#fff"
        />
      </svg>
    ),
  },
  twitter: {
    id: "twitter",
    ariaLabel: "See user post on Twitter",
    svg: (
      <svg
        class="w-5 h-5 fill-[#00aCee]"
        xmlns="http://www.w3.org/2000/svg"
        viewBox="0 0 24 24"
      >
        <path d="M19.633 7.997c.013.175.013.349.013.523 0 5.325-4.053 11.461-11.46 11.461-2.282 0-4.402-.661-6.186-1.809.324.037.636.05.973.05a8.07 8.07 0 0 0 5.001-1.721 4.036 4.036 0 0 1-3.767-2.793c.249.037.499.062.761.062.361 0 .724-.05 1.061-.137a4.027 4.027 0 0 1-3.23-3.953v-.05c.537.299 1.16.486 1.82.511a4.022 4.022 0 0 1-1.796-3.354c0-.748.199-1.434.548-2.032a11.457 11.457 0 0 0 8.306 4.215c-.062-.3-.1-.611-.1-.923a4.026 4.026 0 0 1 4.028-4.028c1.16 0 2.207.486 2.943 1.272a7.957 7.957 0 0 0 2.556-.973 4.02 4.02 0 0 1-1.771 2.22 8.073 8.073 0 0 0 2.319-.624 8.645 8.645 0 0 1-2.019 2.083z"></path>
      </svg>
    ),
  },
  video: {
    id: "video",
  },
  other: { id: "other" },
};

const list: {
  username?: string;
  name: string;
  text: string;
  type?: (typeof refTypes)[keyof typeof refTypes];
  link?: string;
  img?: string;
  videoPoster?: string;
  videoSrc?: string;
  videoWidth?: number;
  videoHeight?: number;
  videoType?: "video/ogg" | "video/mp4" | "video/webm";
}[] = [
  {
    // Show @username for social media like Twitter. Does not link anywhere but cool to display
    username: "marclou",
    name: "Marc Lou",
    text: "Really easy to use. The tutorials are really useful and explains how everything works. Hope to ship my next project really fast!",
    // use refTypes.other if you don't want to display an icon
    type: refTypes.twitter,
    // Link to the person's testimonial. It's more trustable
    link: "https://twitter.com/marc_louvion",
    // A statically imported image (usually from your public folder—recommended) or a link to the person's avatar. Shows a fallback letter if not provided
    img: "https://pbs.twimg.com/profile_images/1514863683574599681/9k7PqDTA_400x400.jpg",
    // You can display video testimonials to build more trust. Just swap the type above to "video" and add at least the video source below
    // videoSrc: "/jack.mp4"
  },
  {
    username: "the_mcnaveen",
    name: "Naveen",
    text: "Setting up everything from the ground up is a really hard, and time consuming process. What you pay for will save your time for sure.",
    type: refTypes.twitter,
    link: "https://twitter.com/the_mcnaveen",
  },
  {
    username: "wahab",
    name: "Wahab Shaikh",
    text: "Easily saves 15+ hrs for me setting up trivial stuff. Now, I can directly focus on shipping features rather than hours of setting up the same technologies from scratch. Feels like a super power! :D",
    type: refTypes.productHunt,
    link: "https://www.producthunt.com/products/shipfast-2/reviews?review=667971",
  },
  {
    name: "Sean",
    text: "Just purchased and cloned and *holy shit!* I realllyyy like what I'm seeing here!",
    type: refTypes.other,
  },
  {
    username: "krishna",
    name: "Krishna Kant",
    text: "Finally a good boilerplate for Laravel - Inertia - Vue, now I dont have to cry about it comparing with laravel ecosystem.",
    type: refTypes.productHunt,
    link: "https://www.producthunt.com/posts/shipfast-2?comment=2707061",
  },
  {
    username: "imgyf",
    name: "Yifan Goh",
    text: "It's a game changer  🚀 Comes with easy to follow tutorial, and saves you a ton of time. What's not to love?",
    type: refTypes.twitter,
    link: "https://twitter.com/imgyf/status/1697549891080532236?s=20",
  },
  {
    name: "Yazdun",
    text: "Yo Marc, I got the boilerplate, it's fantastic man you just save me 10 hours on each project",
    type: refTypes.other,
  },
  {
    name: "Marc Lou",
    text: "The tool is exactly what I didn't even know I needed.",
    videoPoster: "https://d1wkquwg5s1b04.cloudfront.net/demo/marcPoster.jpg",
    videoSrc: "https://d1wkquwg5s1b04.cloudfront.net/demo/marcVideo.mp4",
    videoHeight: 250,
    videoWidth: 500,
    type: refTypes.video,
  },
  {
    username: "zawwadx",
    name: "Zawwad Ul Sami",
    text: "It's an amazing minimalist, lightweight boilerplate with well-organized code. It has almost all the core features you would want in a SaaS boilerplate. As a new team last year it actually took us months to build a similar set of features at a stable level.",
    type: refTypes.twitter,
  },
  {
    username: "dan",
    name: "Dan Mindru",
    text: "Probably one of the most powerful things you can 'npm install' that I've seen",
    type: refTypes.productHunt,
    link: "https://www.producthunt.com/posts/shipfast-2?comment=2706763",
  },
  // The last testimonial is featured on big devices (span 2 columns + big font) 👇
  {
    username: "VicPivots",
    name: "Victor Abeledo",
    text: "Marc, I got your boilerplate and having the payments setup with Stripe + user auth is a blessing. This will save me like a week of work for each new side project I spin up. I appreciate that is well documented, as well. 100% worth it 🚀🚀🚀",
    type: refTypes.twitter,
    link: "https://twitter.com/VicPivots/status/1697352442986250413?s=20",
  },
];

const Testimonial = defineComponent({
  props: {
    testimonial: {
      type: Object as () => typeof list[number],
      required: true,
    },
  },
  setup(props) {
    const { testimonial } = props
    return () => {
      if (!testimonial) return null;

      if (testimonial.type === refTypes.video) {
        return <VideoTestimonial testimonial={testimonial} />;
      }

      return (
        <li>
          <figure class="relative h-full p-6 bg-base-100 rounded-lg">
            <blockquote class="relative">
              <p class="text-sm text-base-content/80">{testimonial.text}</p>
            </blockquote>
            <figcaption class="relative flex items-center justify-start gap-4 pt-4 mt-4 border-t border-base-content/5">
              <div class="overflow-hidden rounded-full bg-base-300 shrink-0">
                {testimonial.img ? (
                  <img
                    class="w-10 h-10 rounded-full object-cover"
                    src={testimonial.img}
                    alt={`${testimonial.name}'s testimonial for ${config.appName}`}
                    width={48}
                    height={48}
                  />
                ) : (
                  <span class="w-10 h-10 rounded-full flex justify-center items-center text-lg font-medium bg-base-300">
                    {testimonial.name.charAt(0)}
                  </span>
                )}
              </div>
              <div class="w-full flex items-end justify-between gap-2">
                <div>
                  <div class="text-sm font-medium text-base-content">
                    {testimonial.name}
                  </div>
                  {testimonial.username && (
                    <div class="mt-0.5 text-sm text-base-content/80">
                      @{testimonial.username}
                    </div>
                  )}
                </div>

                {testimonial.link && testimonial.type?.svg && (
                  <a
                    href={testimonial.link}
                    target="_blank"
                    class="shrink-0 "
                    aria-label={testimonial.type?.ariaLabel}
                  >
                    {testimonial.type?.svg}
                  </a>
                )}
              </div>
            </figcaption>
          </figure>
        </li>
      )
    }
  }
})

const VideoTestimonial = defineComponent({
  props: {
    testimonial: {
      type: Object as () => typeof list[number],
      required: true,
    },
  },
  setup(props) {
    const vidRef = ref<HTMLVideoElement | null>();
    const isLoading = ref(false)
    const isPlaying = ref(false)

    const { testimonial } = props

    watch(() => vidRef.value, () => {
      if (vidRef.value?.readyState != 0) {
        isLoading.value = false
      }
    }, { immediate: true })

    function handlePlayVideo () {
      if (isPlaying.value) {
        vidRef.value?.pause();
        isPlaying.value = false
      } else {
        vidRef.value?.play();
        isPlaying.value = true
        isLoading.value = false

        if (vidRef.value?.readyState === 0) {
          isLoading.value = true
        }
      }
    }

    return () => {
      if (!testimonial) return null;

      return (
        <li
          class="break-inside-avoid max-md:flex justify-center bg-base-100 rounded-lg overflow-hidden flex flex-col"
        >
          <div class="relative w-full">
            <video
              class="w-full"
              ref={vidRef}
              poster={testimonial.videoPoster}
              preload="metadata"
              playsinline={true}
              width={testimonial.videoWidth}
              height={testimonial.videoHeight}
              onLoadeddata={() => {
                console.log("Video is loaded!");
                isLoading.value = false;
              }}
            >
              <source
                src={testimonial.videoSrc}
                type={testimonial.videoType || "video/mp4"}
              />
              Your browser does not support the videos
            </video>

            {!isPlaying && (
              <div class="absolute bottom-0 -inset-x-4 bg-gray-900/50 blur-lg h-24 translate-y-1/4 animate-opacity"></div>
            )}

            <div class="absolute w-full bottom-0 z-20 h-full">
              <div class="flex justify-between items-end p-4">
                <button
                  class="group cursor-pointer"
                  type="button"
                  title="Play video"
                  aria-label="Play video"
                  onClick={handlePlayVideo}
                >
                  {isPlaying ? (
                    // PAUSE
                    <svg
                      xmlns="http://www.w3.org/2000/svg"
                      viewBox="0 0 24 24"
                      fill="currentColor"
                      class=" w-14 h-14 fill-gray-50 group-hover:scale-[1.05] duration-100 ease-in drop-shadow-lg animate-opacity"
                    >
                      <path
                        fill-rule="evenodd"
                        d="M6.75 5.25a.75.75 0 0 1 .75-.75H9a.75.75 0 0 1 .75.75v13.5a.75.75 0 0 1-.75.75H7.5a.75.75 0 0 1-.75-.75V5.25Zm7.5 0A.75.75 0 0 1 15 4.5h1.5a.75.75 0 0 1 .75.75v13.5a.75.75 0 0 1-.75.75H15a.75.75 0 0 1-.75-.75V5.25Z"
                        clip-rule="evenodd"
                      />
                    </svg>
                  ) : (
                    // PLAY
                    <svg
                      xmlns="http://www.w3.org/2000/svg"
                      viewBox="0 0 24 24"
                      fill="currentColor"
                      class="w-14 h-14 fill-gray-50 group-hover:scale-[1.05] duration-100 ease-in drop-shadow-lg animate-opacity"
                    >
                      <path
                        fill-rule="evenodd"
                        d="M4.5 5.653c0-1.427 1.529-2.33 2.779-1.643l11.54 6.347c1.295.712 1.295 2.573 0 3.286L7.28 19.99c-1.25.687-2.779-.217-2.779-1.643V5.653Z"
                        clip-rule="evenodd"
                      />
                    </svg>
                  )}
                </button>

                {!isPlaying && (
                  <div class="animate-opacity text-right">
                    <p class="text-gray-50 font-medium drop-shadow">
                      {testimonial.name}
                    </p>
                    <div class="rating">
                      {[...Array(5)].map((_, i) => (
                        <svg
                          xmlns="http://www.w3.org/2000/svg"
                          viewBox="0 0 20 20"
                          fill="currentColor"
                          class="w-5 h-5 text-accent drop-shadow"
                          key={i}
                        >
                          <path
                            fill-rule="evenodd"
                            d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.83 4.401-4.753.381c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691 1.456 1.405 1.02L10 15.591l4.069 2.485c.713.436 1.598-.207 1.404-1.02l-1.106-4.637 3.62-3.102c.635-.544.297-1.584-.536-1.65l-4.752-.382-1.831-4.401z"
                            clip-rule="evenodd"
                          />
                        </svg>
                      ))}
                    </div>
                  </div>
                )}
              </div>
            </div>
          </div>

          <div class="relative z-20 bg-accent text-accent-content text-base leading-tight font-medium p-4 select-none">
            <p>&quot;{testimonial.text}&quot;</p>
          </div>
        </li>
      )
    }
  }
})
</script>

<template>
  <section class="bg-base-200" id="testimonials">
    <div class="py-24 px-8 max-w-7xl mx-auto">
      <div class="flex flex-col text-center w-full mb-20">
        <div class="mb-8">
          <h2 class="sm:text-5xl text-4xl font-extrabold text-base-content">
            212 makers are already shipping faster!
          </h2>
        </div>
        <p class="lg:w-2/3 mx-auto leading-relaxed text-base text-base-content/80">
          Don&apos;t take our word for it. Here&apos;s what they have to say
          about {config.appName}.
        </p>
      </div>

      <ul
        role="list"
        class="grid max-w-2xl grid-cols-1 gap-6 mx-auto sm:gap-8 md:grid-cols-2 lg:max-w-none lg:grid-cols-4"
      >
        <li>
          <ul role="list" class="flex flex-col gap-y-6 sm:gap-y-8">
            <Testimonial v-for="i in 3" :key="i" :testimonial="list[i]" />
          </ul>
        </li>

        <li class="hidden md:grid order-none md:order-first lg:order-none col-span-2 grid-cols-1 md:grid-cols-2 gap-6 sm:gap-8">
          <!-- {/* BIG FEATURED TESTIMONIAL — THE LAST ONE IN THE LIST (11th) */} -->
          <ul class="col-span-2">
            <li>
              <figure class="relative h-full p-6 bg-base-100 rounded-lg">
                <blockquote class="relative p-4">
                  <p class="text-lg font-medium text-base-content">
                    {{list[list.length - 1].text}}
                  </p>
                </blockquote>
                <figcaption class="relative flex items-center justify-start gap-4 pt-4 mt-4 border-t border-base-content/5">
                  <div class="overflow-hidden rounded-full bg-base-300 shrink-0">
                    <img
                      v-if="list[list.length - 1].img"
                      class="w-12 h-12 rounded-full object-cover"
                      :src="list[list.length - 1].img"
                      :alt="`${
                        list[list.length - 1].name
                      }'s testimonial for ${config.appName}`"
                      :width="48"
                      :height="48"
                    />
                    <span v-else class="w-12 h-12 rounded-full flex justify-center items-center text-xl font-medium bg-base-300">
                      {{list[list.length - 1].name.charAt(0)}}
                    </span>
                  </div>
                  <div>
                    <div class="text-base font-medium text-base-content">
                      {{list[list.length - 1].name}}
                    </div>
                    <div v-if="list[list.length - 1]?.username" class="mt-1 text-base text-base-content/80">
                      @{{list[list.length - 1].username}}
                    </div>
                  </div>
                </figcaption>
              </figure>
            </li>
          </ul>
          <ul role="list" class="flex flex-col gap-y-6 sm:gap-y-8">
            <Testimonial v-for="i in 2" :key="i" :testimonial="list[i + 3]" />
          </ul>
          <ul role="list" class="flex flex-col gap-y-6 sm:gap-y-8">
            <Testimonial v-for="i in 2" :key="i" :testimonial="list[i + 5]" />
          </ul>
        </li>
        <li>
          <ul role="list" class="flex flex-col gap-y-6 sm:gap-y-8">
            <Testimonial v-for="i in 3" :key="i" :testimonial="list[i + 7]" />
          </ul>
        </li>
      </ul>
    </div>
  </section>
</template>