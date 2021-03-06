<?php get_header(); ?>
<main class="main-container">
	<div id="app">
		<router-view></router-view>
	</div>
</main> <template id="post-list-template">

    <!-- Overlay //-->
    <div class="overlay" v-if="show"  v-on:click="closePost()" transition="overlay-show"></div>

    <!-- Header //-->
    <header class="container main-header">
        <img src="http://placehold.it/1200x290" alt="">
    </header>

    <!-- Filters //-->
    <div class="filters" v-bind:class="{ 'filter-active': filterActive }">
        <div class="container pad">
            <div class="filter name-filter">
                <h4 class="small-heading">Filter by Name</h4>
                <input type="text" placeholder="Enter search term" name="" v-model="nameFilter">
            </div>
            <div class="filter">
                <h4 class="small-heading">Filter by Category</h4>
                <div class="radio-wrap">
                    <input type="radio" value="" v-model="categoryFilter">
                    <label>All</label>
                </div>
                <div class="radio-wrap" v-for="category in categories" v-if="category.name != 'Uncategorised'">
                    <input type="radio" value="{{ category.id }}" v-model="categoryFilter">
                    <label>{{ category.name }}</label>
                </div>
            </div>
        </div>
    </div>

    <!-- Show Filters Button //-->
    <div class="container pad filter-revealer">
        <a href="#" class="btn orange-btn" v-on:click="filterVisibility" v-bind:class="{ 'filter-active': filterActive }">{{ filterActive ? 'Close Filters' : 'Open Filters' }}</a>
    </div>

    <!-- Posts //-->
    <div class="container post-list">
        <article v-for="post in posts | filterBy nameFilter in 'title' | filterBy categoryFilter in 'categories'" class="post">
            <a v-on:click="getThePost(post.id)">
                <img v-bind:src="post.fi_300xx180" alt="">
            </a>
            <div class="post-content">
                <h2 class="small-heading">{{ post.title.rendered }}</h2>
                <span class="btns">
                    <span class="btn" v-for="category in post.cats">
                        {{ category.name }}
                    </span>
                </span>
            </div>
        </article>
    </div>

    <!-- Preview Panel //-->
    <div class="single-preview" v-if="show" transition="preview-panel">
        <h2>{{ post[0].title.rendered }}</h2>
        <img v-bind:src="post[0].full" alt="">
        {{{ post[0].excerpt.rendered }}}
        <a v-link="{name:'post', params:{postSlug: post[0].slug}}" class="btn orange-btn">Read more</a>
        <a v-on:click="getThePost(post[0].prev_post)" v-if="post[0].prev_post" class="prev"></a>
        <a v-on:click="getThePost(post[0].next_post)" v-if="post[0].next_post" class="next"></a>
        <button class="close" v-on:click="closePost()">&#215;</button>
    </div>
</template> <template id="single-post-template">
    <article class="container single-post">
        <h1 class="large-heading">{{ post[0].title.rendered }}</h1>
        <img class="post-img" v-bind:src="post[0].full">
        <div class="post-content">
            {{{ post[0].content.rendered}}}
        </div>
    </article>
</template>
<?php get_footer(); ?>