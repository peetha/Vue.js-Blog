<template>
    <section class="section">
        <h1 class="title has-text-centered">Sign-in</h1>
        <div class="columns">
            <div class="column is-one-third">

                <div class="card form" style="">
                    <div class="card-header is-centered">
                        <h2 class="card-header-title is-centered">Sign in to Your Account</h2>
                    </div>
                    <div class="card-content">
                        <form v-on:submit.prevent>
                            <div class="field">
                                <label class="label">Email</label>
                                <div class="control">
                                    <input class="input" type="email" placeholder="Your Email" v-model="email">
                                </div>
                            </div>
                            <div class="field">
                                <label class="label">Password</label>
                                <div class="control">
                                    <input class="input" type="password" v-model="password" placeholder="Password">
                                </div>
                            </div>
                            <button type="submit" class="button is-primary" v-on:click="signIn">Sign In</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
   // import Firebase from 'firebase'
    import sweetalert from 'sweetalert'

    export default {
       data: function () {
           return {
               email: '',
               password: ''
           }
       },
        methods: {
          /* signIn: function () {
               Firebase.auth()
                   .signInWithEmailAndPassword(this.email, this.password)
                   .then( (user) => {
                           this.$router.replace('/');
                       },
                       () => {
                           sweetalert('Incorrect email or password', '', 'error')
                       }
                   );
           }*/
        }
    }
</script>

<style scoped>
    .form{
        margin-left: 700px;
        margin-right: -500px;
    }

</style>
