<template>
    <div id="add-blog">
        <h2>Add a New Blog Post</h2>
        <form v-if="!submitted">
            <label>Blog Title:</label>
            <input type="text" v-model.lazy="post.title" required>
            <label>Blog Content:</label>
            <textarea v-model.lazy.trim="post.content"></textarea>
            <div id="checkboxes">
                <p>Blog categories:</p>
                <label>Sport Cars</label>
                <input type="checkbox" value="cars" v-model="post.categories" >
                <label>Tech</label>
                <input type="checkbox" value="tech" v-model="post.categories">
                <label>Sports</label>
                <input type="checkbox" value="sports" v-model="post.categories">
                <label>Games</label>
                <input type="checkbox" value="gamse" v-model="post.categories">
            </div>
            <label>Author:</label>
            <select v-model="post.author">
                <option v-for="author in authors">{{ author }}</option>
            </select>
            <hr/>
            <button v-on:click.prevent="poste">Add Blog</button>
        </form>
        <!--<div v-if="submitted">
            &lt;!&ndash;<h3>Thanks for adding your post</h3>&ndash;&gt;
        </div>-->
        <div id="preview">
            <p>Preview blog</p>
            <p>Blog title: {{ post.title }}</p>
            <p>Blog content:</p>
            <div>{{ post.content }}</div>
            <p>Blog categories:</p>
            <ul>
                <li v-for="category in post.categories">{{ category}}</li>
            </ul>
            <p>Author: {{ post.author }}</p>
        </div>
    </div>
</template>

<script>
    import sweetalert from 'sweetalert'
    export default {
        data() {
            return {
                post: {
                    title: '',
                    content: '',
                    categories: [],
                    author: ''
                },
                authors: ['The Specialist', 'The Vue Guru', 'Black Rider'],
                submitted: false
            }
        },
        methods: {
           /* poste: function () {      //have to rename this function.....has the same name with post from data()
                this.$http.post('https://vueblog-c471d.firebaseio.com/posts.json',this.post).then(function (data) {
                    console.log(data);
                    this.submitted = true;
                    sweetalert('Blog added successfully', '', 'success')
                });
            }*/
        }

    }
</script>

<style scoped>
    #add-blog*{
        box-sizing: border-box;
    }
    #add-blog {
        margin: 20px;
        max-width: 500px;
    }
    label{
        display: block;
        margin: 20px 0 10px;
    }
    input[type="text"], textarea{
        display: block;
        width: 100%;
        padding: 8px;
    }
    #preview{
        padding: 10px 20px;
        border: 1px dotted #ccc;
        margin: 30px 0;
    }
    h3{
        margin-top: 10px;
    }
    #checkboxes input{
        display: inline-block;
        margin-right: 10px;
    }
    #checkboxes label{
        display: inline-block;
        margin-top: 0;
    }

</style>
