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
	        meta: __webpack_require__(10),
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
	__vue_template__ = __webpack_require__(9)
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

	    components: {
	        inputImage: __webpack_require__(3),
	        video: __webpack_require__(6)
	    }

	};

/***/ },
/* 3 */
/***/ function(module, exports, __webpack_require__) {

	var __vue_script__, __vue_template__
	var __vue_styles__ = {}
	__vue_script__ = __webpack_require__(4)
	if (Object.keys(__vue_script__).some(function (key) { return key !== "default" && key !== "__esModule" })) {
	  console.warn("[vue-loader] app/components/admin/post-edit/post-style/input-image.vue: named exports in *.vue files are ignored.")}
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
	  var id = "_v-90763cf8/input-image.vue"
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
	  console.warn("[vue-loader] app/components/admin/post-edit/post-style/input-video.vue: named exports in *.vue files are ignored.")}
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
	  var id = "_v-3b8fbca4/input-video.vue"
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
	    props: ['post']
	};

/***/ },
/* 8 */
/***/ function(module, exports) {

	module.exports = "\n<input-video :source.sync=\"source\"></input-video>\n";

/***/ },
/* 9 */
/***/ function(module, exports) {

	module.exports = "\n\n<div class=\"uk-grid pk-grid-large\" data-uk-grid-margin>\n\n    <div class=\"uk-form pk-width-content uk-grid-margin\">\n\n        <div class=\"uk-form-row\">\n            <div class=\"uk-form-controls\">\n                <input type=\"text\" class=\"uk-form-large uk-width-1-1\" :placeholder=\"'Title' | trans\" v-model=\"post.title\">\n            </div>\n        </div>\n\n        <div class=\"uk-form-row\">\n            <label class=\"uk-form-label\">{{'Content' | trans}}</label>\n            <div class=\"uk-form-controls\">\n                <v-editor id=\"post-content\" :value.sync=\"post.content\" :options=\"{markdown : post.data.markdown}\"></v-editor>\n            </div>\n        </div>\n\n        <div class=\"uk-form-row\">\n            <label class=\"uk-form-label\">{{'Excerpt' | trans}}</label>\n            <div class=\"uk-form-controls\">\n                <v-editor id=\"post-content\" :value.sync=\"post.excerpt\" :options=\"{markdown : post.data.markdown , height:200}\"></v-editor>\n            </div>\n        </div>\n\n    </div>\n\n    <div class=\"pk-width-sidebar\">\n\n        <div class=\"uk-panel uk-panel-box uk-panel-box-muted\">\n            <div class=\"uk-panel-title\">\n                <h3>{{'Post Style' | trans}}</h3>\n            </div>\n            <div class=\"uk-form-row\">\n                <div class=\"uk-form-controls\">\n                    <p class=\"uk-margin-small\">\n                        <label><input type=\"radio\" v-model=\"post.post_style\" value=\"0\"> <i class=\"uk-icon-file\"></i> {{'Default' | trans}}</label>\n                    </p>\n                    <p class=\"uk-margin-small\">\n                        <label><input type=\"radio\" v-model=\"post.post_style\" value=\"1\"> <i class=\"uk-icon-youtube-play\"></i> {{'Video' | trans}}</label>\n                    </p>\n                    <p class=\"uk-margin-small\">\n                        <label><input type=\"radio\" v-model=\"post.post_style\" value=\"2\"> <i class=\"uk-icon-list-alt\"></i> {{'Article' | trans}}</label>\n                    </p>\n                    <p class=\"uk-margin-small\">\n                        <label><input type=\"radio\" v-model=\"post.post_style\" value=\"3\"> <i class=\"uk-icon-image\"></i> {{'Gallery' | trans}}</label>\n                    </p>\n                    <p class=\"uk-margin-small\">\n                        <label><input type=\"radio\" v-model=\"post.post_style\" value=\"4\"> <i class=\"uk-icon-mortar-board\"></i> {{'Document' | trans}}</label>\n                    </p>\n                </div>\n            </div>\n        </div>\n\n        <div class=\"uk-margin\">\n            <input-image :post.sync=\"post\" v-if=\"\n            post.post_style == 0 ||\n            post.post_style == 2 ||\n            post.post_style == 4\n            \"></input-image>\n        </div>\n\n        <div class=\"uk-margin\">\n            <video :post.sync=\"post\" v-if=\"post.post_style == 1\"></video>\n        </div>\n\n    </div>\n\n</div>\n\n";

/***/ },
/* 10 */
/***/ function(module, exports, __webpack_require__) {

	var __vue_script__, __vue_template__
	var __vue_styles__ = {}
	__vue_script__ = __webpack_require__(11)
	if (Object.keys(__vue_script__).some(function (key) { return key !== "default" && key !== "__esModule" })) {
	  console.warn("[vue-loader] app/components/admin/post-edit/meta.vue: named exports in *.vue files are ignored.")}
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
	  var id = "_v-150db6fc/meta.vue"
	  if (!module.hot.data) {
	    hotAPI.createRecord(id, module.exports)
	  } else {
	    hotAPI.update(id, module.exports, __vue_template__)
	  }
	})()}

/***/ },
/* 11 */
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
/* 12 */
/***/ function(module, exports) {

	module.exports = "\n\nHello Vue js\n\n";

/***/ }
/******/ ]);