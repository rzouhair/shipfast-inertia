<script setup lang="ts">
import config from '@/config';
import { Link, usePage } from '@inertiajs/vue3';

const page = usePage()
const user = computed(() => page.props.auth.user)

const isAuthenticated = computed<boolean>(() => !!user.value);
</script>

<template>
  <template v-if="isAuthenticated">
    <Link
      :href="config.auth.callbackUrl"
      class="btn btn-circle rounded-full"
    >
      {{ user.email.charAt(0).toUpperCase() }}
    </Link>

    <Link
      href="/auth/logout"
      method="get"
      class="btn btn-link no-underline"
    >
      Logout
    </Link>
  </template>
  <Link
    v-else
    class="btn"
    method="get"
    :href="route('register')"
  >
    Get Started
  </Link>
</template>