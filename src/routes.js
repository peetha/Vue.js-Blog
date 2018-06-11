import showBlogs from './components/showBlogs'
import addBlog from './components/addBlog'
import singleBlog from './components/singleBlog'
import singIn from './components/singIn'
import signUp from './components/signUp'
export default [
    {path: '/', component:  showBlogs},
    {path: '/add', component: addBlog},
    {path: '/blog/:id', component: singleBlog},
    {path: '/sign-in', component: singIn},
    {path: '/sign-up', component: signUp}
]
