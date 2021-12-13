<template>
  <div class="flex py-8 px-12 bg-yellow-500 text-3xl text-white font-semibold items-center justify-between w-full">
      <p @click="goToHome()" class="cursor-pointer">Joffer</p>
      <div class="space-x-4">
        <button class="text-2xl cursor-pointer" @click="goToCreateJob">Crea annuncio</button>
      </div>
  </div>
</template>

<script>

export default {
    name: 'Navbar',

    methods: {
      goToCreateJob(){
        this.$router.push('/create')
      },
      goToHome(){
        this.$router.push('/home')
      }
    }
}
</script>
