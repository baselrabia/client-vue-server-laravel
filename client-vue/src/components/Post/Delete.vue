<template>
  <div class="clearfix">
    <transition name="modal">
      <div class="modal-mask">
        <div class="modal-wrapper">
          <div class="modal-container">
            <div class="modal-header">
              <slot name="header">
                <h4 class="blue-text">Delete Post</h4>
              </slot>
            </div>

            <div class="modal-body">
              <slot name="body">
                <form
                  class="col s12"
                  id="create-form"
                  @submit="checkForm"
                >
                 <p v-if="errors.length">
                    <b>Please correct the following error(s):</b>
                    <ul>
                      <li 
                        v-for="error in errors" 
                        :key="error"
                        class="center-align red lighten-3 black-text text-darken-2"
                        >{{ error }}</li>
                        
                    </ul>
                  </p>
                  <div class="input-field col s12">
                   
                    <p> Are you sure you want to delete this post?</p>
                    <h4> {{ post.title }} </h4>
                    <br>
 
                  </div>
               
                  <input
                        type="submit"
                        value="Delete"
                        class="waves-effect waves-light btn form-btn red"
                      > 
                 </form>
              </slot>
            </div>

            <div class="modal-footer">
              <slot name="footer">
                <button
                  class="modal-default-button waves-effect waves-light btn grey"
                  @click="$emit('close')">
                  Close
                </button>
              </slot>
            </div>
          </div>
        </div>
      </div>
    </transition>
  </div>
</template>

<script>
export default {
  name: "Delete",
  props: {
    post: {
      type: Object,
      required: true
    }
  },
  data() {
    return {
      errors: [],
    };
  },
  methods:{
    checkForm: function () {
      console.log('Delete checkForm');
      this.$emit("close");
      this.eventBus.emit("deletePost", {
        id: this.post.id,
      }); 
      
      return true;
    }
  }

};
</script>

<style lang="scss">
body {
  padding: 25px;
}
.modal-mask {
  position: fixed;
  z-index: 100;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-color: rgba(0, 0, 0, 0.3);
  overflow-y: auto;
}
.modal-container {
  width: 70%;
  height: auto;
  margin: 50px auto 0;
  position: relative;
  padding: 16px;
  background-color: #fff;
  border-radius: 2px;
  box-shadow: 0 2px 8px rgba(0, 0, 0, 0.33);
  box-sizing: border-box;
}
.form-btn {
  float: right;
}
.clearfix::after {
  content: "";
  clear: both;
  display: table;
}

 
</style>
