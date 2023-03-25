<script>

</script>

<template>
  <form @submit.prevent="filter">
    <div class="mb-8 mt-4 flex flex-wrap gap-2">
      <div class="flex flex-none items-center">
        <input v-model.number="filterForm.priceFrom" type="text" placeholder="Price from" class="input-filter-l w-24">
        <input v-model.number="filterForm.priceTo" type="text" placeholder="Price to" class="input-filter-r w-24">
      </div>

      <div class="flex flex-none items-center text-black">
        <select v-model="filterForm.beds" class="input-filter-l">
          <option :value="null">Beds</option>
          <option v-for="n in 5" :key="n" :value="n">
            {{ n }}
          </option>
          <option>6+</option>
        </select>
        <select v-model="filterForm.baths" class="input-filter-r">
          <option :value="null">Baths</option>
          <option v-for="n in 5" :key="n" :value="n">
            {{ n }}
          </option>
          <option>6+</option>
        </select>
      </div>

      <div class="flex flex-none items-center">
        <input v-model.number="filterForm.areaFrom" type="text" placeholder="Area from" class="input-filter-l w-24">
        <input v-model.number="filterForm.areaTo" type="text" placeholder="Area to" class="input-filter-r w-24">
      </div>

      <button type="submit" class="btn-primary">Filter</button>
      <button @click="clear" type="reset" class="btn-normal">Clear</button>
    </div>
  </form>
</template>

<script setup>
import {useForm} from "@inertiajs/vue3";

const props = defineProps({
  filters: Object
})
const filterForm = useForm({
  priceFrom: props.filters.priceFrom ?? null,
  priceTo: props.filters.priceTo ?? null,
  beds: props.filters.beds ?? null,
  baths: props.filters.baths ?? null,
  areaFrom: props.filters.areaFrom ?? null,
  areaTo: props.filters.areaTo ?? null
})
const filter = () => {
  filterForm.get(route('listing.index'), {
    preserveState: true,
    preserveScroll: true
  })
}
const clear = () => {
  filterForm.priceFrom = null
  filterForm.priceTo = null
  filterForm.beds = null
  filterForm.baths = null
  filterForm.areaFrom = null
  filterForm.areaTo = null
  filter()
}
</script>
