<template>
    <div>
      <app-header></app-header>
        <router-view ></router-view>
        <app-back-to-top style="margin-bottom: 30px;"></app-back-to-top>
        <app-footer></app-footer>


    </div>
</template>

<script>
   import addBlog from './components/addBlog'
    import showBlogs from './components/showBlogs'
    import listBlogs from './components/listBlogs'
    import header from './components/header'
    import signIn from './components/singIn'
    import signUp from './components/signUp'
    import footer from './components/footer'
    import BackToTop from 'vue-back-top'
    import Vue from 'vue'
    import VueJsDialog from 'vuejs-dialog'

    export default {

        components :{
            'show-blogs': showBlogs,
            'list-blogs': listBlogs,
            'add-blog': addBlog,
            'app-header': header,
            'signIn': signIn,
            'signUp': signUp,
            'app-footer': footer,
            'app-back-to-top': BackToTop

        },
        data () {
            return {


            }

        },
        methods: {
           /* setUser: function () {
                this.$store.dispatch('setUser');
            }*/

        },
        created() {
          //  this.setUser();
        }
    }
  //  Vue.component(VmBackTop.name, VmBackTop)
</script>

<style>
    body{
        margin: 0;
        font-family: 'Nunito SemiBold';
    }

</style>
