<template>
  <div class="flex flex-col flex-grow space-y-8">
    <div class="flex w-full justify-between h-min">
      <p class="text-gray-800 text-2xl font-medium">Offerte di lavoro</p>
      <div class="flex">
        <select id="" class="px-5">
          <option value="" disabled>filtra</option>
        </select>
      </div>
    </div>

    <div class="grid grid-cols-2 gap-5">
      <div v-for="job in jobs" :key="job.id" class="bg-white w-full rounded-md p-6 cursor-pointer hover:bg-gray-100" @click="goToJob(job.id)">
        
        <div class="flex flex-col space-y-3">
          <div class="flex items-center justify-between w-full">
            <p class="text-3xl text-gray-800">{{ job.title }}</p>
            <p>{{ job.agency }}</p>
          </div>
          <div class="flex items-center space-x-2 text-xl">
            <i :class="job.language.icon"></i>
            <p>{{ job.language.name }}</p>
          </div>
          <p> <span class="font-medium">Retribuzione annua: </span>{{ job.ral }} €</p>
          <p>{{ job.description }}</p>
          <p> <span class="font-medium">Esperienza richiesta: </span>{{ job.experience }} </p>
        </div>
        
      </div>
    </div>
  </div>
</template>

<script>
import axios from 'axios'

export default {
    name: 'Home',

    data(){
      return{
        jobs: []
      }
    },

    async mounted(){
      this.jobs = (await axios.get('http://localhost:8000/api/jobs')).data
    },

    methods:{
      goToJob(id){
        this.$router.push('/jobs/' + id)
      }
    }
}
</script>
