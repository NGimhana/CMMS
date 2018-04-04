
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

import VueResource from 'vue-resource'; 
import VueRouter from 'vue-router';
import AllJobsComponent from './components/AllJobsComponent';

import Vue from 'vue';
import Vuetify from 'vuetify';
 

//import Routes from './routes';


//require('./bootstrap');
require('./semantic-ui');


window.Vue = require('vue');
// const router=new VueRouter({
//     routes:Routes
// });


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

//Component is Registered
Vue.component('main-component', require('./components/mainComponent.vue'));
Vue.component('example-component', require('./components/ExampleComponent.vue'));
Vue.component('ongoingjobs-component', require('./components/onGoingJobs.vue'));
Vue.component('completedjobs-component', require('./components/completedJobs.vue'));
Vue.component('incompletejobs-component', require('./components/IncompleteJobs.vue'));
Vue.component('recentjobs-component', require('./components/RecentJobs.vue'));
Vue.component('alljobs-component', require('./components/AllJobsComponent.vue'));
Vue.component('addjob-component', require('./components/AddJobComponent.vue'));
Vue.component('calendar-component', require('./components/CalendarComponent.vue'));

Vue.use(VueResource);
Vue.use(VueRouter);
Vue.use(Vuetify);

const router = new VueRouter({
    mode:'history',    
    routes:[
        {path:'/jobs',component:AllJobsComponent},
    ]    
})

//Vue.use(VueRouter);
//Creating the root Instance
const app = new Vue({
    router,
    el: '#app',  
    
    data:{
       
    },
    //router:router
});
