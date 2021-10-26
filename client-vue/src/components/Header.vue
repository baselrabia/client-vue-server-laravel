<template>
  <header>
    <div class="left">
      <img src="../assets/logo.png" alt="TP" class="logo" />
      <p>
        <!-- use the router-link component for navigation. -->
        <!-- specify the link by passing the `to` prop. -->
        <!-- `<router-link>` will render an `<a>` tag with the correct `href` attribute -->
        <router-link to="/"> Home |</router-link>
        <router-link to="/about"> About </router-link>
      </p>
    </div>

    <div class="center">
      <div class="title">
        <h3 class="top">MY</h3>
        <h1>Web Tech</h1>
        <h3 class="bottom">Blog</h3>
      </div>
    </div>

    <div class="right">
      <button class="create-post">Create New Post</button>
    </div>
  </header>
</template>

<script>
export default {
  name: "header",
};
</script>

<style lang="scss" scoped>
header {
  display: flex;
  justify-content: center;
  padding: 50px 50px 0px;

  .left {
    flex: 1;

    .logo {
      width: 75px;
    }
  }

  .center {
    h3 {
      font-size: 32px;
      font-style: italic;
      font-weight: 400;
      margin: 0;

      &.bottom {
        text-align: right;
      }
    }

    h1 {
      color: #171717;
      font-size: 72px;
      margin: 0;
    }
  }

  .right {
    flex: 1;

    display: flex;
    justify-content: flex-end;

    .create-post {
      display: block;
      width: 100%;
      max-width: 250px;
      height: 50px;

      margin: 0 ;

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

    label {
      position: relative;
      display: block;
      width: 300px;

      input {
        width: 100%;
        height: 35px;

        background-color: #ffffff;
        box-shadow: 2px 2px 8px 0px rgba(0, 0, 0, 0.2);

        margin: 0;
        padding: 5px 0px 0px 35px;
        box-sizing: border-box;

        appearance: none;
        border: none;
        outline: none;

        color: #171717;
        font-family: "Rockwell", serif;
        font-size: 16px;

        &::placeholder {
          color: #888888;
        }
      }

      .icon {
        position: absolute;
        width: 25px;
        margin: 5px;
      }
    }
  }
}
</style>
