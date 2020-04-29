import 'es6-promise/auto';
import Vue from "vue";
import App from "./App.vue";
import router from "./router";
import store from "./store";
// import "./registerServiceWorker";
// //attach Css files
import "bootstrap";
import "bootstrap/dist/css/bootstrap.min.css";
/*
import "./assets/css/jquery.ui.theme.min.css";
import "./assets/css/jquery-ui.min.css";*/

// //attach Js files
import "bootstrap/dist/js/bootstrap.min.js";

/*import "./assets/js/popper.min.js";*/

// attach fontawesome files
import "@fortawesome/fontawesome-free/css/all.css";
import "@fortawesome/fontawesome-free/js/all.js";
import loading from 'vue-loading';
import VueGoodTablePlugin from 'vue-good-table';

Vue.use(loading);
Vue.use(VueGoodTablePlugin);
Vue.config.productionTip = false;

new Vue({
    router,
    store,
    render: h => h(App)
}).$mount("#app");
