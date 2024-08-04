<script lang="ts" setup>
import { toast } from "vue-sonner";

const isLoading = ref(false)
const isDisabled = ref(false)

const inputRef = ref()

const email = ref('');

function handleSubmit (e: any) {
  e?.preventDefault();

  isLoading.value = true
  try {

    toast.success("Thanks for joining the waitlist!");
    // TODO: handle Waitlist joining

    // just remove the focus on the input
    inputRef.value.blur();
    email.value = ''
    isDisabled.value = true
  } catch (error) {
    console.log(error);
  } finally {
    isLoading.value = false
  }
}
</script>

<template>
  <form
    class="w-full max-w-xs space-y-3"
    @submit="handleSubmit"
  >
    <input
      required
      type="email"
      ref="inputRef"
      autoComplete="email"
      placeholder="tom@cruise.com"
      class="input input-bordered w-full placeholder:opacity-60"
      v-model="email"
    />

    <button
      class="btn btn-primary btn-block"
      type="submit"
      :disabled="isDisabled"
    >
      Join waitlist
      <span v-if="isLoading" class="loading loading-spinner loading-xs"></span>
      <svg
        v-else
        xmlns="http://www.w3.org/2000/svg"
        viewBox="0 0 20 20"
        fill="currentColor"
        class="w-5 h-5"
      >
        <path
          fillRule="evenodd"
          d="M5 10a.75.75 0 01.75-.75h6.638L10.23 7.29a.75.75 0 111.04-1.08l3.5 3.25a.75.75 0 010 1.08l-3.5 3.25a.75.75 0 11-1.04-1.08l2.158-1.96H5.75A.75.75 0 015 10z"
          clipRule="evenodd"
        />
      </svg>
    </button>
  </form>
</template>