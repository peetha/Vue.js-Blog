<template>
  <nav>
    <div v-if="$store.state.isLogged">
      <ul>
        <li><router-link to="/" exact>Home</router-link></li>
        <li><router-link to="/add" >Add a new blog</router-link></li>
        <a v-on:click="signOut()">Sign Out </a>
      </ul>
    </div>
    <div v-if="!$store.state.isLogged">
      <ul>

        <li><router-link to="/" exact>Home</router-link></li>
        <li><router-link to="/sign-in">Sign In</router-link></li>  <!-- v-if="!user -->
        <li><router-link to="/sign-up">Sign Up</router-link></li>
      </ul>
    </div>
  </nav>
</template>

<script>

    export default {

      methods: {
        signOut: function() {
          //let self = this;
          //this.$session.start();
          //console.log(this.$session.exists());
          this.$session.destroy();
          this.$router.replace("/");
          this.$store.dispatch('unsetIsLogged', false);
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
    li {
        display: inline-block;
        margin: 0 10px;
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
    .router-link-active {
        background: #eee;
        color: #444;
    }
   /* .logout{
        background: #eee;
        color: #444;
    }*/

</style>
