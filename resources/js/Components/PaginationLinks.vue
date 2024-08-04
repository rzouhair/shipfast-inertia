<script setup lang="ts">
import { Link } from '@inertiajs/vue3'
import {
  Pagination,
  PaginationList,
  PaginationListItem
} from '@/Components/ui/pagination'
import { PaginatedData } from '@/types/pagination';
import { cn } from '@/Utils';

const props = defineProps<{
  pagination: PaginatedData<any>
}>()

const getPagePath = (page: number) => {
  return `${props.pagination.path.replace(`?page=${props.pagination.current_page}`, '')}?page=${page}`
}

const buttonClasses = (additionalClasses: string = '') => cn('btn px-4 py-3 text-sm leading-4 border rounded hover:bg-white focus:border-primary focus:text-primary hover:bg-primary-accent transition hover:text-white', additionalClasses)
const disabledClasses = 'pointer-events-none opacity-50 cursor-not-allowed'
</script>

<template>
  <Pagination
    :total="pagination.total"
    :items-per-page="pagination.per_page" 
    :page="pagination.current_page"
    :sibling-count="1"
    show-edges>
    <PaginationList v-slot="{ items }" class="flex items-center gap-1">
      <Link
        :class="buttonClasses(pagination.current_page === 1 ? disabledClasses : '')"
        replace
        :href="pagination.first_page_url">
        {{ 'First' }}
      </Link>
      <Link
        :class="buttonClasses(!pagination.prev_page_url ? disabledClasses : '')"
        class="buttonClasses"
        replace
        :href="pagination.prev_page_url || ''">
        {{ 'Previous' }}
      </Link>

      <template v-for="(item, index) in items">
        <PaginationListItem v-if="item.type === 'page'" :key="index" :value="item.value" as-child>
          <Link
            :class="buttonClasses(item.value === pagination.current_page ? 'btn-primary text-primary-content text-white' : '')"
            :href="getPagePath(item.value)"
            as="button"
            preserve-scroll
            preserve-state
            replace
          >
            {{ item.value }}
          </Link>
        </PaginationListItem>
        <PaginationEllipsis v-else :key="item.type" :index="index" />
      </template>

      <Link
        :class="buttonClasses(!pagination.next_page_url ? disabledClasses : '')"
        :href="pagination.next_page_url || ''"
        replace
      >
        {{ 'Next' }}
      </Link>
      <Link
        :class="buttonClasses(pagination.current_page === pagination.last_page ? disabledClasses : '')"
        :href="pagination.last_page_url"
        replace
      >
        {{ 'Last' }}
      </Link>
    </PaginationList>
  </Pagination>
</template>
