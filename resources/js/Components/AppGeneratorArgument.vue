<script setup lang="ts">
import { Argument, Mock } from '@/Pages/Mock/Partials/MocksTable.vue';
import Input from './ui/input/Input.vue';
import AppNumberField from './AppNumberField.vue';

const props = defineProps<{
  argument: Argument
  modelValue: any,
}>()

const emit = defineEmits<{
  (e: 'update:modelValue', value: any): void
}>()

const value = ref(props.modelValue)

watch(() => props.modelValue, (newValue) => {
  value.value = newValue
  emit('update:modelValue', newValue)
})

const argumentComponentMap = computed<Record<string, any>>(() => ({
  string: {
    component: Input,
    props: {
      modelValue: value.value,
      'onUpdate:modelValue': (_value: any) => {
        value.value = _value
        emit('update:modelValue', _value)
      },
    },
  },
  number: {
    component: AppNumberField,
    props: {
      modelValue: value.value,
      'onUpdate:modelValue': (_value: any) => {
        value.value = _value
        emit('update:modelValue', _value)
      },
    },
  },
}))

const argumentComponent = computed(() => argumentComponentMap.value[props.argument.type])
</script>

<template>
  <div>
    <Label>{{ argument.name }}</Label>
    <component :is="argumentComponent.component" v-bind="argumentComponent.props" />
  </div>
</template>
