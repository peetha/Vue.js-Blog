<template>
    <section class="section">
        <h1 class="title has-text-centered">Sign-up</h1>
        <div class="columns">
            <div class="column is-one-third">

                <div class="card form">
                    <div class="card-header is-centered">
                        <h2 class="card-header-title is-centered">Create an Account</h2>
                    </div>
                    <div class="card-content">
                        <form v-on:submit.prevent>
                          <div class="field">
                            <label class="label">First Name</label>
                            <div class="control">
                              <input class="input" type="text" placeholder="First Name" v-model="newUser.firstName">
                            </div>
                          </div>
                          <div class="field">
                            <label class="label">Last Name</label>
                            <div class="control">
                              <input class="input" type="text" placeholder="Last Name" v-model="newUser.lastName">
                            </div>
                          </div>
                          <div class="field">
                            <label class="label">Username</label>
                            <div class="control">
                              <input class="input" type="text" placeholder="Username" v-model="newUser.username">
                            </div>
                          </div>
                            <div class="field">
                                <label class="label">Email</label>
                                <div class="control">
                                    <input class="input" type="email" placeholder="Email" v-model="newUser.email">
                                </div>
                            </div>
                            <div class="field">
                                <label class="label">Password</label>
                                <div class="control">
                                    <input class="input" type="password" placeholder="Password" v-model="newUser.password">
                                </div>
                            </div>
                            <button type="submit" class="button is-primary" v-on:click="signUp">Sign-up</button>
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
          newUser:
            {firstName: "", lastName: "", username: "", email: "", password: ""}
        }
      },
        methods: {

          signUp:function(){
            let self = this;
            var formData = this.toFormData(this.newUser);
            axios.post("http://localhost/Blog/api.php?action=create", formData)

              .then(function(response){
                //console.log(response.data.message);
               // this.newUser = {firstName: "", lastName: "", username: "", email: "", password: ""};
                if (response.data.error) {
                  //app.errorMessage = response.data.message;
                  sweetalert(response.data.message, '', 'error')
                }else{
                  sweetalert('Registered successfully', '', 'success');
                  self.$router.replace('/');

                  //this.$router.push("/");
                 // app.successMessage = response.data.message;
                 // app.getAllUsers();
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


        }
    }
</script>

<style scoped>
.form {
    margin-left: 700px;
    margin-right: -500px;
}
</style>
