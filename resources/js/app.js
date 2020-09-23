
require('./bootstrap');

window.Vue = require('vue');
import Vue from 'vue'
import Vuesax from 'vuesax'
import 'vuesax/dist/vuesax.css'
import Multiselect from 'vue-multiselect'

Vue.component('test',require('./components/Test').default);

const vm = new Vue({
    el: '#otoApp',
});
Vue.use(Vuesax, {
    // options here
})
