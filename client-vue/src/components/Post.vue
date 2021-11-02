<template>
  <div class="posts">
    <div class="post">
      <div
        class="image"
        :style="{
          backgroundImage: `url('${require('../assets/post-1-image@2x.png')}')`,
        }"
      ></div>

      <h2>{{ post.title }}</h2>
      <p>{{ post.body }}</p>
      <button class="waves-effect waves-ligh btn-floating btn-large btn-flat" @click="showUpdate = true">
        <i class="large material-icons green-text text-darken-2">create</i>
      </button>
 

        <!-- use the modal component, pass in the prop -->
        <updatePost v-if="showUpdate" @close="showUpdate = false" :post="post" ></updatePost>
        <deletePost v-if="showDelete" @close="showDelete = false" :post="post" ></deletePost>
        

      <b>Edit</b>

      <div class="right">
        <button class="waves-effect waves-ligh btn-floating btn-large btn-flat" @click="showDelete = true">
          <i class="large material-icons red-text text-darken-2">close</i>
        </button>
        <b> Delete </b>
      </div>
      
    </div>
  </div>
</template>

<script>
import PostDataService from "../services/PostDataService";
import updatePost from "./Post/Update";
import deletePost from "./Post/Delete";

export default {
  name: "post",
  data() {
    return {
      post: {
        id: "",
        title: "",
        body: "",
      },
      submitted: false,
      showUpdate: false,
      showDelete: false,
    };
  },
  props: ["id"],
  components: {
    updatePost,deletePost,
  },
  methods: {
    getPost() {
      PostDataService.get(this.id)
        .then((response) => {
          this.post = response.data.data;
        })
        .catch((e) => {
          console.log("error",e);
        });
    },
  },
    mounted() {
 
    this.eventBus.on("deletePost", (data) => {
      console.log("delete",data.id);

      PostDataService.delete(data.id)
        .then((response) => {
          console.log("response",response);
          this.$router.push('/') 
        })
        .catch((error) => {
          console.log("error",error);
          alert("The Post did'nt deleted", error);
        });
        
    });

    this.eventBus.on("updatePost", (data) => {
      console.log("update",data);

      PostDataService.update(data.id,data)
        .then((response) => {
          console.log("response",response);
          this.post = response.data.data;
        })
        .catch((error) => {
          console.log("error",error);
          alert("The Post did'nt updated", error);
        });
    });



  },
  beforeMount() {
    this.eventBus.all.clear();
    
    this.getPost();
  },
};
</script>

<style lang="scss" scoped>
.posts {
  width: 100%;
  max-width: 1280px;

  margin: 50px auto;

  .post {
    display: block;
    padding: 20px;
    background: #fff;
    box-shadow: 3px 3px 8px 0px rgba(0, 0, 0, 0.2);
    margin-bottom: 20px;
    .image {
      height: 250px;
      background-position: center;
      background-size: cover;
      background-repeat: no-repeat;
    }
  }

  .load {
    display: block;
    width: 100%;
    max-width: 250px;
    height: 50px;

    margin: 0 auto;

    outline: none;
    border: none;
    border-radius: 15px;
    appearance: none;

    background-color: #ffce00;
    box-shadow: 3px 3px 8px 0px rgba(0, 0, 0, 0.2);

    color: #171717;
    font-family: "Rockwell", serif;
    font-size: 28px;

    padding-top: 7px;
    box-sizing: border-box;
  }
}
</style>
