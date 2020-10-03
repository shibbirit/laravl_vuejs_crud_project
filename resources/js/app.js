

require('./bootstrap');

window.Vue = require('vue');


Vue.component('student', require('./components/Student.vue').default);

Vue.component('teacher', require('./components/Teacher.vue').default);



const app = new Vue({
    el: '#app',
    
    
});
