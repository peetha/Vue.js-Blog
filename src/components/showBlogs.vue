<template>
    <div id="show-blogs">
        <h1>All Blog Articles</h1>
        <input type="text"  v-model="search" placeholder="Search blog">
      <!--<div v-for="post in posts">{{ post.title }}</div>-->
       <div v-for="post in filteredBlogs " class="single-blog">
          <!--<h1>{{post.title}}</h1>-->
          <!--<h1>{{post.content}}</h1>-->

        <router-link v-bind:to="'/blog/' + post.id"><h2 v-rainbow>{{ post.title }}</h2></router-link>
         <article>{{ post.content | snippet }}</article>
         <h2 class="author">{{post.author}}</h2>
        </div>
    </div>
</template>

<script>

 import searchMixin from '../mixins/searchMixin'
  export default {
    data() {
      return {
        errorMessage : "",
        successMessage : "",
        posts: [],
        search: ''
      }
    },
    mounted: function () {
         this.getAllPosts();

    },
    methods: {
      getAllPosts: function () {


        axios.get("http://localhost/Blog/api.php?action=read")           //**     AICI E DE LUCRU WITH THIS JSON            **/
          .then((response) => {
            //console.log(response);
            if (response.data.error) {
              this.errorMessage = response.data.message;
            } else {
              this.posts = response.data.posts;
            }
          });
      },
      /*

      axios
      .get('https://api.coindesk.com/v1/bpi/currentprice.json')
      .then(response => (this.info = response.data.bpi))
      .catch(error => console.log(error))

    */

      /* toFormData: function(obj){
        var form_data = new FormData();
        for ( var key in obj ) {
          form_data.append(key, obj[key]);
        }
        return form_data;
      },*/
      clearMessage: function(){
        app.errorMessage = "";
        app.successMessage = "";
      },
    },
        mixins: [searchMixin]

  }
</script>

<style scoped>
  #show-blogs{
    max-width: 800px;
    margin: 0px auto;
  }
  .single-blog {
    padding: 20px;
    margin: 20px 0;
    box-sizing: border-box;
    background: #eee;
  }
  .author {
    text-decoration: none;
    font-size: 28px;
    text-align: right;
  }
</style>
