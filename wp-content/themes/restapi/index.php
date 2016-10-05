<?php get_header(); ?>
<main class="main-container">
    <div id="app">
        <router-view></router-view>
    </div>
</main>
<template id="post-list-template">
    <div class="container">
        <section class="post-list">
            <article v-for="post in posts" class="post">
                <img v-bind:src="post.fi_300xx180" alt="">
                <div class="post-content">
                    <h2 class="medium-heading">{{ post.title.rendered }}</h2>
                </div>
            </article>
        </section>
    </div>
</template>
<?php get_footer(); ?>
