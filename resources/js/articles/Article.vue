<template>

    <div>
        <div v-if="loading"><p>Загрузка...</p></div>
        <div v-else>
            <div class="card">
                <img :src="article.image" class="card-img-top mt-4 ml-4" :alt="article.title">
                <div class="card-body">
                    <h5 class="card-title">{{ article.title }}</h5>
                    <p class="card-text">{{ article.content }}</p>
                </div>
                <hr>
                <div class="ml-4">
                    <h5 class="card-title">Теги статьи:</h5>
                    <div v-for="tag in article.tags">
                        <a :href="tag.url">{{ tag.title }}</a>
                    </div>
                </div>
                <hr>
                <div class="ml-4 mb-2 d-flex">
                    <button class="btn btn-secondary mr-4" @click.prevent="addLike">{{ article.likes }}</button>
                    <h5 class="card-title">Лайки</h5>
                </div>
                <hr>
                <div class="ml-4 flex d-flex">
                    <p class="h5 mr-4">{{ article.views }}</p>
                    <h5 class="card-title">Просмотры</h5>
                </div>
                <hr>
            </div>

            <div class="alert alert-success mt-4" v-if="formSent">
                Ваше сообщение успешно отправлено
            </div>

            <div v-else>
                <h5 class="mt-4">Форма комментария</h5>
                <form class="mt-4">
                    <div class="form-group">
                        <label for="title">Тема сообщения</label>

                        <div
                            v-if="errorFor('title')"
                            class="alert alert-danger"
                            v-for="(error, index) in errorFor('title')"
                            :key="index"
                        >
                            {{ error }}
                        </div>

                        <input
                            type="text"
                            class="form-control"
                            id="title"
                            name="title"
                            v-model="title"
                            :class="[{'is-invalid': errorFor('title')}]"
                        >
                    </div>

                    <div class="form-group">
                        <label for="content">Текст сообщения</label>

                        <div
                            v-if="errorFor('content')"
                            class="alert alert-danger"
                            v-for="(error, index) in errorFor('content')"
                            :key="index"
                        >
                            {{ error }}
                        </div>

                        <textarea
                            class="form-control"
                            id="content"
                            name="content"
                            v-model="content"
                            :class="[{'is-invalid': errorFor('content')}]"
                        ></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary mb-4" @click.prevent="sendComment">Отправить</button>
                </form>
            </div>

        </div>
    </div>

</template>

<script>
    export default {
        data() {
            return {
                article: {},
                loading: false,
                title: '',
                content: '',
                errors: null,
                formSent: false
            }
        },
        async created() {
            this.loading = true;
            try {
                const {data} = await axios.get(`/api/articles/${this.$route.params.slug}`);
                this.article = data.data;
                this.loading = false;
            } catch (error) {
                console.log(error)
            }
        },
        mounted() {
            setTimeout(() => {
                this.addView();
            }, 5000)
        },
        methods: {
            async addLike() {
                try {
                    const {data} = await axios.put(`/api/articles/${this.$route.params.slug}/like`);
                    this.article.likes = data.data.likes;
                } catch (error) {
                    console.log(error)
                }
            },
            async addView() {
                try {
                    const {data} = await axios.put(`/api/articles/${this.$route.params.slug}/view`);
                    this.article.views = data.data.views;
                } catch (error) {
                    console.log(error)
                }
            },
            async sendComment() {
                try {
                    const {data} = await axios.post(`/api/articles/${this.$route.params.slug}/comment`, {
                        title: this.title,
                        content: this.content
                    });
                    this.errors = null;
                    this.title = '';
                    this.content = '';
                    this.formSent = true;
                } catch (error) {
                    this.errors = error.response && error.response.data.errors;
                }
            },
            errorFor(field) {
                return this.errors !== null && this.errors[field]
                    ? this.errors[field]
                    : null;
            }
        }
    }
</script>

<style scoped>
    img {
        width: 640px;
    }
</style>
