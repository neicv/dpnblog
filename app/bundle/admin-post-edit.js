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
/***/ function(module, exports, __webpack_require__) {

	window.Post = {
	    name: 'PostEdit',

	    el:'#post',

	    data:function(){
	        return _.merge({
	            sections: [],
	        } , window.$data);
	    },

	    created: function () {

	        var sections = [];

	        _.forIn(this.$options.components, function (component, name) {

	            var options = component.options || {};

	            if (options.section) {
	                sections.push(_.extend({name: name, priority: 0}, options.section));
	            }

	        });

	        this.$set('sections', _.sortBy(sections, 'priority'));

	    },

	    ready:function(){
	        this.resource = this.$resource('admin/apidpnblog/post{/id}');
	        this.tab = UIkit.tab(this.$els.tab, {connect: this.$els.content});
	    },

	    components: {
	        settings: __webpack_require__(1),
	        meta: __webpack_require__(13),
	    }

	}

	Vue.ready(window.Post);


/***/ },
/* 1 */
/***/ function(module, exports, __webpack_require__) {

	var __vue_script__, __vue_template__
	var __vue_styles__ = {}
	__vue_script__ = __webpack_require__(2)
	if (Object.keys(__vue_script__).some(function (key) { return key !== "default" && key !== "__esModule" })) {
	  console.warn("[vue-loader] app/components/admin/post-edit/settings.vue: named exports in *.vue files are ignored.")}
	__vue_template__ = __webpack_require__(12)
	module.exports = __vue_script__ || {}
	if (module.exports.__esModule) module.exports = module.exports.default
	var __vue_options__ = typeof module.exports === "function" ? (module.exports.options || (module.exports.options = {})) : module.exports
	if (__vue_template__) {
	__vue_options__.template = __vue_template__
	}
	if (!__vue_options__.computed) __vue_options__.computed = {}
	Object.keys(__vue_styles__).forEach(function (key) {
	var module = __vue_styles__[key]
	__vue_options__.computed[key] = function () { return module }
	})
	if (false) {(function () {  module.hot.accept()
	  var hotAPI = require("vue-hot-reload-api")
	  hotAPI.install(require("vue"), false)
	  if (!hotAPI.compatible) return
	  var id = "_v-3b0b969a/settings.vue"
	  if (!module.hot.data) {
	    hotAPI.createRecord(id, module.exports)
	  } else {
	    hotAPI.update(id, module.exports, __vue_template__)
	  }
	})()}

/***/ },
/* 2 */
/***/ function(module, exports, __webpack_require__) {

	'use strict';

	Object.defineProperty(exports, "__esModule", {
	    value: true
	});
	exports.default = {

	    props: ['post', 'data', 'form'],

	    section: {
	        label: 'Post',
	        priority: 0
	    },

	    data: function data() {
	        return {
	            categories: ''
	        };
	    },

	    ready: function ready() {
	        this.getCategories();
	    },

	    methods: {
	        getCategories: function getCategories() {
	            var _this = this;

	            this.$http.get('admin/apidpnblog/post/get-categories').then(function (res) {
	                if (res.data.status == 200) {
	                    _this.categories = res.data.data;
	                    UIkit.notify(res.data.msg, 'primary');
	                } else {
	                    UIkit.notify(res.data.msg);
	                }
	            });
	        }
	    },

	    components: {
	        blogImage: __webpack_require__(3),
	        blogVideo: __webpack_require__(6),
	        blogTags: __webpack_require__(9)
	    }

	};

/***/ },
/* 3 */
/***/ function(module, exports, __webpack_require__) {

	var __vue_script__, __vue_template__
	var __vue_styles__ = {}
	__vue_script__ = __webpack_require__(4)
	if (Object.keys(__vue_script__).some(function (key) { return key !== "default" && key !== "__esModule" })) {
	  console.warn("[vue-loader] app/components/admin/post-edit/post-style/image.vue: named exports in *.vue files are ignored.")}
	__vue_template__ = __webpack_require__(5)
	module.exports = __vue_script__ || {}
	if (module.exports.__esModule) module.exports = module.exports.default
	var __vue_options__ = typeof module.exports === "function" ? (module.exports.options || (module.exports.options = {})) : module.exports
	if (__vue_template__) {
	__vue_options__.template = __vue_template__
	}
	if (!__vue_options__.computed) __vue_options__.computed = {}
	Object.keys(__vue_styles__).forEach(function (key) {
	var module = __vue_styles__[key]
	__vue_options__.computed[key] = function () { return module }
	})
	if (false) {(function () {  module.hot.accept()
	  var hotAPI = require("vue-hot-reload-api")
	  hotAPI.install(require("vue"), false)
	  if (!hotAPI.compatible) return
	  var id = "_v-4437eac7/image.vue"
	  if (!module.hot.data) {
	    hotAPI.createRecord(id, module.exports)
	  } else {
	    hotAPI.update(id, module.exports, __vue_template__)
	  }
	})()}

/***/ },
/* 4 */
/***/ function(module, exports) {

	'use strict';

	Object.defineProperty(exports, "__esModule", {
	    value: true
	});
	exports.default = {
	    props: ['post']
	};

/***/ },
/* 5 */
/***/ function(module, exports) {

	module.exports = "\n<input-image-meta :image.sync=\"post.data.image\" class=\"pk-image-max-height\"></input-image-meta>\n";

/***/ },
/* 6 */
/***/ function(module, exports, __webpack_require__) {

	var __vue_script__, __vue_template__
	var __vue_styles__ = {}
	__vue_script__ = __webpack_require__(7)
	if (Object.keys(__vue_script__).some(function (key) { return key !== "default" && key !== "__esModule" })) {
	  console.warn("[vue-loader] app/components/admin/post-edit/post-style/video.vue: named exports in *.vue files are ignored.")}
	__vue_template__ = __webpack_require__(8)
	module.exports = __vue_script__ || {}
	if (module.exports.__esModule) module.exports = module.exports.default
	var __vue_options__ = typeof module.exports === "function" ? (module.exports.options || (module.exports.options = {})) : module.exports
	if (__vue_template__) {
	__vue_options__.template = __vue_template__
	}
	if (!__vue_options__.computed) __vue_options__.computed = {}
	Object.keys(__vue_styles__).forEach(function (key) {
	var module = __vue_styles__[key]
	__vue_options__.computed[key] = function () { return module }
	})
	if (false) {(function () {  module.hot.accept()
	  var hotAPI = require("vue-hot-reload-api")
	  hotAPI.install(require("vue"), false)
	  if (!hotAPI.compatible) return
	  var id = "_v-6ffa7432/video.vue"
	  if (!module.hot.data) {
	    hotAPI.createRecord(id, module.exports)
	  } else {
	    hotAPI.update(id, module.exports, __vue_template__)
	  }
	})()}

/***/ },
/* 7 */
/***/ function(module, exports) {

	'use strict';

	Object.defineProperty(exports, "__esModule", {
	    value: true
	});
	exports.default = {
	    props: ['post'],
	    data: function data() {
	        return _.merge({ source: '' }, $pagekit);
	    },
	    methods: {
	        pick: function pick() {
	            this.source = this.post.data.video;
	            this.$refs.modal.open();
	        },
	        update: function update() {
	            this.post.data.video = this.source;
	            this.$refs.modal.close();
	        },
	        remove: function remove() {
	            this.source = '';
	            this.post.data.video = '';
	        }
	    }
	};

/***/ },
/* 8 */
/***/ function(module, exports) {

	module.exports = "\n <a class=\"uk-placeholder uk-text-center uk-display-block uk-margin-remove\" v-if=\"!post.data.video\" @click.prevent=\"pick\">\n     <img width=\"60\" height=\"60\" :alt=\"'Placeholder Video' | trans\" :src=\"$url('app/system/assets/images/placeholder-video.svg')\">\n     <p class=\"uk-text-muted uk-margin-small-top\">{{ 'Add Video'| trans }}</p>\n </a>\n <v-modal v-ref:modal>\n    <form class=\"uk-form uk-form-stacked\" @submit=\"update\">\n\n        <div class=\"uk-modal-header\">\n            <h2 class=\"uk-text-capitalize\">{{ type | trans }}</h2>\n        </div>\n\n        <div class=\"uk-form-row\">\n            <input-video :source.sync=\"source\"></input-video>\n        </div>\n\n        <div class=\"uk-form-row\">\n            <label for=\"form-src\" class=\"uk-form-label\">{{ 'URL' | trans }}</label>\n            <div class=\"uk-form-controls\">\n                <input class=\"uk-width-1-1\" type=\"text\" v-model=\"source\" lazy>\n            </div>\n        </div>\n\n        <div class=\"uk-modal-footer uk-text-right\">\n            <button class=\"uk-button uk-button-link uk-modal-close\" type=\"button\">{{ 'Cancel' | trans }}</button>\n            <button class=\"uk-button uk-button-link\" type=\"button\" @click.prevent=\"update\">{{ 'Update' | trans }}</button>\n        </div>\n\n    </form>\n</v-modal>\n";

/***/ },
/* 9 */
/***/ function(module, exports, __webpack_require__) {

	var __vue_script__, __vue_template__
	var __vue_styles__ = {}
	__vue_script__ = __webpack_require__(10)
	if (Object.keys(__vue_script__).some(function (key) { return key !== "default" && key !== "__esModule" })) {
	  console.warn("[vue-loader] app/components/admin/post-edit/others/tags.vue: named exports in *.vue files are ignored.")}
	__vue_template__ = __webpack_require__(11)
	module.exports = __vue_script__ || {}
	if (module.exports.__esModule) module.exports = module.exports.default
	var __vue_options__ = typeof module.exports === "function" ? (module.exports.options || (module.exports.options = {})) : module.exports
	if (__vue_template__) {
	__vue_options__.template = __vue_template__
	}
	if (!__vue_options__.computed) __vue_options__.computed = {}
	Object.keys(__vue_styles__).forEach(function (key) {
	var module = __vue_styles__[key]
	__vue_options__.computed[key] = function () { return module }
	})
	if (false) {(function () {  module.hot.accept()
	  var hotAPI = require("vue-hot-reload-api")
	  hotAPI.install(require("vue"), false)
	  if (!hotAPI.compatible) return
	  var id = "_v-71fa24c4/tags.vue"
	  if (!module.hot.data) {
	    hotAPI.createRecord(id, module.exports)
	  } else {
	    hotAPI.update(id, module.exports, __vue_template__)
	  }
	})()}

/***/ },
/* 10 */
/***/ function(module, exports) {

	'use strict';

	Object.defineProperty(exports, "__esModule", {
	    value: true
	});
	exports.default = {
	    props: ['tags']

	};

/***/ },
/* 11 */
/***/ function(module, exports) {

	module.exports = "\n<div class=\"uk-text-small uk-margin-small\">\n    <span class=\"uk-badge uk-badge-success\">Hello World</span>\n</div>\n";

/***/ },
/* 12 */
/***/ function(module, exports) {

	module.exports = "\n\n<div class=\"uk-grid pk-grid-large\" data-uk-grid-margin>\n\n    <div class=\"uk-form pk-width-content uk-grid-margin\">\n\n        <div class=\"uk-form-row\">\n            <div class=\"uk-form-controls\">\n                <input type=\"text\" class=\"uk-form-large uk-width-1-1\" :placeholder=\"'Title' | trans\" v-model=\"post.title\">\n            </div>\n        </div>\n\n        <div class=\"uk-form-row\">\n            <label class=\"uk-form-label\">{{'Content' | trans}}</label>\n            <div class=\"uk-form-controls\">\n                <v-editor id=\"post-content\" :value.sync=\"post.content\" :options=\"{markdown : post.data.markdown}\"></v-editor>\n            </div>\n        </div>\n\n        <div class=\"uk-form-row\">\n            <label class=\"uk-form-label\">{{'Excerpt' | trans}}</label>\n            <div class=\"uk-form-controls\">\n                <v-editor id=\"post-content\" :value.sync=\"post.excerpt\" :options=\"{markdown : post.data.markdown , height:200}\"></v-editor>\n            </div>\n        </div>\n\n    </div>\n\n    <div class=\"pk-width-sidebar\">\n\n        <div class=\"uk-panel uk-panel-box uk-panel-box-muted\">\n            <div class=\"uk-panel-title\">\n                <h3>{{'Post Style' | trans}}</h3>\n            </div>\n            <div class=\"uk-form-row\">\n                <div class=\"uk-form-controls\">\n                    <p class=\"uk-margin-small\">\n                        <label><input type=\"radio\" v-model=\"post.post_style\" value=\"0\"> <i class=\"uk-icon-file\"></i> {{'Default' | trans}}</label>\n                    </p>\n                    <p class=\"uk-margin-small\">\n                        <label><input type=\"radio\" v-model=\"post.post_style\" value=\"1\"> <i class=\"uk-icon-youtube-play\"></i> {{'Video' | trans}}</label>\n                    </p>\n                    <p class=\"uk-margin-small\">\n                        <label><input type=\"radio\" v-model=\"post.post_style\" value=\"2\"> <i class=\"uk-icon-list-alt\"></i> {{'Article' | trans}}</label>\n                    </p>\n                    <p class=\"uk-margin-small\">\n                        <label><input type=\"radio\" v-model=\"post.post_style\" value=\"3\"> <i class=\"uk-icon-image\"></i> {{'Gallery' | trans}}</label>\n                    </p>\n                    <p class=\"uk-margin-small\">\n                        <label><input type=\"radio\" v-model=\"post.post_style\" value=\"4\"> <i class=\"uk-icon-mortar-board\"></i> {{'Document' | trans}}</label>\n                    </p>\n                </div>\n            </div>\n        </div>\n\n        <div class=\"uk-margin\">\n            <blog-image :post.sync=\"post\" v-if=\"\n            post.post_style == 0 ||\n            post.post_style == 2 ||\n            post.post_style == 4\n            \"></blog-image>\n        </div>\n\n        <div class=\"uk-margin\">\n            <blog-video :post.sync=\"post\" v-if=\"post.post_style == 1\"></blog-video>\n        </div>\n\n        <div class=\"uk-form-row\">\n            <label for=\"form-slug\" class=\"uk-form-label\">{{ 'Slug' | trans }}</label>\n            <div class=\"uk-form-controls\">\n                <input id=\"form-slug\" class=\"uk-width-1-1\" type=\"text\" v-model=\"post.slug\">\n            </div>\n        </div>\n\n        <div class=\"uk-form-row\">\n            <label class=\"uk-form-label\">{{ 'Categories' | trans}}</label>\n            <div class=\"uk-form-controls\">\n                <select class=\"uk-width-1-1\" v-model=\"post.category_id\">\n                    <option v-for=\"category in categories\" v-bind:value=\"category.id\">\n                        {{category.title}}\n                    </option>\n                </select>\n            </div>\n        </div>\n\n        <div class=\"uk-form-row\">\n            <label class=\"uk-form-label\">{{'Tags' | trans}}</label>\n            <blog-tags :tags=\"post.tags\"></blog-tags>\n        </div>\n\n        <div class=\"uk-form-row\">\n            <label for=\"form-status\" class=\"uk-form-label\">{{ 'Status' | trans }}</label>\n            <div class=\"uk-form-controls\">\n                <select id=\"form-status\" class=\"uk-width-1-1\" v-model=\"post.status\">\n                    <option v-for=\"(id, status) in data.statuses\" :value=\"id\">{{status}}</option>\n                </select>\n            </div>\n        </div>\n\n        <div class=\"uk-form-row\">\n            <label for=\"form-author\" class=\"uk-form-label\">{{ 'Author' | trans }}</label>\n            <div class=\"uk-form-controls\">\n                <select id=\"form-author\" class=\"uk-width-1-1\" v-model=\"post.user_id\">\n                    <option v-for=\"author in data.authors\" :value=\"author.id\">{{author.username}}</option>\n                </select>\n            </div>\n        </div>\n\n        <div class=\"uk-form-row\">\n            <span class=\"uk-form-label\">{{ 'Publish on' | trans }}</span>\n            <div class=\"uk-form-controls\">\n                <input-date :datetime.sync=\"post.date\"></input-date>\n            </div>\n        </div>\n\n        <div class=\"uk-form-row\">\n            <span class=\"uk-form-label\">{{ 'Restrict Access' | trans }}</span>\n            <div class=\"uk-form-controls uk-form-controls-text\">\n                <p v-for=\"role in data.roles\" class=\"uk-form-controls-condensed\">\n                    <label><input type=\"checkbox\" :value=\"role.id\" v-model=\"post.roles\" number> {{ role.name }}</label>\n                </p>\n            </div>\n        </div>\n        <div class=\"uk-form-row\">\n            <span class=\"uk-form-label\">{{ 'Options' | trans }}</span>\n            <div class=\"uk-form-controls\">\n                <label><input type=\"checkbox\" v-model=\"post.data.markdown\" value=\"1\"> {{ 'Enable Markdown' | trans }}</label>\n            </div>\n            <div class=\"uk-form-controls\">\n                <label><input type=\"checkbox\" v-model=\"post.comment_status\" value=\"1\"> {{ 'Enable Comments' | trans }}</label>\n            </div>\n        </div>\n\n    </div>\n\n</div>\n\n";

/***/ },
/* 13 */
/***/ function(module, exports, __webpack_require__) {

	var __vue_script__, __vue_template__
	var __vue_styles__ = {}
	__vue_script__ = __webpack_require__(14)
	if (Object.keys(__vue_script__).some(function (key) { return key !== "default" && key !== "__esModule" })) {
	  console.warn("[vue-loader] app/components/admin/post-edit/meta.vue: named exports in *.vue files are ignored.")}
	__vue_template__ = __webpack_require__(15)
	module.exports = __vue_script__ || {}
	if (module.exports.__esModule) module.exports = module.exports.default
	var __vue_options__ = typeof module.exports === "function" ? (module.exports.options || (module.exports.options = {})) : module.exports
	if (__vue_template__) {
	__vue_options__.template = __vue_template__
	}
	if (!__vue_options__.computed) __vue_options__.computed = {}
	Object.keys(__vue_styles__).forEach(function (key) {
	var module = __vue_styles__[key]
	__vue_options__.computed[key] = function () { return module }
	})
	if (false) {(function () {  module.hot.accept()
	  var hotAPI = require("vue-hot-reload-api")
	  hotAPI.install(require("vue"), false)
	  if (!hotAPI.compatible) return
	  var id = "_v-150db6fc/meta.vue"
	  if (!module.hot.data) {
	    hotAPI.createRecord(id, module.exports)
	  } else {
	    hotAPI.update(id, module.exports, __vue_template__)
	  }
	})()}

/***/ },
/* 14 */
/***/ function(module, exports) {

	'use strict';

	Object.defineProperty(exports, "__esModule", {
	    value: true
	});
	exports.default = {

	    props: ['post', 'data', 'form'],

	    section: {
	        label: 'Meta',
	        priority: 100
	    }

	};

/***/ },
/* 15 */
/***/ function(module, exports) {

	module.exports = "\n<div class=\"uk-form-horizontal\">\n\n    <div class=\"uk-form-row\">\n        <label for=\"form-meta-title\" class=\"uk-form-label\">{{ 'Title' | trans }}</label>\n        <div class=\"uk-form-controls\">\n            <input id=\"form-meta-title\" class=\"uk-form-width-large\" type=\"text\" v-model=\"post.data.meta['og:title']\">\n        </div>\n    </div>\n\n    <div class=\"uk-form-row\">\n        <label for=\"form-meta-description\" class=\"uk-form-label\">{{ 'Description' | trans }}</label>\n        <div class=\"uk-form-controls\">\n            <textarea id=\"form-meta-description\" class=\"uk-form-width-large\" rows=\"5\" type=\"text\" v-model=\"post.data.meta['og:description']\"></textarea>\n        </div>\n    </div>\n\n</div>\n";

/***/ }
/******/ ]);