<script setup>
import axios from 'axios'
import { onMounted, ref } from 'vue'
import Table from '@/components/Table.vue'
import UpdateForm from '@/components/UpdateForm.vue'

var ID = ref()
const emit = defineEmits(['showFormFunction'])

const showDeleteButton = ref(false)
var showForm = ref(false)

const contacts = ref([])
async function getContacts() {
  const response = await axios.get('http://127.0.0.1:8000/api/contacts')
  contacts.value = response.data.contacts
  console.log(contacts.value)
}

onMounted(() => {
  getContacts()
})

</script>

<template>
  <button @click="showDeleteButton = !showDeleteButton" 
          class="delButton bg-red-500 hover:bg-gray-100 
          text-white py-2 px-3 border border-gray-300 
          rounded shadow">
          Delete
  </button>
  <p class="updateMsg">Click on user to update</p>

  <UpdateForm v-if="showForm" 
              :showForm="showForm"
              :id="ID"
              @showFormFunction="showForm = !showForm"
              />

  <Table :contacts="contacts" 
         :showDel="showDeleteButton" 
         @showFormFunction="showForm = !showForm"
         @assignID="ID = $event"
         />
</template>


<style scoped>
.delButton {
  float: right;
  margin: 25px;
  margin-left: 0px;
}

.updateMsg {
  float: right;
  margin: 25px;
  margin-right: 15px;
  text-align: center;
  padding-top: 8px;
}


</style>