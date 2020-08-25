<template>

    <div>
        <div v-if="loading"><p>Загрузка...</p></div>
        <div v-else>
            <h1>Последние статьи</h1>
            <div v-for="article in articles" class="mb-2">
                <app-article-item :article="article"></app-article-item>
            </div>
        </div>
    </div>

</template>

<script>
    import ArticleItem from './ArticleItem';

    export default {
        components: {
            AppArticleItem: ArticleItem
        },
        data() {
            return {
                articles: null,
                loading: false,
            }
        },
        async created() {
            this.loading = true;
            try {
                const {data} = await axios.get('/api/articles/latest');
                this.articles = data.data;
                this.loading = false;
            } catch (error) {
                console.log(error)
            }
        },
    }
</script>
