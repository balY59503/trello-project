<template>
  <button class="btn">
    <slot></slot>
  </button>
</template>

<script>
export default {
  name: "my-button"
}
</script>

<style scoped>
.btn{
  height: 40px;
  padding: 8px;
  border-radius: 8px;
  background-color: #123456;
  color: #fff;
  font-size: 20px;
  box-shadow: 0 0 6px rgba(18, 52, 86, 0.25);
  border: none;
  cursor: pointer;
  align-self: center;
  margin-bottom: 15px;
}
</style>