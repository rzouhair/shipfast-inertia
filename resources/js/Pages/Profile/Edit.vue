<script setup lang="ts">
import { Head } from '@inertiajs/vue3';

defineProps<{
  mustVerifyEmail?: boolean;
  status?: string;
}>();
</script>

<template>

  <Head title="Profile" />

  <AuthenticatedLayout>
    <template #header>
      <AppStyledHeader>Profile</AppStyledHeader>
    </template>

    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
        <div class="p-4 sm:p-8 bg-base-200 shadow sm:rounded-lg">
          <UpdateProfileInformationForm :must-verify-email="mustVerifyEmail" :status="status" class="max-w-xl" />
        </div>

        <div class="p-4 sm:p-8 bg-base-200 shadow sm:rounded-lg">
          <UpdatePasswordForm class="max-w-xl" />
        </div>

        <div class="p-4 sm:p-8 bg-base-200 shadow sm:rounded-lg">
          <DeleteUserForm class="max-w-xl" />
        </div>
      </div>
    </div>
  </AuthenticatedLayout>
</template>
