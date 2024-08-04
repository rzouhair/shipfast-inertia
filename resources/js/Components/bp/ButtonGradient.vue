<script setup lang="ts">

defineEmits(['click'])
</script>

<template>
  <button class="btn btn-gradient animate-shimmer" @click="$emit('click')">
    <slot />
  </button>
</template>