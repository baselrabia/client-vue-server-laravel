<template>
  <div>
    <Latest />
    <Posts />
  </div>
</template>

<script>
import Latest from "./Latest";
import Posts from "./Posts";

export default {
  name: "Blog",
  components: {
    Latest,
    Posts,
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
