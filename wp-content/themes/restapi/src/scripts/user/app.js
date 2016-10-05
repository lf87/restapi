// Strict Mode is a new feature in ECMAScript 5 that allows you to place a program, or a function, in a "strict" operating context.
// This strict context prevents certain actions from being taken and throws more exceptions.
// And:

// Strict mode helps out in a couple ways:

// It catches some common coding bloopers, throwing exceptions.
// It prevents, or throws errors, when relatively "unsafe" actions are taken (such as gaining access to the global object).
// It disables features that are confusing or poorly thought out.

// When the below is set to true, the comment below enables use strict globally

/*jshint strict: false */

(function() {
    'use strict';

    var App = Vue.extend({});
    var postList = Vue.extend({
        template: '#post-list-template',
        data: function() {
        	return {
        		posts: '',
                nameFilter: ''
        	};
        },
        ready: function() {
        	var posts = this.$resource('/wp-json/wp/v2/posts?per_page=20');
        	posts.get(function(posts) {
        		this.$set('posts', posts);
        	});
        }
    });

    var router = new VueRouter();

    router.map({
        '/': {
            component: postList
        }
    });

    router.start(App, '#app');

}());