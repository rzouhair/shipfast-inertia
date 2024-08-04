<script setup lang="ts">
const props = defineProps<{
  modelValue: number
}>()

const emit = defineEmits<{
  (e: 'update:modelValue', value: number): void
}>()

const value = ref(props.modelValue)

watch (() => props.modelValue, (newValue) => {
  value.value = newValue
  emit('update:modelValue', newValue)
})

</script>

<template>
  <NumberField v-model="value" v-bind="$attrs">
    <NumberFieldContent>
      <NumberFieldDecrement />
      <NumberFieldInput />
      <NumberFieldIncrement />
    </NumberFieldContent>
  </NumberField>
</template>