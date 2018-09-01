/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};

/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {

/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId])
/******/ 			return installedModules[moduleId].exports;

/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			exports: {},
/******/ 			id: moduleId,
/******/ 			loaded: false
/******/ 		};

/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);

/******/ 		// Flag the module as loaded
/******/ 		module.loaded = true;

/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}


/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;

/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;

/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "";

/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(0);
/******/ })
/************************************************************************/
/******/ ([
/* 0 */
/***/ function(module, exports) {

	module.exports = {
	    name: 'PostsList',
	    el: '#posts',
	    data:function(){
	        return _.merge({
	            posts:false,
	            config:{
	                filter: this.$session.get('posts.filter', {order: 'date desc', limit:25})
	            },
	            count:0,
	            selected:[],
	        }, window.$data)
	    },

	    ready:function(){
	        this.resource = this.$resource('admin/apidpnblog/post/{id}');
	        this.$watch('config.page', this.load, {immediate: true});
	    },

	    watch:{
	        'config.filter':{
	            handler:function(filter){
	                if (this.config.page) {
	                    this.config.page = 0;
	                } else {
	                    this.load();
	                }
	                this.$session.set('posts.filter', filter);
	            },
	            deep:true
	        }
	    },

	    methods:{
	        load:function(){
	            this.resource.query({ id: 'posts' } , { filter: this.config.filter, page: this.config.page }).then(function (res) {
	                var data = res.data;
	                this.$set('posts', data.posts);
	                this.$set('pages', data.pages);
	                this.$set('count', data.count);
	                this.$set('selected', []);
	            });
	        }
	    }

	}

	Vue.ready(module.exports);


/***/ }
/******/ ]);