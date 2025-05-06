<template>
  <div class="container">
<!--    <nav-bar/>-->
    <router-view/>
  </div>
</template>

<script>
import NavBar from "@/components/NavBar.vue";
import authService from "@/services/auth.service";

export default {
  components: {NavBar},
}
</script>

<style scoped>
.container{
  display: flex;
  height: 100vh;
  align-items: center;
  justify-content: center;
}
</style>