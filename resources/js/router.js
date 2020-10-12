import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter);

import Student from './components/Student';
import Teacher from './components/Teacher';
import Customer from './components/Customer' ;

const routes = [

    { 
        path: '/',
        component: Teacher
    },

    { 
        path: '/student',
        component: Student
    },

    { 
        path: '/customer',
        component: Customer
    },


  ]

  const router = new VueRouter({
    routes,
    mode:'history',
  })

  export default router;
  