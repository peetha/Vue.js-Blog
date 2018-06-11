// The Vue build version to load with the `import` command
// (runtime-only or standalone) has been set in webpack.base.conf with an alias.
import Vue from 'vue'
import App from './App'
import VueResource from 'vue-resource'
import VueRouter from 'vue-router'
import Routes from './routes'
//import Firebase from 'firebase'
//import { store } from './store/store'
import VuejsDialog from 'vuejs-dialog'
// import Axios from 'vue-axios'


Vue.use(VueRouter);
Vue.use(VueResource);
Vue.use(VuejsDialog);
// Vue.use(Axios);


Vue.config.productionTip = false;



//Random background color for title
Vue.directive('rainbow',{
    bind(el, binding, vnode) {
        el.style.color = "#" + Math.random().toString().slice(2,8);
    }
});



//Snippet
Vue.filter('snippet', function (value) {
    return value.slice(0,150) + '...';
});

// Initialize Firebase
/*var config = {
    apiKey: "AIzaSyBWZ8u2Pxq5w7HwQiZSdvbRFqrp-KI4t5k",
    authDomain: "vueblog-c471d.firebaseapp.com",
    databaseURL: "https://vueblog-c471d.firebaseio.com",
    projectId: "vueblog-c471d",
    storageBucket: "vueblog-c471d.appspot.com",
    messagingSenderId: "61496578340"
};
Firebase.initializeApp(config);*/


const router = new VueRouter({
    routes: Routes,
    mode: 'history'
});


/*
router.beforeEach((to, from, next) => {
    const currentUser = Firebase.auth().currentUser;
    const requiresAuth = to.matched.some(record => record.meta.requiresAuth);
    if (requiresAuth && !currentUser) {
        next ('/sign-in');
    } else if (requiresAuth && currentUser) {
        next();
    } else {
        next();
    }

});
*/



/* eslint-disable no-new */
// Firebase.auth().onAuthStateChanged(function (user) {


    new Vue({
        el: '#app',
        //store: store,
        components: {App},
        template: '<App/>',
        router: router
    });
//});
