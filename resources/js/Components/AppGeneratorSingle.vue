<script lang="ts" setup>
import { Argument, Mock } from '@/Pages/Mock/Partials/MocksTable.vue';

const props = defineProps<{
  mock: Mock
}>()

const initiateMock = computed(() => !props.mock.arguments?.length)

const generatedValue = ref(null)
let filledArguments = reactive<Record<string, any>>({})

onBeforeMount(async() => {
  if (initiateMock.value) { 
    generatedValue.value = await useMock()
  }
  filledArguments = props.mock.arguments.reduce((acc: any, arg: Argument) => {
    acc[arg.name] = arg.default
    return acc
  }, {})
})

async function useMock() {
  const testResp = await fetch(route('mocks.use', props.mock.id), {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json',
      'Accept': 'application/json',
    },
  })
  const mockData = await testResp.json()

  return mockData
}
</script>

<template>
  <div>
    <h2>{{ mock.name }}</h2>

    <div>
      <div v-if="!initiateMock" class="pb-4">
        <AppGeneratorArgument
          v-for="arg in mock.arguments"
          :key="arg.name"
          :argument="arg"
          :model-value="filledArguments[arg.name]"
          @update:model-value="filledArguments[arg.name] = $event" />
      </div>
      <Button>Generate</Button>
    </div>

    <div class="bg-gray-100 rounded-lg w-full font-mono text-center py-4 mt-4 ">
      {{ JSON.stringify(filledArguments, null, 2) }}
    </div>

    <div v-if="generatedValue" class="bg-gray-100 rounded-lg w-full font-mono text-center py-4 mt-4 ">
      {{ generatedValue }}
    </div>
  </div>
</template>
