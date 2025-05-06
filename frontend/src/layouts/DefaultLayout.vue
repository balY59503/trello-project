<template>
  <div>
    <nav-bar :user = "user"/>
    <router-view/>
  </div>
</template>

<script>
import NavBar from "@/components/NavBar.vue";
import {userFunction} from "@/hooks/userFunctions";

export default {
  components: {NavBar},
  data(){
    return {
      user: {},
    }
  },
  setup(){
    const {user} = userFunction();
    return {
      user
    };
  }
}
</script>

<style scoped>

</style>