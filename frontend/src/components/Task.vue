<template>
  <div class="task">
    <div class="modal-window" v-if="show">
      <select @change="handleUserChange">
        <option :value="user.id" v-for="user in userStore.users">{{ user.username }}</option>
      </select>
    </div>
    <div class="task__top">
      <div class="task__header" contenteditable="" style="cursor: text" @blur="headerChanged">
        {{ task.header }}
      </div>
      <img
          class="task__button dots"
          src="@/images/dots.svg"
          alt="dots"
          @click="showModal">
      <img
          class="task__button cross"
          src="@/images/cross.svg"
          alt="cross"
          @click="deleteTask"
      >
    </div>

    <div class="task__description" contenteditable="" @blur="descriptionChanged">
      {{ task.description }}
    </div>
  </div>
</template>

<script>
import {ref} from "vue";
import {useUserStore} from "@/stores/userStore";
import {taskListFunctions} from "@/hooks/taskFunctions";

export default {
  props: {
    task: {
      type: Object,
      required: true,
    },
  },

  setup(props, {emit}) {
    const task = ref(props)
    const {transferNoteToUser} = taskListFunctions()
    const userStore = useUserStore();
    let show = ref(false);

    const handleUserChange = ($event) => {
      const newUserId = $event.target.value;
      const taskId = task.value.task.id;
      const access_token = userStore.currentUser.access_token;
      const currentUserID = userStore.currentUser.id;
      if (newUserId) {
        transferNoteToUser(currentUserID, taskId, newUserId, access_token)
      }
    };

    const showModal = () => show.value = !show.value;
    const deleteTask = () => {
      emit('deleteTask', task)
    }
    const headerChanged = ($event) => {
      task.header = $event.target.innerHTML
      emit('noteUpdated', task)
    }
    const descriptionChanged = ($event) => {
      task.description = $event.target.innerHTML
      emit('noteUpdated', task)
    }
    return {
      deleteTask, headerChanged, descriptionChanged, showModal, handleUserChange, userStore, show
    }
  }
}


</script>

<style scoped>
.task {
  width: 311px;
//height: 100px; border-radius: 6px; background-color: #B6CEE5; color: #123456; padding: 9px 10px 9px 9px;

  margin-bottom: 15px;
  position: relative;
}

.task__top {
  display: flex;
  justify-content: space-between;
  align-items: baseline;

}

.task__button {
  display: block;
  align-self: start;
  cursor: pointer;
}

.dots {
  align-self: start;
  margin-top: 5px;
  margin-right: 6px;
}

.task__header {
  width: 270px;
  font-size: 16px;
  padding-bottom: 4px;

}

.task__description {
  font-size: 14px;
  display: flex;
  justify-content: space-between;
}

.modal-window {
  position: absolute;
  bottom: 0;
  right: 7px;
  top: 25px;
}

div:focus {
  outline: none;
}

select {
  outline: none;
  border: none;
  color: #123456;
  background-color: #B6CEE5;
  border-radius: 4px;
  width: 100%;
  font-size: 16px;
}

option {
  color: #123456;

}

select:hover {
  outline: none;
  border: none;
}

</style>