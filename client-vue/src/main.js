import { createApp } from "vue";
import App from "./App.vue";
import routes from "./router";
import { createRouter, createWebHashHistory } from "vue-router";
import mitt from "mitt";


const eventBus = mitt();

// 5. Create and mount the root instance.
const app = createApp(App);
// Make sure to _use_ the router instance to make the
// whole app router-aware.

const router =  createRouter({
  // 4. Provide the history implementation to use. We are using the hash history for simplicity here.
  history:  createWebHashHistory(),
  routes, // short for `routes: routes`
});


app.use(router);
app.config.globalProperties.eventBus = eventBus;

app.mount("#app");
