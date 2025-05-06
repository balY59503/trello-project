<template>
  <div class="app">
    <router-view/>
  </div>
</template>

<script>
import NavBar from "@/components/NavBar.vue";


export default {
  components: {NavBar},
  data() {
    return {
      showNavBar: true
    }
  },

}
</script>

<style>
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: Arial, serif;
  text-decoration: none;
}
body{
  background-color: #2F5377;
}
.app{
  height: 100%;
}
</style>