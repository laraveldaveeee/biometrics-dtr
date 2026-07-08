 
require('./bootstrap');

window.Vue = require('vue'); 
Vue.component('example-component', require('./components/ExampleComponent.vue').default);

Vue.component(
    'live-attendance',
    require('./components/LiveAttendanceComponent.vue').default
);

 

const app = new Vue({
    el: '#app',
});
