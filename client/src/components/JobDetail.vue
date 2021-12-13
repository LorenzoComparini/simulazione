<template>
  <div class="flex flex-col flex-grow space-y-8 bg-white rounded-md p-12 justify-between">
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
        <div class="flex justify-end space-x-3">
            <button class="px-5 py-2 rounded-full text-yellow-500 hover:bg-yellow-500 hover:text-white border-2 border-yellow-500 transition duration-300" @click="edit()">
                <i class="far fa-edit"></i>
                Modifica
            </button>
            <button class="px-5 py-2 rounded-full text-red-600 hover:bg-red-600 hover:text-white border-2 border-red-600 transition duration-300" @click="discard()">
                <i class="far fa-trash-alt"></i>
                Elimina
            </button>
            
        </div>
  </div>
</template>


<script>
import axios from 'axios'

export default {
    name: 'JobDetail',

    data(){
      return{
        job: []
      }
    },

    async mounted(){
        let id = this.$route.params.id
      this.job = (await axios.get('http://localhost:8000/api/jobs/' + id)).data
    },

    methods:{
      goToJob(id){
        this.$router.push('/jobs/' + id)
      },
      
      edit(){
          this.$router.push('/edit/' + this.job.id)
      },

      async discard(){
          await axios.delete('http://localhost:8000/api/jobs/' + this.job.id)
          this.$router.push('/home')
      }
    }
}
</script>
