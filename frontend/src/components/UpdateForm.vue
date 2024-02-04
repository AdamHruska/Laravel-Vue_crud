<script setup>
import axios from 'axios'
import { onMounted, ref } from 'vue'

const contact = ref({})

const emit = defineEmits(['showFormFunction'])
const props = defineProps({
    showForm: Boolean,
    id: Number
})

onMounted( async () => {
    const getContact =  await axios.get(`http://127.0.0.1:8000/api/get_single_contact/${props.id}`)
    contact.value = getContact.data.contact
})

const updateContact = async () => {
    await axios.put(`http://127.0.0.1:8000/api/update_contact/${contact.value.id}`, contact.value)
    emit('showFormFunction')
} 

</script>

<template>

<div class="modal">
      <div class="modal-content">
        <div class="flex justify-center items-center">
            <h2 class="text-lg text-bold text-center ">Update form</h2>
            <h2 @click="emit('showFormFunction')" class="text-red-500 font-bold text-lg cursor-pointer ml-auto mr-16">X</h2>
        </div>
        <div class="w-9/12 center">
    <form @submit.prevent="updateContact">
      <div class="mb-4">
        <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Name:</label>
        <input v-model="contact.name" type="text" id="name" class="p-2 border border-gray-300 rounded w-full">
      </div>

      <div class="mb-4">
        <label for="email" class="block text-gray-700 text-sm font-bold mb-2">Email:</label>
        <input v-model="contact.email" type="email" id="email" class="p-2 border border-gray-300 rounded w-full">
      </div>

      <div class="mb-4">
        <label for="designation" class="block text-gray-700 text-sm font-bold mb-2">Designation:</label>
        <input v-model="contact.designation" type="text" id="designation" class="p-2 border border-gray-300 rounded w-full">
      </div>

      <div class="mb-4">
        <label for="contactNumber" class="block text-gray-700 text-sm font-bold mb-2">Contact Number:</label>
        <input v-model="contact.contact_no" type="tel" id="contactNumber" class="p-2 border border-gray-300 rounded w-full">
      </div>

      <button type="submit" class="bg-blue-500 text-white p-2 rounded">Submit</button>
    </form>
  </div>    
      </div>
  </div>





</template>

<style scoped>
.center {
  margin: 0 auto;
  margin-top: 40px;
}

.modal {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.5);
    display: flex;
    justify-content: center;
    align-items: center;
    backdrop-filter: blur(8px);
  }

  .modal-content {
    width: 60%;
    background-color: white;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
  }
</style>