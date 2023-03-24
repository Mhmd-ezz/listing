<template>
  <form @submit.prevent="update">
    <div class="grid grid-cols-6 gap-4">
      <div class="col-span-2">
        <label class="label">Beds</label>
        <input class="input" v-model.number="form.beds" type="text" />
        <div class="error" v-if="form.errors.beds">{{form.errors.beds}}</div>
      </div>

      <div class="col-span-2">
        <label class="label">Baths</label>
        <input class="input" v-model.number="form.baths" type="text" />
        <div class="error" v-if="form.errors.baths">{{form.errors.baths}}</div>
      </div>

      <div class="col-span-2">
        <label class="label">Area</label>
        <input class="input" v-model.number="form.area" type="text" />
        <div class="error" v-if="form.errors.area">{{form.errors.area}}</div>
      </div>

      <div class="col-span-2">
        <label class="label">City</label>
        <input class="input" v-model="form.city" type="text" />
        <div class="error" v-if="form.errors.city">{{form.errors.city}}</div>
      </div>

      <div class="col-span-2">
        <label class="label">Post Code</label>
        <input class="input" v-model="form.code" type="text" />
        <div class="error" v-if="form.errors.code">{{form.errors.code}}</div>
      </div>

      <div class="col-span-2">
        <label class="label">Street</label>
        <input class="input" v-model="form.street" type="text" />
        <div class="error" v-if="form.errors.street">{{form.errors.street}}</div>
      </div>

      <div class="col-span-2">
        <label class="label">Street Nr</label>
        <input class="input" v-model.number="form.street_nr" type="text" />
        <div class="error" v-if="form.errors.street_nr">{{form.errors.street_nr}}</div>
      </div>

      <div class="col-span-2">
        <label class="label">Price</label>
        <input class="input" v-model.number="form.price" type="text" />
        <div class="error" v-if="form.errors.price">{{form.errors.price}}</div>
      </div>

      <div class="col-span-6">
        <button type="submit" class="btn-primary">Update</button>
      </div>
    </div>
  </form>
</template>

<script setup>
import {useForm} from "@inertiajs/vue3";

let props = defineProps({
  listing: Object
})

const form = useForm({
  beds: props.listing.data.beds,
  baths: props.listing.data.baths,
  area: props.listing.data.area,
  city: props.listing.data.city,
  street: props.listing.data.street,
  code: props.listing.data.code,
  street_nr: props.listing.data.street_nr,
  price: props.listing.data.price,
})
const update = () => form.put(route('listing.update', props.listing.data.id))
</script>

<style scoped>
label {
  margin-right: 2em;
}
div {
  padding: 2px
}
.error {
  color: red;
  font-size: 12px;
}
</style>
