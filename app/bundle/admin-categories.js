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
/***/ (function(module, exports) {

	module.exports = {

	  name: 'Categories',

	  el: '#categories',

	  data:function()
	  {
	    return _.merge({
	      config:{
	        filter:this.$session.get('categories.filter' , {
	          order:'date desc',
	          status:null,
	          search:'',
	        }),
	        page:0,
	        selected:[],
	      }
	    }, window.$data)
	  },

	  ready:function()
	  {
	    this.resource = this.$resource('admin/apidpnblog/category{/id}');
	    this.$watch('config.page' , this.load , {immediate:true})
	  },

	  watch:{
	    'config.filter': {
	      handler: function(){
	        if (this.config.page) {
	          this.config.page = 0;
	        }else {
	          this.load();
	        }
	      },
	      deep:true
	    }
	  },

	  methods:{
	    load:function(){
	      this.resource.query({filter:this.config.filter , page:this.config.page}).then(res => {

	        var data = res.data
	        this.$set('categories' ,  data.categories);
	        this.$set('pages' , data.pages);
	        this.$set('count' , data.count)

	      })
	    }
	  }

	}

	Vue.ready(module.exports);


/***/ })
/******/ ]);