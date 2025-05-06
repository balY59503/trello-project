<template>
  <input class="input" type="text">
</template>

<script>
export default {
  name: "my-input",
}
</script>

<style scoped>
input{
  background-color: #F5F5F5;
  border: none;
  padding-bottom: 8px;
  margin-bottom: 24px;
  border-bottom: 2px solid #515151;
}

input:focus{
  outline: none;
}
</style>