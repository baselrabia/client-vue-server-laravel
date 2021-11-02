import Blog from "../components/Blog";
import About from "../components/About";
import Post from "../components/Post";
// 1. Define route components.
// These can be imported from other files
 
// 2. Define some routes
// Each route should map to a component.
// We'll talk about nested routes later.
const routes = [
  {
    path: "/",
    name: "Home",
    component: Blog,
  },
  {
    path: "/about",
    name: "About",
    component: About,
  },
  {
    path: "/posts/:id",
    name: "Post",
    component: Post,
    props: true,
  },
];
// 3. Create the router instance and pass the `routes` option
// You can pass in additional options here, but let's
// keep it simple for now.

export default routes;
