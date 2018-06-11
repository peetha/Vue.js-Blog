<template>
    <div class="single-post">
        <h1 class="title">{{ blog.title }}</h1>
        <article>{{ blog.content }}</article>
          <p class="author">Author: {{ blog.author }}</p>
        <ul>
            <li v-for="category in blog.categories">{{ category }}</li>
        </ul>
    </div>
</template>

<script>
    export default {
        data () {
            return {
                id: this.$route.params.id,
                blog: [],
              errorMessage: ""
            }
        },
        created() {
          //console.log(this.id);
          axios.get("http://localhost/Blog/api.php?post_id=" + this.id)
            .then((response) => {
              if (response.data.error) {
                this.errorMessage = response.data.message;
              } else {
               // console.log(response);
                this.blog = response.data.post;
                //console.log(this.blog)
              }
            });

          /*  this.$http.get('https://vueblog-c471d.firebaseio.com/posts/' + this.id + '.json').then(function (data) {
               return data.json();
            }).then(function (data) {
                this.blog = data;
            })*/
        }
    }
</script>

<style scoped>
#single-blog {
    padding: 20px;
    margin: 20px 0;
    box-sizing: border-box;
    background: #eee;
}
  .author {
    font-size: 28px;
    text-align: right;
  }
  .title {
    text-align: center;
  }

  .single-post {
    margin-left: 150px;
    margin-right: 170px;

  }
</style>
