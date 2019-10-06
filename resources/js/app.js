require("./bootstrap");

window.Vue = require("vue");

import VueRouter from "vue-router";
import VueProgressBar from "vue-progressbar";
import { Form, HasError, AlertError } from "vform";
import VTooltip from "v-tooltip";

window.Form = Form;
//vue router
Vue.use(VueRouter);
// progress bar
Vue.use(VueProgressBar, options);

// vform
Vue.component(HasError.name, HasError);
Vue.component(AlertError.name, AlertError);

// tooltip

Vue.use(VTooltip);

// progress bar
const options = {
    color: "#f1f1f1",
    failedColor: "#874b4b",
    thickness: "5px",
    transition: {
        speed: "0.2s",
        opacity: "0.6s",
        termination: 300
    },
    autoRevert: true,
    location: "left",
    inverse: false
};
//   vue router
const routes = [
    {
        path: "/classlists",
        component: require("./components/Classlists.vue").default
    },

    {
        path: "/classrecord/:placeName",
        name: "classrecord",
        props: true,
        component: require("./components/ClassRecord.vue").default
    },
    {
        path: "/classrecord/labview/:placeName",
        name: "labview",
        props: true,
        component: require("./components/classrecords/ShowStudents.vue").default
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
