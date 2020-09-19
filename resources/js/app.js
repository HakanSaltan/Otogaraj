
require('./bootstrap');

window.Vue = require('vue');


Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('test-component',require('./components/Test').default);

const vm = new Vue({
    el: '#app',
});
