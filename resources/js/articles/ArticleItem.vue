<template>

    <div class="card">
        <img :src="article.image" class="card-img-top mt-4 ml-4" :alt="article.title">
        <div class="card-body">
            <h5 class="card-title">{{ article.title }}</h5>
            <p class="card-text">{{ article.content }}</p>
        </div>
        <div class="card-body">
            <router-link :to="{name: 'article', params: {slug: article.slug}}" class="card-link">
                Ссылка на статью
            </router-link>
        </div>
    </div>

</template>

<script>
    export default {
        props: {
            article: Object,
        }
    }
</script>

<style scoped>
    img {
        width: 320px;
    }
</style>
