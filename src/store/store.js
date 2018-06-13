

import Vue from 'vue'
import Vuex from 'vuex'
// import Firebase from 'firebase'

Vue.use(Vuex);

export const store = new Vuex.Store({
    state: {
      isLogged: JSON.parse(localStorage.getItem('isLogged')),
        // user: null
    },
    getters: {
      // getIsLogged: state => {
      //   console.log(localStorage.getItem('isLogged'))
      //       return localStorage.getItem('isLogged');
      //   },
    },/*
  mutations: {
    setIsLogged(state, {val}) {
      localStorage.setItem('isLogged', val);
    }
  },
*/
    actions: {
      // isLoggedd: ({ commit }, isLogged) => (commit('setIsLogged', {isLogged} ))
      setIsLogged() {
        localStorage.setItem('isLogged', true)   //aici tre o functie pt ambele metode, in functie de param .... ('isLogged', val)
        this.state.isLogged = true;          //this.state.isLogged = val
      },
      unsetIsLogged() {
        localStorage.setItem('isLogged', false);
        this.state.isLogged = false;
      },
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



