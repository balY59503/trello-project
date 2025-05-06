<template>
  <div class="container">
    <div class="auth">
      <form @submit.prevent="registration">
        <h2>Регистрация</h2>
        <p>Логин</p>
        <input placeholder="Введите ваш логин" id="name" v-model="form.username" v-focus/>
        <p>Пароль</p>
        <input placeholder="Введите ваш пароль" id="password" v-model="form.password"/>
        <p>Подтвердите пароль</p>
        <input placeholder="Подтвердите ваш пароль" id="password_confirmation" v-model="form.password_repeat"/>
        <my-button style="margin-bottom: 8px;">
          Зарегистрироваться
        </my-button>
        <div v-if="errors" class="errors">
          <p v-for="(error, field) in errors" :key="field">
            {{ error[0] }}
          </p>

        </div>
      </form>
      <router-link to="/login" class="link">Вход</router-link>
    </div>
  </div>
</template>

<script>
import MyButton from "@/components/UI/MyButton.vue";
import MyInput from "@/components/UI/MyInput.vue";
import {ref} from "vue";
import {userAuthorization} from "@/hooks/authorization";

export default {
  components: {MyInput, MyButton},
  setup() {
    const form = ref({
      username: "",
      password: "",
      password_repeat: '',
    });
    const {registration, errors} = userAuthorization(form);
    return {
      form,
      errors,
      registration
    };
  }
}
</script>

<style scoped>
.container {
  height: 89vh;
  display: flex;
  align-items: center;
  justify-content: center;
}

.auth {
  padding: 30px 50px;
  color: #123456;
  height: 550px;
  width: 375px;
  background-color: #F5F5F5;
  border-radius: 15px;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.7);
  display: flex;
  flex-direction: column;
  justify-content: space-between;
}

input {
  background-color: #F5F5F5;
  border: none;
  padding-bottom: 8px;
  margin-bottom: 24px;
  border-bottom: 2px solid #515151;
  font-size: 16px;
}

input:focus {
  outline: none;
}

form {
  display: flex;
  flex-direction: column;
}

h2 {
  font-size: 28px;
  text-align: center;
  font-weight: 400;
  margin-bottom: 35px;
}

p {
  color: #626262;
  font-size: 18px;
  padding-bottom: 11px;
}

.link {
  color: #626262;
  text-align: center;
}

.errors {
//margin-bottom: 15px; padding: 15px 15px; color: #fff;
  border-radius: 6px;

  text-align: center;
}

.errors p {
  color: #cc3131;
  margin: 0 -10px;
  font-size: 17px;
  padding-bottom: 6px;
}

.errors p:last-child {
  padding-bottom: 0;
}

</style>