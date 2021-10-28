<template>
  <div class="clearfix">
    <transition name="modal">
      <div class="modal-mask">
        <div class="modal-wrapper">
          <div class="modal-container">
            <div class="modal-header">
              <slot name="header">
                <h4 class="blue-text">Create Post</h4>
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
                    <input id="title"
                            v-model="title"
                            type="text"
                            name="title"
                            class="validate" 
                        />
                    <label for="title">Title</label>
                  </div>
                  <div class="input-field col s12">
                    <textarea
                      id="body"
                      v-model="body"
                      name="body"
                      class="materialize-textarea validate"
                    ></textarea>
                    <label for="body">Body</label>
                  </div>
                  <input
                        type="submit"
                        value="Create"
                        class="waves-effect waves-light btn form-btn"
                      > 
                 </form>
              </slot>
            </div>

            <div class="modal-footer">
              <slot name="footer">
                <button
                  class="modal-default-button waves-effect waves-light btn"
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
  name: "Modal",
  data() {
    return {
      errors: [],
      title: "",
      body: "",
    };
  },
  methods:{
    checkForm: function (e) {
      if (this.title && this.body) {
        this.$emit("close");
        this.eventBus.emit("submitPost", {
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

// .modal-mask {
//   position: fixed;
//   z-index: 9998;
//   top: 0;
//   left: 0;
//   width: 100%;
//   height: 100%;
//   background-color: rgba(0, 0, 0, 0.5);
//   display: table;
// }

// .modal-wrapper {
//   display: table-cell;
//   vertical-align: middle;
// }

// .modal-container {
//   width: 300px;
//   margin: 0px auto;
//   padding: 20px 30px;
//   background-color: #fff;
//   border-radius: 2px;
//   box-shadow: 0 2px 8px rgba(0, 0, 0, 0.33);
//   font-family: Helvetica, Arial, sans-serif;
// }

// .modal-header h3 {
//   margin-top: 0;
//   color: #42b983;
// }

// .modal-body {
//   margin: 20px 0;
// }

// .modal-default-button {
//   display: block;
//   margin-top: 1rem;
// }

// /*
//  * The following styles are auto-applied to elements with
//  * transition="modal" when their visibility is toggled
//  * by Vue.js.
//  *
//  * You can easily play with the modal transition by editing
//  * these styles.
//  */

// .modal-enter-active,
// .modal-leave-active {
//   transition: opacity 0.5s ease;
// }

// .modal-enter-from,
// .modal-leave-to {
//   opacity: 0;
// }
</style>
