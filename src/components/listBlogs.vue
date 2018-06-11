<template>
    <div id="show-blogs">
        <h1>List Blog Titles</h1>
        <input type="text" v-model="search" placeholder="Search blog">
        <div v-for="post in filetredBlogs" class="single-blog">
            <h2 v-rainbow>{{ post.title | toUppercase }}</h2>

        </div>
    </div>
</template>

<script>
    import searchMixin from '../mixins/searchMixin'
    export default {
        data() {
            return {
                posts: [],
                search: ''
            }
        },
        methods: {

        },
        created() {
            this.$http.get('http://jsonplaceholder.typicode.com/posts').then(function(data){
                this.posts = data.body.slice(0,10);
            });
        },
        computed: {

        },
        filters: {
            toUppercase(value) {
                return value.toUpperCase();
            }
        },
        mixins: [searchMixin]
    }
</script>

<style scoped>
    #show-blogs{
        max-width: 800px;
        margin: 0px auto;
    }
    .single-blog{
        padding: 20px;
        margin: 20px 0;
        box-sizing: border-box;
        background: #eee;
    }
</style>