<script setup lang="ts">
import type {
  ColumnDef,
  ColumnFiltersState,
  SortingState,
  TableOptions,
  VisibilityState,
} from '@tanstack/vue-table'
import {
  FlexRender,
  getCoreRowModel,
  getFilteredRowModel,
  getPaginationRowModel,
  getSortedRowModel,

  useVueTable,
} from '@tanstack/vue-table'

import { ArrowUpDown, ChevronDown, LogIn, Trash } from 'lucide-vue-next'
import { cn } from '../../../Utils'
import { Checkbox } from '@/Components/ui/checkbox'
import { Button } from '@/Components/ui/button'
import { PaginatedData } from '@/types/pagination'
import AppAlert from '@/Components/AppAlert.vue'
import { Link, router, useForm } from '@inertiajs/vue3'
import { toast } from 'vue-sonner'

export interface Argument {
  name: string
  type: string
  default?: any
  description: string | null
  is_nullable?: boolean
  mock_id?: string
}

export interface Mock {
  id: string
  function: string
  name: string,
  description: string | null;
  arguments: Argument[]
}

const props = defineProps<{
  mocks: PaginatedData<Mock>
}>()

const data = computed<Mock[]>(() => {
  return props.mocks?.data?.map((mock: Mock) => {
    return {
      id: mock.id,
      name: mock.name,
      function: mock.function,
      description: mock.description,
      arguments: mock.arguments || [],
    }
  })
})

watch(() => props.mocks, () => {
  console.log('mocks changed')
}, { deep: true })

const columns = computed<ColumnDef<Mock, any>[]>(() => ([
  {
    header: 'Id',
    cell: ({ row }: any) => row.original.id
  },
  {
    header: 'Name',
    accessorKey: 'name'
  },
  {
    header: 'Function',
    accessorKey: 'function'
  },
  {
    header: 'Actions',
    cell: ({ row }: any) => {
      const mock = row.original

      const deleteButton = h(
        AppAlert,
        {
          title: 'Delete mock',
          description: 'Are you sure you want to delete this mock?',
          onActionClicked: () => deleteMock(mock.id),
        },
        {
          default: () => h('div', {}, []),
          trigger: () => h(Button, {
            variant: 'destructive',
            size: 'icon',
          }, () => h(Trash, { class: 'h-4 w-4' }))
        }
      )

      const trialButton = h(Button, {
        as: Link,
        href: route('mocks.show', mock.id),
        size: 'icon',
      }, () => h(LogIn, { class: 'h-4 w-4' }))

      return h('div', { class: 'flex items-center space-x-2' }, [
        deleteButton,
        trialButton
      ])
    }
  }
]))

const form = useForm({})
function deleteMock (id: string) {
  form.delete(route('mocks.destroy', id));
  toast('Mock deleted successfully')
}

const sorting = ref<SortingState>([])
const columnFilters = ref<ColumnFiltersState>([])
const columnVisibility = ref<VisibilityState>({})
const rowSelection = ref({})

const tableOptions = reactive<TableOptions<Mock>>({
  get data() {
    return data.value
  },
  get columns () {
    return columns.value
  },
  getCoreRowModel: getCoreRowModel(),
  getPaginationRowModel: getPaginationRowModel(),
  getSortedRowModel: getSortedRowModel(),
  getFilteredRowModel: getFilteredRowModel(),
  /* onSortingChange: updaterOrValue => valueUpdater(updaterOrValue, sorting),
  onColumnFiltersChange: updaterOrValue => valueUpdater(updaterOrValue, columnFilters),
  onColumnVisibilityChange: updaterOrValue => valueUpdater(updaterOrValue, columnVisibility),
  onRowSelectionChange: updaterOrValue => valueUpdater(updaterOrValue, rowSelection), */
  state: {
    get sorting() { return sorting.value },
    get columnFilters() { return columnFilters.value },
    get columnVisibility() { return columnVisibility.value },
    get rowSelection() { return rowSelection.value },
    columnPinning: {
      left: ['status'],
    },
  },
});

const table = useVueTable(tableOptions)
</script>

<template>
  <div class="w-full">
    <slot name="tableHeader" />
    <div class="rounded-md border">
      <Table>
        <TableHeader>
          <TableRow v-for="headerGroup in table.getHeaderGroups()" :key="headerGroup.id">
            <TableHead v-for="header in headerGroup.headers" :key="header.id" :data-pinned="header.column.getIsPinned()"
              :class="cn(
                { 'sticky bg-background/95': header.column.getIsPinned() },
                header.column.getIsPinned() === 'left' ? 'left-0' : 'right-0',
              )">
              <FlexRender v-if="!header.isPlaceholder" :render="header.column.columnDef.header"
                :props="header.getContext()" />
            </TableHead>
          </TableRow>
        </TableHeader>
        <TableBody>
          <template v-if="table.getRowModel().rows?.length">
            <TableRow v-for="row in table.getRowModel().rows" :key="row.id"
              :data-state="row.getIsSelected() && 'selected'">
              <TableCell v-for="cell in row.getVisibleCells()" :key="cell.id" :data-pinned="cell.column.getIsPinned()"
                :class="cn(
                  { 'sticky bg-background/95': cell.column.getIsPinned() },
                  cell.column.getIsPinned() === 'left' ? 'left-0' : 'right-0',
                )">
                <FlexRender :render="cell.column.columnDef.cell" :props="cell.getContext()" />
              </TableCell>
            </TableRow>
          </template>

          <TableRow v-else>
            <TableCell :colspan="columns.length" class="h-24 text-center">
              No results.
            </TableCell>
          </TableRow>
        </TableBody>
      </Table>
    </div>

    <div class="flex items-center justify-end space-x-2 py-4">
      <PaginationLinks :pagination="mocks"/>
      <slot name="pagination" />
    </div>
  </div>
</template>
  