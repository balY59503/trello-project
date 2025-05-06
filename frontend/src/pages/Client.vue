<template>

  <div>
    <router-view/>
    <h2>Клиенты</h2>

    <div class="table" v-if="users.length > 0">
      <div class="id first">ID</div>
      <div class="login first">Login</div>
      <div class="access_token first">Access_token</div>
      <div class="test_table">
        <div class="table__users"  v-for="user in users">
          <div class="table__id"> {{ user.id }}</div>
          <div class="table__login"> {{ user.username }}</div>
          <div class="table__access_token"> {{ user.access_token }}</div>
        </div>
      </div>

    </div>
    <div class="loading" v-else>
      Загрузка
    </div>
  </div>
</template>

<script>
import NavBar from "@/App.vue";
import {userFunction} from "@/hooks/userFunctions";


export default {
  components: {NavBar},
  data() {
    return {
      users: [],
    }
  },

  setup(){
    const {users} = userFunction();


    return {
      users
    };
  },
}
</script>

<style scoped>
body {
  padding: 40px;
}

.table {
  display: grid;
  grid-template-areas:
      "id login access_token"
      "users users users";
  grid-template-columns: 118px 1fr 1fr;
  //grid-template-rows: repeat(4, 100px);
  border: 1px solid black;
  background-color: #f5f5f5;
  margin: 20px 25px;
  border-radius: 6px;
}
.test_table{
  grid-area: users;
}

.id {
  grid-area: id;
}

.login {
  grid-area: login;
}

.access_token {
  grid-area: access_token;
}

.first {
  display: flex;
  justify-content: center;
  align-items: center;
  padding: 5px;
  background-color: rgba(150, 150, 153, 0.67);
  font-size: 22px;
  border: 1px solid black;
}

.table__users {
  font-size: 18px;
  display: grid;
  grid-template-columns: 118px 1fr 1fr;
  grid-template-areas: "id login access_token";
}
.table__users div{
  display: flex;
  justify-content: center;
  align-items: center;
  padding: 6px;
  border: 1px solid black;

}
.table__id{
  grid-area: id;
}
h2{
  text-align: center;
  font-size: 28px;
  margin-top: 20px;
  color: #f5f5f5;
}
.loading{
  font-size: 26px;
  color: #f5f5f5;
  margin: 20px;
}
</style>