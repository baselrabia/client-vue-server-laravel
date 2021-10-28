<template>
  <div>
    <Latest :posts="posts" :showModel="false" />
    <Posts :posts="posts" :count="postCount" @showMore="this.showMore" />
  </div>
</template>

<script>
import Latest from "./Latest";
import Posts from "./Posts";
import PostDataService from "../services/PostDataService";

export default {
  name: "Blog",
  data() {
    return {
      API_URL: "http://localhost:8000/api/posts",
      posts: [],
      postCount: 8,
    };
  },
  components: { Latest, Posts },
  methods: {
    getPosts() {
      PostDataService.getAll().then((response) => {
        this.posts = response.data.data;
      });
    },
    showMore() {
      this.postCount += 2;
    },
  },
  beforeMount() {
    this.getPosts();
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
