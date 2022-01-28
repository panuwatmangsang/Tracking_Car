require('./bootstrap');

window.Vue = require('vue').default;

Vue.component('example-component', require('./components/ExampleComponent.vue').default);

import Vue from "vue";
import * as VueGoogleMaps from 'vue2-google-maps';

Vue.use(VueGoogleMaps, {
   load: {
       key: 'AIzaSyAF6dOf5hnd662VGA_QlkXtuODatOq5Ick'
   } 
});
const app = new Vue({
    el: '#app',
});
