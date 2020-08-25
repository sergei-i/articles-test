<template>
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">

            <div class="collapse navbar-collapse">

                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <router-link
                            class="nav-link"
                            :to="{name: 'home'}"
                            exact-active-class="active"
                        >
                            Главная страница
                        </router-link>
                    </li>
                    <li class="nav-item">
                        <router-link
                            class="nav-link"
                            :to="{name: 'articles'}"
                            active-class="active"
                        >
                            Каталог статей
                        </router-link>
                    </li>
                </ul>
            </div>
        </nav>
        <hr>
        <div>
            <div class="row">
                <div class="col-md-10 offset-md-1">
                    <router-view></router-view>
                </div>
            </div>
        </div>
    </div>
</template>
