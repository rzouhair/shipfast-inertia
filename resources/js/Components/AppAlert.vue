<script setup lang="ts">
withDefaults(defineProps<{
  title?: string
  description?: string
  cancelText?: string
  actionText?: string
}>(), {
  cancelText: 'Cancel',
  actionText: 'Continue',
})

defineEmits(['actionClicked'])
</script>

<template>
  <AlertDialog>
    <AlertDialogTrigger as-child>
      <slot name="trigger">
        <Button>Change trigger</Button>
      </slot>
    </AlertDialogTrigger>
    <AlertDialogContent>
      <AlertDialogHeader>
        <AlertDialogTitle>{{ title }}</AlertDialogTitle>
        <AlertDialogDescription>
          {{ description }}
        </AlertDialogDescription>
      </AlertDialogHeader>
      <AlertDialogFooter>
        <AlertDialogCancel>{{ cancelText }}</AlertDialogCancel>
        <AlertDialogAction @click="$emit('actionClicked')">{{ actionText }}</AlertDialogAction>
      </AlertDialogFooter>
    </AlertDialogContent>
  </AlertDialog>
</template>