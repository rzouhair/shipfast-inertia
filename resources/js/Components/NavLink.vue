<script setup lang="ts">
import { computed } from 'vue';
import { Link } from '@inertiajs/vue3';

const props = defineProps<{
    href: string;
    active?: boolean;
}>();

const classes = computed(() =>
    props.active
        ? 'link link-primary inline-flex items-center justify-center no-underline'
        : 'link inline-flex items-center justify-center no-underline'
);
</script>

<template>
    <Link :href="href" :class="classes">
        <slot />
    </Link>
</template>
