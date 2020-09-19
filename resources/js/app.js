
require('./bootstrap');

window.Vue = require('vue');


Vue.component('test',require('./components/Test').default);

const vm = new Vue({
    el: '#otoApp',
});
