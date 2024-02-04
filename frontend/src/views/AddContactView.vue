<script setup>
import { ref } from 'vue'
import axios from 'axios'

const name = ref('')
const email = ref('')
const designation = ref('')
const contact_no = ref('')

const addContact = async () => {
    const contact = {
        name: name.value,
        email: email.value,
        designation: designation.value,
        contact_no: contact_no.value
    }
    const response = await axios.post('http://127.0.0.1:8000/api/add_contact', contact).then(response => {
        console.log(response)
    }).catch(error => {
        console.log(error)
    })
}
</script>

<template>
  <div class="w-9/12 center">
    <form @submit.prevent="addContact">
      <div class="mb-4">
        <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Name:</label>
        <input v-model="name" type="text" id="name" class="p-2 border border-gray-300 rounded w-full">
      </div>

      <div class="mb-4">
        <label for="email" class="block text-gray-700 text-sm font-bold mb-2">Email:</label>
        <input v-model="email" type="email" id="email" class="p-2 border border-gray-300 rounded w-full">
      </div>

      <div class="mb-4">
        <label for="designation" class="block text-gray-700 text-sm font-bold mb-2">Designation:</label>
        <input v-model="designation" type="text" id="designation" class="p-2 border border-gray-300 rounded w-full">
      </div>

      <div class="mb-4">
        <label for="contactNumber" class="block text-gray-700 text-sm font-bold mb-2">Contact Number:</label>
        <input v-model="contact_no" type="tel" id="contactNumber" class="p-2 border border-gray-300 rounded w-full">
      </div>

      <button type="submit" class="bg-blue-500 text-white p-2 rounded">Submit</button>
    </form>
  </div>   
</template>

<style scoped>
.center {
  margin: 0 auto;
  margin-top: 40px;
}
</style>