<template>
  <section class="latest">
  <div class="div-right">
    <div class="right">
      <button id="show-modal" class="create-post" @click="showModal = true">Create New Post</button>
      
      <!-- use the modal component, pass in the prop -->
      <modal v-if="showModal" @close="showModal = false"></modal> 
      
    </div>
  </div>
    <h3>Latest Posts</h3>
    <div class="posts" v-if="posts.length >= 6">
      <div class="post">
        <div
          class="image"
          :style="{
            backgroundImage: `url('${require('../assets/post-1-image@2x.png')}')`,
          }"
        ></div>
        <h4 :title="posts[1].title">{{ posts[1].title }}</h4>
      </div>
      <div class="post col-2 row-2">
        <div
          class="image"
          :style="{
            backgroundImage: `url('${require('../assets/post-2-image@2x.png')}')`,
          }"
        ></div>
        <h4 :title="posts[0].title">{{ posts[0].title }}</h4>
      </div>
      <div class="post row-2">
        <div
          class="image"
          :style="{
            backgroundImage: `url('${require('../assets/post-3-image@2x.png')}')`,
          }"
        ></div>
        <h4 :title="posts[2].title">{{ posts[2].title }}</h4>
      </div>
      <div class="post row-2">
        <div
          class="image"
          :style="{
            backgroundImage: `url('${require('../assets/post-4-image@2x.png')}')`,
          }"
        ></div>
        <h4 :title="posts[3].title">{{ posts[3].title }}</h4>
      </div>
      <div class="post">
        <div
          class="image"
          :style="{
            backgroundImage: `url('${require('../assets/post-5-image@2x.png')}')`,
          }"
        ></div>
        <h4 :title="posts[4].title">{{ posts[4].title }}</h4>
      </div>
      <div class="post col-2">
        <div
          class="image"
          :style="{
            backgroundImage: `url('${require('../assets/post-6-image@2x.png')}')`,
          }"
        ></div>
        <h4 :title="posts[5].title">{{ posts[5].title }}</h4>
      </div>
    </div>
    <div class="posts" v-else>
      <p>No posts yet</p>
    </div>
  </section>
</template>

<script>
import modal from "./Modal";

export default {
  name: "latest",
  props: ["posts"],
  data() {
    return {
      post: {
        title: "",
        body: "",
      },
      submitted: false,
      showModal: false

    };
  },
  components: {
    modal,
  },
};
</script>

<style lang="scss" scoped>
.div-right{

  display: flex;
  justify-content: center;
  padding: 50px 50px 0px;

.right {
    flex: 1;

    display: flex;
    justify-content: flex-end;

    .create-post {
      display: block;
      width: 100%;
      max-width: 250px;
      height: 50px;

      margin: 0;

      outline: none;
      border: none;
      border-radius: 15px;
      appearance: none;

      background-color: #41b883;
      box-shadow: 3px 3px 8px 0px rgba(0, 0, 0, 0.2);

      color: #2b425a;
      font-family: "Rockwell", serif;
      font-size: 28px;

      padding-top: 7px;
      box-sizing: border-box;
    }
  }
}

.latest {
  display: block;
  width: 100%;
  max-width: 1280px;
  margin: 0 auto;

  

  .posts {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    grid-template-rows: repeat(3, 196px);
    grid-gap: 30px;

    margin: 15px;

    .post {
      display: flex;
      flex-direction: column;

      background-color: #ffffff;
      box-shadow: 3px 3px 8px 0px rgba(0, 0, 0, 0.2);

      .image {
        flex: 1;
        background-position: center;
        background-size: cover;
        background-repeat: no-repeat;
      }

      h4 {
        box-sizing: border-box;
        padding: 3px 15px 0px 15px;
        height: 50px;
        line-height: 50px;
        margin: 0px;
        overflow: hidden;
        color: #171717;
        font-size: 20px;
        font-weight: 400;

        text-overflow: ellipsis;
      }

      &.col-2 {
        grid-column: span 2;
      }
      &.row-2 {
        grid-row: span 2;
      }
    }
  }
}
</style>
