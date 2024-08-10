<script setup lang="ts">
import { computed } from 'vue';
import { Link } from '@inertiajs/vue3';

const props = defineProps<{
    href: string;
    active?: boolean;
}>();

const classes = computed(() =>
    props.active
        ? 'link-primary'
        : 'link-ghost'
);
</script>

<template>
    <Link :href="href" :class="`link flex items-center justify-center no-underline ${classes}`">
        <slot />
    </Link>
</template>
