/*

import Vue from 'vue'
import Vuex from 'vuex'
// import Firebase from 'firebase'

Vue.use(Vuex);

export const store = new Vuex.Store({
    state: {
        user: null
    },
    getters: {
        getUser: state => {
            return state.user;
        }
    },
    mutations: {
        setUser: state => {
          var logForm = this.toFormData(this.logDetails);
          axios.post("http://localhost/Blog/login.php", logForm)
              .then(function (response) {
                state.user = response.data.id;
              })

           // state.user = Firebase.auth().currentUser;
        }
    },
    actions: {
        setUser: context => {
            context.commit('setUser');
        }
    },
  methods: {
    toFormData: function (obj) {
      const form_data = new FormData();
      for (let key in obj) {
        form_data.append(key, obj[key]);
      }
      return form_data;
    }
  }
});

*/
