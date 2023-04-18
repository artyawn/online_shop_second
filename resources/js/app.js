import './bootstrap';
import { createApp } from "vue";
import App from "./components/Main.vue";
import router from "./router/index";

createApp(App)
    .use(router)
    .mount("#app");

