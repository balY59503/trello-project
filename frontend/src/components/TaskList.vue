<template>
  <div class="task__list">
    <div class="header">
      <p>Заголовок списка</p>
      <div class="header__btns">
        <img
            src="@/images/plus.svg"
            alt="plus"
            style="padding-right: 9px; cursor: pointer;"
            @click="addTask">

      </div>
    </div>
    <div class="tasks">
      <Task
          v-for="(task, index) in tasks"
          :task="task"
          :key="index"
          @deleteTask="deleteTask"
          @noteUpdated="noteUpdated"
      />
    </div>
  </div>
</template>

<script>
import Task from "@/components/Task.vue";
import {taskListFunctions} from '@/hooks/taskFunctions.js'

export default {
  components: { Task },
  data(){
    return{
      tasks: []
    }
  },
  setup() {
    const { tasks, deleteTask, addTask, noteUpdated } = taskListFunctions();

    return {
      tasks,
      deleteTask,
      addTask,
      noteUpdated
    };
  }
};


</script>

<style scoped>
.task__list {

}

.header {
  display: flex;
  justify-content: space-between;
  font-size: 18px;
  margin-bottom: 12px;
  width: 311px;
}

.header__btns {
  display: flex;
  align-items: center;
}

.tasks {
  display: flex;
//flex: 0 2 650px; width: 650px;
  max-height: 100vh;
  flex-direction: column;
  flex-wrap: wrap;
}

</style>