<template>
  <div>
    <Header />
    <router-view></router-view>
  </div>
</template>

<script>
import Header from "./components/Header";

export default {
  name: "App",
  
  components: {
    Header,
  },
};
</script>

<style lang="scss">
body {
  background-color: #f3f3f3;
  font-family: "Rockwell", serif;

  h3 {
    color: #171717;
    font-size: 28px;
    font-weight: 700;
  }
}
</style>
