<template>
  <div class="clearfix">
    <transition name="modal">
      <div class="modal-mask">
        <div class="modal-wrapper">
          <div class="modal-container">
            <div class="modal-header">
              <slot name="header">
                <h4 class="blue-text">Update Post</h4>
              </slot>
            </div>

            <div class="modal-body">
              <slot name="body">
                <form
                  class="col s12"
                  id="create-form"
                  @submit="checkForm"
                >
                 <br>
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
                    <input id="title"
                            v-model="title"
                            type="text"
                            name="title"
                            class="validate" 
                        />
                    <label for="title" class="active" >Title</label>
                  </div>
                  <div class="input-field col s12">
                    <textarea
                      id="body"
                      v-model="body"
                      name="body"
                      class="materialize-textarea validate"
                    ></textarea>
                    <label for="body" class="active" >Body</label>
                  </div>
                  <input
                        type="submit"
                        value="Update"
                        class="waves-effect waves-light btn form-btn"
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
  name: "Update",
  data() {
    return {
      errors: [],
      title: this.post.title,
      body: this.post.body,
    };
  },
  props: {
    post: {
      type: Object,
      required: true,
    },
  },
  methods:{
    checkForm: function () {
      if (this.title && this.body) {
        this.$emit("close");
        console.log("update" ,this.eventBus.all );

        this.eventBus.emit("updatePost", {
            id: this.post.id,
            title: this.title,
            body: this.body,
        });       
        

        this.errors = [];
        
        return true;
      }

      this.errors = [];

      if (!this.title) {
        this.errors.push('- Title Required.');
      }
      if (!this.body) {
        this.errors.push('- Body Required.');
      }

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
