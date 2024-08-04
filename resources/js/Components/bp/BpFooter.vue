<script setup lang="ts">
// Import logo
import config from '@/config';
import { Link } from '@inertiajs/vue3';
</script>

<template>
  <footer class="bg-base-200 border-t border-base-content/10">
    <div class="max-w-7xl mx-auto px-8 py-24">
      <div class=" flex lg:items-start md:flex-row md:flex-nowrap flex-wrap flex-col">
        <div class="w-64 flex-shrink-0 md:mx-0 mx-auto text-center md:text-left">
          <Link
            href="/#"
            aria-current="page"
            class="flex gap-2 justify-center md:justify-start items-center"
          >
            <img
              src="/images/icon.png"
              :alt="`${config.appName} logo`"
              :priority="true"
              class="w-6 h-6"
              :width="24"
              :height="24"
            />
            <strong class="font-extrabold tracking-tight text-base md:text-lg">
              {{ config.appName }}
            </strong>
          </Link>

          <p class="mt-3 text-sm text-base-content/80">
            {{ config.appDescription }}
          </p>
          <p class="mt-3 text-sm text-base-content/60">
            Copyright © {{ new Date().getFullYear() }} - All rights reserved
          </p>
        </div>
        <div class="flex-grow flex flex-wrap justify-center -mb-10 md:mt-0 mt-10 text-center">
          <div class="lg:w-1/3 md:w-1/2 w-full px-4">
            <div class="footer-title font-semibold text-base-content tracking-widest text-sm md:text-left mb-3">
              LINKS
            </div>

            <div class="flex flex-col justify-center items-center md:items-start gap-2 mb-10 text-sm">
              <!-- {config.mailgun.supportEmail && (
                <a
                  :href="`mailto:${config.mailgun.supportEmail}`"
                  target="_blank"
                  class="link link-hover"
                  aria-label="Contact Support"
                >
                  Support
                </a>
              )} -->
              <Link href="/#pricing" class="link link-hover">
                Pricing
              </Link>
              <Link href="/blog" class="link link-hover">
                Blog
              </Link>
              <a href="/#" target="_blank" class="link link-hover">
                Affiliates
              </a>
            </div>
          </div>

          <div class="lg:w-1/3 md:w-1/2 w-full px-4">
            <div class="footer-title font-semibold text-base-content tracking-widest text-sm md:text-left mb-3">
              LEGAL
            </div>

            <div class="flex flex-col justify-center items-center md:items-start gap-2 mb-10 text-sm">
              <Link href="/terms-of-services" class="link link-hover">
                Terms of services
              </Link>
              <Link href="/privacy-policy" class="link link-hover">
                Privacy policy
              </Link>
            </div>
          </div>
        </div>
      </div>
    </div>
  </footer>
</template>