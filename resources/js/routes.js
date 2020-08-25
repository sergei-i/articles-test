import VueRouter from 'vue-router';
import LastArticles from './articles/LastArticles';
import Articles from './articles/Articles';
import Article from './articles/Article';
import NotFound from './components/NotFound';

const routes = [
    {
        path: '/',
        component: LastArticles,
        name: 'home'
    },
    {
        path: '/articles',
        component: Articles,
        name: 'articles'
    },
    {
        path: '/articles/:slug',
        component: Article,
        name: 'article'
    },
    {
        path: '/404',
        name: '404',
        component: NotFound,
    },
    {
        path: '*',
        redirect: '/404'
    }
]

const router = new VueRouter({
    mode: 'history',
    routes,
})

export default router;
