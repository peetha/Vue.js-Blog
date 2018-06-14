import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex);

export const store = new Vuex.Store({
    state: {
      isLogged: JSON.parse(localStorage.getItem('isLogged')),
        // user: null
    },
/*
  mutations: {
    setIsLogged(state, {val}) {
      localStorage.setItem('isLogged', val);
    }
  },
*!/*/
    actions: {
      // isLoggedd: ({ commit }, isLogged) => (commit('setIsLogged', {isLogged} ))
      setIsLogged( context, {val}) {
        console.log(val);
        localStorage.setItem('isLogged', val)   //aici tre o functie pt ambele metode, in functie de param .... ('isLogged', val)
        this.state.isLogged = val;          //this.state.isLogged = val
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



