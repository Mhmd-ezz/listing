<script setup lang="ts">
// import { stringify } from '@vueuse/docs-utils'
import { useStorage } from '@vueuse/core'
import Stringify from 'vue-stringify'

const theDefault = {
  name: '',
  color: '',
  size: '',
  count: 0,
}
const state = useStorage('fruit', theDefault)
const state2 = useStorage('fruit', theDefault)
const text = Stringify(state2)
</script>

<template>
  <div>
    <input v-model="state.name" type="text">
    <input v-model="state.color" type="text">
    <input v-model="state.size" type="text">
    <input v-model.number="state.count" type="range" min="0" step="0.01" max="1000">

    <pre lang="json">{{ state }}</pre>
    <pre lang="json">{{ state2 }}</pre>
    <pre lang="json">{{ text }}</pre>
  </div>
</template>
