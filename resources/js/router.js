import { createRouter , createWebHistory } from "vue-router";
import Home from './pages/Home.vue';
import Contacts from './pages/Contacts.vue';
import About from './pages/About.vue';
import Blog from './pages/Blog.vue';
import PostDetail from './pages/PostDetail.vue';
import Error404 from './pages/Error404.vue';
const router = createRouter({
    history: createWebHistory(),
    routes:[
        {
            path:'/',
            name:'home',
            component: Home
        },
        {
            path:'/contacts',
            name:'contacts',
            component: Contacts
        },
        {
            path:'/about',
            name:'about',
            component: About
        },
        {
            path:'/blog',
            name:'blog',
            component: Blog
        },
        {
            path:'/blog/post-detail/:slug',
            name:'detail',
            component: PostDetail
        },
        {
            path:'/:pathMatch(.*)*',
            component: Error404
        },
    ]
});

export {router};
