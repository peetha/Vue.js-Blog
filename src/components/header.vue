<template>
  <nav>
      <ul>
        <li><router-link to="/" exact>Home</router-link></li>
        <li><router-link v-if="!$store.state.isLogged" to="/sign-in">Sign In</router-link></li>  <!-- v-if="!user -->
        <li><router-link v-if="!$store.state.isLogged" to="/sign-up">Sign Up</router-link></li>
        <li><router-link v-if="$store.state.isLogged" to="/add" >Add a new blog</router-link></li>
        <li v-if="$store.state.isLogged" v-on:click="signOut()">Sign Out </li>
      </ul>
  </nav>
</template>

<script>

    export default {

      methods: {
        signOut: function() {
          this.$session.destroy();
          this.$router.replace("/");
          this.$store.dispatch({type:'setIsLogged', val:false});
        }
        }

    }
</script>

<style scoped>
    ul {
        list-style-type: none;
        text-align: center;
        margin: 0;
    }
    li  {
        display: inline-block;
        margin: 0 10px;
      color: #fff;
    }
    a:hover {

      color: darkcyan;
    }
    li:hover {
      color: darkcyan;
    }
    a {
        color: #fff;
        text-decoration: none;
        padding: 6px 8px;
        border-radius: 10px;
    }
    nav{
        background: #444;
        padding: 14px 0;
        margin-bottom: 40px;
    }
</style>
