<script setup>
import axios from 'axios'
import { ref } from 'vue'
 
const props = defineProps({
    contacts: Array,
    showDel: Boolean
})

const deleteContact = async (id) => {
    await axios.delete(`http://127.0.0.1:8000/api/delete_contact/${id}`)
}

const emit = defineEmits(['showFormFunction', 'assignID'])

const emitFunction = (id) => {
    emit('showFormFunction')
    emit('assignID', id)
}

</script>

<template>
<div class="w-95">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500">
        <thead class="text-xs text-gray-700 uppercase bg-sky-500">
            <tr>
                <th scope="col" class="px-6 py-3 font-bold text-gray-900 whitespace-nowrap">
                    Name
                </th>
                <th scope="col" class="px-6 py-3 font-bold text-gray-900 whitespace-nowrap">
                    email
                </th>
                <th scope="col" class="px-6 py-3 font-bold text-gray-900 whitespace-nowrap">
                    designation
                </th>
                <th scope="col" class="px-6 py-3 font-bold text-gray-900 whitespace-nowrap">
                    contact number
                </th>
                <th v-if="props.showDel" scope="col" class="px-6 py-3 font-bold text-gray-900 whitespace-nowrap">
                    Delete Contact
                </th>
            </tr>
        </thead>
        <tbody>
            <tr @click="emitFunction(contact.id)" v-for="contact in props.contacts" :key="contact.id" class="bg-white border-b border-slate-300 text-gray-900 cursor-pointer">
                <td class="px-6 py-4">{{ contact.name }}</td>
                <td class="px-6 py-4">{{ contact.email }}</td>
                <td class="px-6 py-4">{{ contact.designation }}</td>
                <td class="px-6 py-4">{{ contact.contact_no }}</td>
                <td v-if="props.showDel" @click="deleteContact(contact.id)" class="text-red-500 font-bold text-lg text-center pr-12 cursor-pointer">X</td>
            </tr>
        </tbody>
    </table>
</div>
</template>

<style scoped>
.w-95 {
    width: 95%;
    margin: 0 auto;
    margin-top: 40px;
    margin-bottom: 40px;
}
</style>