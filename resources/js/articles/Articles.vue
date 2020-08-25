<template>

    <div>
        <div v-if="loading"><p>Загрузка...</p></div>
        <div v-else>
            <h1>Каталог статей</h1>
            <div v-for="article in articles.data" class="mb-2">
                <app-article-item :article="article"></app-article-item>
            </div>
            <pagination :data="articles" @pagination-change-page="getResults">
                <span slot="prev-nav">&lt; Предыдущая</span>
                <span slot="next-nav">Следующая &gt;</span>
            </pagination>
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
                articles: {},
                loading: false,
            }
        },
        created() {
            this.getResults();
        },
        methods: {
            async getResults(page = 1) {
                this.loading = true;
                try {
                    const {data} = await axios.get('/api/articles?page=' + page);
                    this.articles = data;

                    this.loading = false;
                } catch (error) {
                    console.log(error)
                }
            }
        }
    }
</script>
