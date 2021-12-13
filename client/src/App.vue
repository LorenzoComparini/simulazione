<template>
  <div id="app">
    <div class="flex flex-col min-h-screen w-full">
      <Navbar></Navbar>
      <div class="flex flex-grow bg-gray-200 p-12">
        <router-view></router-view>
      </div>
    </div>

  </div>
</template>

<script>
import Navbar from '@/components/Navbar.vue'

export default {
  name: 'App',
  components: {
    Navbar 
  }
}
</script>

