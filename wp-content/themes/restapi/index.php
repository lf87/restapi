<?php get_header(); ?>
<main class="main-container">
    <div id="app">
        <router-view></router-view>
    </div>
</main>
<template id="post-list-template">
    <div class="container filter">
        <h4 class="medium-heading">Filter by Name</h4>
        <input type="text" placeholder="Enter search term" name="" v-model="nameFilter">
    </div>
    <div class="container post-list">
        <article v-for="post in posts | filterBy nameFilter in 'title'" class="post">
            <img v-bind:src="post.fi_300xx180" alt="">
            <div class="post-content">
                <h2 class="small-heading">{{ post.title.rendered }}</h2>
                <span class="bubbles">
                    <span class="bubble" v-for="category in post.cats">
                        {{ category.name }}
                    </span>
                </span>
            </div>
        </article>
    </div>
</template>
<?php get_footer(); ?>
