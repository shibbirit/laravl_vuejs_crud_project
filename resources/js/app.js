

require('./bootstrap');

window.Vue = require('vue');


import router from './router';


Vue.component('student', require('./components/Student.vue').default);

Vue.component('teacher', require('./components/Teacher.vue').default);



const app = new Vue({

    el: '#app',
    router
  
    
    
    
});
