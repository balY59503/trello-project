<template>
  <div class="home-container">
    <TaskList/>
  </div>
</template>

<script>
import TaskList from "@/components/TaskList.vue";
import NavBar from "@/App.vue";

export default {
  components: {NavBar, TaskList}

}
</script>

<style>
.home-container {
  border-radius: 14px;
  min-height: 125px;
  //margin: 12px;
  color: #123456;
  background-color: #406B96;
  margin: 12px;
  padding: 23px 23px 13px 23px;
}
</style>