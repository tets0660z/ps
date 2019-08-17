require("./bootstrap");

window.Vue = require("vue");

import VueRouter from "vue-router";
Vue.use(VueRouter);

const routes = [
    {
        path: "/transaction",
        component: require("./components/Transaction.vue").default
    }
];

const router = new VueRouter({
    routes // short for `routes: routes`
});

Vue.component(
    "example-component",
    require("./components/ExampleComponent.vue").default
);

const app = new Vue({
    el: "#app",
    router
});
