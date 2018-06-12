<template>
    <nav>
        <ul>
            <li><router-link to="/" exact>Home</router-link></li>
            <li><router-link to="/add"  exact >Add a new blog</router-link></li><!--only if the user is logged in    v-if="user"   -->
            <li><router-link to="/sign-in"  exact>Sign In</router-link></li>  <!-- v-if="!user -->
            <li><router-link to="/sign-up"  exact>Sign Up</router-link></li> <!--  v-if="!user"-->
            <a v-on:click="signOut">Sign Out</a> <!-- v-if="user" -->
        </ul>
    </nav>
</template>

<script>
    // import Firebase from 'firebase'

    export default {
      computed: {
        user() {
          //return this.$store.getters.getUser;
        }
      },
      methods: {
        signOut: function () {
          /*    this.$dialog.confirm('Are you sure ypu want to log out?')
                    .then(function () {
                        Firebase.auth()
                            .signOut()
                            .then(() => {
                                this.$router.replace('/');
                            });
                    })
                    .catch(function () {
                        console.log('Clicked on cancel')
                    });

            }*/
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
