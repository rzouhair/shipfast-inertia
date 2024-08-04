<script setup lang="tsx">
const features = [
  {
    title: "Collect user feedback",
    description:
      "Use your Insighto's board to let users submit features they want.",
    styles: "bg-primary text-primary-content",
    demo: (
      <div class="overflow-hidden h-full flex items-stretch">
        <div class="w-full translate-x-12 bg-base-200 rounded-t-box h-full p-6">
          <p class="font-medium uppercase tracking-wide text-base-content/60 text-sm mb-3">
            Suggest a feature
          </p>
          <div class="relative textarea py-4 h-full mr-12 bg-base-200 group-hover:bg-base-100 group-hover:border-base-content/10 text-base-content">
            <div class="absolute left-4 top-4 group-hover:hidden flex items-center ">
              <span>Notifications</span>
              <span class="w-[2px] h-6 bg-primary animate-pulse"></span>
            </div>
            <div class="opacity-0 group-hover:opacity-100 duration-500">
              Notifications should be visible only on certain pages.
            </div>
            <div class="opacity-0 group-hover:opacity-100 duration-1000 flex items-center gap-0.5">
              <span>Terms & privacy pages don&apos;t need them</span>
              <span class="w-[2px] h-6 bg-primary animate-pulse"></span>
            </div>
            <button class="btn shadow-lg btn-primary absolute right-4 bottom-6 opacity-0 group-hover:opacity-100 duration-1000">
              Submit
            </button>
          </div>
        </div>
      </div>
    ),
  },
  {
    title: "Prioritize features",
    description: "Users upvote features they want. You know what to ship next.",
    styles: "md:col-span-2 bg-base-300 text-base-content",
    demo: (
      <div class="px-6 max-w-[600px] flex flex-col gap-4 overflow-hidden">
        {[
          {
            text: "Add LemonSqueezy integration to the boilerplate",
            secondaryText: "Yes, ship this! ✅",
            votes: 48,
            transition: "group-hover:-mt-36 group-hover:md:-mt-28 duration-500",
          },
          {
            text: "A new pricing table for metered billing",
            secondaryText: "Maybe ship this 🤔",
            votes: 12,
          },
          {
            text: "A new UI library for the dashboard",
            secondaryText: "But don't ship that ❌",
            votes: 1,
          },
        ].map((feature, i) => (
          <div
            class={`p-4 bg-base-100 text-base-content rounded-box flex justify-between mb-2 gap-4 ${feature?.transition}`}
            key={i}
          >
            <div>
              <p class="font-semibold mb-1">{feature.text}</p>
              <p class="text-base-content-secondary">
                {feature.secondaryText}
              </p>
            </div>
            <button
              class={`px-4 py-2 rounded-box group text-center text-lg duration-150 border border-transparent bg-primary text-primary-content`}
            >
              <svg
                xmlns="http://www.w3.org/2000/svg"
                width="24"
                height="24"
                viewBox="0 0 24 24"
                fill="none"
                stroke="currentColor"
                stroke-width="2.5"
                stroke-linecap="round"
                stroke-linejoin="round"
                class={`w-5 h-5 ease-in-out duration-150 -translate-y-0.5 group-hover:translate-y-0`}
              >
                <path d="m18 15-6-6-6 6" />
              </svg>
              {feature.votes}
            </button>
          </div>
        ))}
      </div>
    ),
  },
  {
    title: "Your brand, your board",
    description: "Customize your Insighto board with 7 themes.",
    styles: "md:col-span-2 bg-base-100 text-base-content",
    demo: (
      <div class="flex left-0 w-full h-full pt-0 lg:pt-8 overflow-hidden -mt-4">
        <div class="-rotate-[8deg] flex min-w-max overflow-x-visible h-full lg:pt-4">
          {[
            {
              buttonStyles: "bg-primary text-primary-content",
              css: "-ml-1 rotate-[6deg] w-72 h-72 z-30 bg-base-200 text-base-content rounded-2xl group-hover:-ml-64 group-hover:opacity-0 group-hover:scale-75 transition-all duration-500 p-4",
            },
            {
              buttonStyles: "bg-secondary text-secondary-content",
              css: "rotate-[6deg] bg-base-200 text-base-content w-72 h-72 -mr-20 -ml-20 z-20 rounded-xl p-4",
            },
            {
              buttonStyles: "bg-accent text-accent-content",
              css: "rotate-[6deg] bg-base-200 text-base-content z-10 w-72 h-72 rounded-xl p-4",
            },
            {
              buttonStyles: "bg-neutral text-neutral-content",
              css: "rotate-[6deg] bg-base-200 text-base-content w-72 h-72 -ml-20 rounded-xl p-4",
            },
            {
              buttonStyles: "bg-base-100 text-base-content",
              css: "rotate-[6deg] bg-base-200 text-base-content w-72 h-72 -ml-10 -z-10 rounded-xl p-4 opacity-0 scale-75 group-hover:opacity-100 group-hover:scale-100 transition-all duration-300",
            },
          ].map((theme, i) => (
            <div class={theme.css} key={i}>
              <div class="font-medium uppercase tracking-wide text-base-content/60 text-sm mb-3">
                Trending feedback
              </div>
              <div class="space-y-2">
                <div class="p-4 bg-base-100 rounded-box flex justify-between">
                  <div>
                    <p class="font-semibold mb-1">Clickable cards</p>
                    <p class="opacity-80">Make cards more accessible</p>
                  </div>
                  <button
                    class={`px-4 py-2 rounded-box group text-center text-lg duration-150 border border-transparent ${theme.buttonStyles}`}
                  >
                    <svg
                      xmlns="http://www.w3.org/2000/svg"
                      width="24"
                      height="24"
                      viewBox="0 0 24 24"
                      fill="none"
                      stroke="currentColor"
                      stroke-width="2.5"
                      stroke-linecap="round"
                      stroke-linejoin="round"
                      class={`w-5 h-5 ease-in-out duration-150 -translate-y-0.5 group-hover:translate-y-0`}
                    >
                      <path d="m18 15-6-6-6 6" />
                    </svg>
                    8
                  </button>
                </div>
                <div class="p-4 bg-base-100 rounded-box flex justify-between ">
                  <div>
                    <p class="font-semibold mb-1">Bigger images</p>
                    <p class="opacity-80">Make cards more accessible</p>
                  </div>
                  <button
                    class={`px-4 py-2 rounded-box group text-center text-lg duration-150 border border-transparent ${theme.buttonStyles}`}
                  >
                    <svg
                      xmlns="http://www.w3.org/2000/svg"
                      width="24"
                      height="24"
                      viewBox="0 0 24 24"
                      fill="none"
                      stroke="currentColor"
                      stroke-width="2.5"
                      stroke-linecap="round"
                      stroke-linejoin="round"
                      class={`w-5 h-5 ease-in-out duration-150 -translate-y-0.5 group-hover:translate-y-0`}
                    >
                      <path d="m18 15-6-6-6 6" />
                    </svg>
                    5
                  </button>
                </div>
              </div>
            </div>
          ))}
        </div>
      </div>
    ),
  },
  {
    title: "Discover new ideas",
    description: "Users can chat and discuss features.",
    styles: "bg-neutral text-neutral-content",
    demo: (
      <div class="text-neutral-content px-6 space-y-4">
        {[
          {
            id: 1,
            text: "Can we have a feature to add a custom domain to IndiePage?",
            userImg:
              "https://pbs.twimg.com/profile_images/1514863683574599681/9k7PqDTA_400x400.jpg",
            userName: "Marc Lou",
            createdAt: "2024-09-01T00:00:00Z",
          },
          {
            id: 2,
            text: "I'd definitelly pay for that 🤩",
            userImg:
              "https://pbs.twimg.com/profile_images/1778434561556320256/knBJT1OR_400x400.jpg",
            userName: "Dan K.",
            createdAt: "2024-09-02T00:00:00Z",
            transition:
              "opacity-0 group-hover:opacity-100 duration-500 translate-x-1/4 group-hover:translate-x-0",
          },
        ]?.map((reply) => (
          <div
            key={reply.id}
            class={`px-6 py-4 bg-neutral-content text-neutral rounded-box ${reply?.transition}`}
          >
            <div class="mb-2 whitespace-pre-wrap">{reply.text}</div>
            <div class="text-neutral/80 flex items-center gap-2 text-sm">
              <div class="flex items-center gap-2">
                <div class="avatar">
                  <div class="w-7 rounded-full">
                    <img src={reply.userImg} alt={reply.userName} />
                  </div>
                </div>
                <div class=""> {reply.userName} </div>
              </div>
              •
              <div>
                {new Date(reply.createdAt).toLocaleDateString("en-US", {
                  month: "short",
                  day: "numeric",
                  year: "numeric",
                })}
              </div>
            </div>
          </div>
        ))}
      </div>
    ),
  },
];
</script>

<template>
  <section class="flex justify-center items-center w-full bg-base-200/50 text-base-content py-20 lg:py-32">
    <div class="flex flex-col max-w-[82rem] gap-16 md:gap-20 px-4">
      <h2 class="max-w-3xl font-black text-4xl md:text-6xl tracking-[-0.01em]">
        Ship features <br /> users&nbsp;
        <span class="underline decoration-dashed underline-offset-8 decoration-base-300">
          really want
        </span>
      </h2>
      <div class="flex flex-col w-full h-fit gap-4 lg:gap-10 text-text-default max-w-[82rem]">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 lg:gap-10">
          <div
            v-for="feature in features"
            :key="feature.title"
            :class="`${feature.styles} rounded-3xl flex flex-col gap-6 w-full h-[22rem] lg:h-[25rem] pt-6 overflow-hidden group`"
          >
            <div class="px-6 space-y-2">
              <h3 class="font-bold text-xl lg:text-3xl tracking-tight">
                {{ feature.title }}
              </h3>
              <p class="opacity-80">{{ feature.description }}</p>
            </div>
            <component :is="feature.demo" />
          </div>
        </div>
      </div>
    </div>
  </section>
</template>