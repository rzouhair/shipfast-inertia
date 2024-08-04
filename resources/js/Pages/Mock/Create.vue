<script setup lang="ts">
import { Link, Head, router, usePage } from '@inertiajs/vue3';

import * as z from 'zod'
import { h } from 'vue'
import { useForm } from 'vee-validate'
import { toTypedSchema } from '@vee-validate/zod'
import { toast } from 'vue-sonner';
import { MoveLeft } from 'lucide-vue-next';
import { Config, ConfigItem } from '@/Components/ui/auto-form';

const page = usePage()

const schema = z.object({
  name: z.string().min(3).max(255),
  function: z.string().min(1),
  description: z.optional(z.string()),
  arguments: z
    .optional(
      z.array(
        z.object({
          name: z.string(),
          type: z.nativeEnum({
            string: 'string',
            number: 'number',
            boolean: 'boolean',
          }),
          description: z.optional(z.string()),
          is_nullable: z.optional(z.boolean()),
          default: z.any(),
        }),
      )
    )
    .describe('Function arguments'),
})

function onSubmit(values: Record<string, any>) {
  toast('Mock created successfully')
  router.post('/admin/mocks/create', values, {
    preserveState: true,
  })
}
</script>

<template>
  <AuthenticatedLayout>
    <Head title="Dashboard" />

    <template #header>
      <AppStyledHeader>Create a mock</AppStyledHeader>
    </template>

    <div class="py-12">
      <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
          <Link class="mb-9 flex items-center gap-1 group" href="/admin/mocks">
            <MoveLeft class="size-4 transform transition-transform group-hover:-translate-x-1 cursor-pointer" />
            <p>Back</p>
          </Link>

          <AutoForm
            class="w-full space-y-6"
            :schema="schema"
            :field-config="{
              description: {
                component: 'textarea',
              },
              arguments: {
              }
            }"
            @submit="onSubmit"
          >
            <template v-if="Object.keys(page.props.errors).length">
              <InputError v-for="error in Object.values(page.props.errors)" :message="error" />
            </template>
            <Button type="submit">
              Submit
            </Button>
          </AutoForm>
        </div>
      </div>
    </div>
  </AuthenticatedLayout>
</template>
