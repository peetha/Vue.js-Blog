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
                                <label class="label">Username</label>
                                <div class="control">
                                    <input class="input" type="text" placeholder="Your username" v-model="logDetails.username">
                                </div>
                            </div>
                            <div class="field">
                                <label class="label">Password</label>
                                <div class="control">
                                    <input class="input" type="password" v-model="logDetails.password" placeholder="Password">
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
  import sweetalert from 'sweetalert'

  export default {
    data: function () {
      return {
        //successMessage: "",
        //errorMessage: "",
        logDetails: {username: '', password: ''}
      }
    },
    methods: {
      signIn: function () {
        var logForm = this.toFormData(this.logDetails);
        let self = this;
          axios.post("http://localhost/Blog/login.php", logForm)         //, logForm
          .then(function (response) {
            //console.log(response);

            if (response.data.error) {
              sweetalert(response.data.message, '', 'error');

            }
            else {

              sweetalert(response.data.message, '', 'success');
              self.$session.start();
              self.$session.set('user', response.data.id);
              //console.log(self.$session.get('user') );
              self.$router.replace('/');
              self.$store.dispatch('setIsLogged', true)
             // window.location.href = "/";
              //this.$router.replace('/');
              //this.$router.push("/");

              //this.clearMessage();
              //this.successMessage = response.data.message;
              //this.logDetails = {username: '', password: ''};
            }
          });
      },
      toFormData: function (obj) {
        var form_data = new FormData();
        for (var key in obj) {
          form_data.append(key, obj[key]);
        }
        return form_data;
      },
      clearMessage: function () {
       // this.errorMessage = '';
       // this.successMessage = '';
      }
    }
  }
</script>

<style scoped>
  .form{
    margin-left: 700px;
    margin-right: -500px;
  }

</style>
