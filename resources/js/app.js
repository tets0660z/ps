require("./bootstrap");

window.Vue = require("vue");

import VueRouter from "vue-router";
Vue.use(VueRouter);

const routes = [
    {
        path: "/subject",
        component: require("./components/Subjects.vue").default
    },

    {
        path: "/classrecord",
        component: require("./components/ClassRecord.vue").default
    }
];

const router = new VueRouter({
    routes,
    mode: "history"
});

Vue.component(
    "example-component",
    require("./components/ExampleComponent.vue").default
);

const app = new Vue({
    el: "#app",
    router
});
