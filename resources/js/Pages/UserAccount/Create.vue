<script setup>
import {useForm, Link} from "@inertiajs/vue3";

const form = useForm({
  email: null,
  name: null,
  password: null,
  password_confirmation: null
})
const register = () => form.post(route('user-account.store'))
</script>

<template>
  <form @submit.prevent="register">
    <div class="w-1/2 mx-auto">
      <div>
        <label for="name" class="label">Your name</label>
        <input type="text" id="name" class="input" v-model="form.name" />
        <div v-if="form.errors.name" class="input-error text-red-600 text-sm">
          {{form.errors.name}}
        </div>
      </div>
      <div class="mt-4">
        <label for="email" class="label">Email (username)</label>
        <input type="text" id="email" class="input" v-model="form.email" />
        <div v-if="form.errors.email" class="input-error text-red-600 text-sm">
          {{form.errors.email}}
        </div>
      </div>
      <div class="mt-4">
        <label for="password" class="label">Password</label>
        <input type="password" id="password" class="input" v-model="form.password" />
        <div v-if="form.errors.password" class="input-error text-red-600 text-sm">
          {{form.errors.password}}
        </div>
      </div>
      <div class="mt-4">
        <label for="password_confirmation" class="label">Confirm Password</label>
        <input type="password" id="password_confirmation" class="input" v-model="form.password_confirmation" />
        <div v-if="form.errors.password_confirmation" class="input-error text-red-600 text-sm">
          {{form.errors.password_confirmation}}
        </div>
      </div>
      <div class="mt-4">
        <button class="btn-primary w-full" type="submit">Register</button>
        <div class="mt-2 text-center">
          <Link :href="route('login')" class="text-sm text-gray-500">
            Already have an account? Click here
          </Link>
        </div>
      </div>
    </div>
  </form>
</template>
