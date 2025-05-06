<template>
  <div class="navbar">
    <div class="navbar__greetings">
      Приветствую, {{ user.username }}
      <a href="" @click="logout">Logout</a>
    </div>
    <div class="navbar__btns" @click="$router.push('/')">
      <button @click.stop="$router.push('/client')">Клиенты</button>
      <button @click.stop="$router.push('/Home')">Рабочее пространство</button>
      <button @click.stop="$router.push('/login')">Авторизация</button>
    </div>
  </div>
</template>

<script>
import router from "@/router/router";
import authService from "@/services/auth.service";

export default {
  props: {
    user: Object
  },
  setup(){
    const getRouter = () => router;
    const logout = () => authService.logout();

    return {
      getRouter, logout
    }
  },}
</script>

<style scoped>
.navbar {
  width: 100%;
  background-color: #123456;
  display: flex;
  justify-content: space-between;
  align-items: center;
  padding-left: 10px;
  color: #f1f1f1;
}

.navbar__greetings {
  padding-left: 5px;
}

.navbar__btns {
  display: flex;
  align-items: center;
  justify-content: flex-end;
}

button {
  width: 131px;
  background-color: #123456;
  border: none;
  font-size: 15px;
  padding: 8px;
  color: #f1f1f1;

}

button:hover {
  cursor: pointer;
}

a{
  color: #f1f1f1;
  padding-left: 20px;
}

</style>