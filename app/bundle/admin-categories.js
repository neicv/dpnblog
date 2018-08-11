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
	      },
	      categoryForm:'',
	      selected: [],
	    }, window.$data)
	  },

	  ready:function()
	  {
	    this.resource = this.$resource('admin/apidpnblog/category{/id}');
	    this.$watch('config.page' , this.load , {immediate:true});
	  },

	  filters:{

	    lengthMeta:function(val )
	    {
	      if ( val.length > 70 ) {
	        return '<span class="uk-badge uk-badge-notification uk-badge-danger">Too Much ('+val.length+')</span>';
	      }else if (val.length >= 50 &&  val.length <= 70 ) {
	        return '<span class="uk-badge uk-badge-notification uk-badge-success">Good ('+val.length+')</span>';
	      }else if ( val.length >= 20 &&  val.length <= 49 ) {
	        return '<span class="uk-badge uk-badge-notification uk-badge-warning">Almost ('+val.length+')</span>';
	      }else{
	        return '<span class="uk-badge uk-badge-notification uk-badge-danger">Too Bad ('+val.length+')</span>';
	      }
	    },

	    lengthDesc:function(val)
	    {
	      if ( val.length > 160 ) {
	        return '<span class="uk-badge uk-badge-notification uk-badge-danger">Too Much ('+val.length+')</span>';
	      }else if (val.length >= 120 &&  val.length <= 160) {
	        return '<span class="uk-badge uk-badge-notification uk-badge-success">Good ('+val.length+')</span>';
	      }else if ( val.length >= 60 &&  val.length <= 119 ) {
	        return '<span class="uk-badge uk-badge-notification uk-badge-warning">Almost ('+val.length+')</span>';
	      }else{
	        return '<span class="uk-badge uk-badge-notification uk-badge-danger">Too Bad ('+val.length+')</span>';
	      }
	    }

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
	    load:function()
	    {
	      this.resource.query({filter:this.config.filter , page:this.config.page}).then(res => {
	        var data = res.data
	        this.$set('categories' ,  data.categories);
	        this.$set('pages' , data.pages);
	        this.$set('count' , data.count)
	      })
	    },

	    editCategory:function(categoryId)
	    {
	      var modal = UIkit.modal("#categoryEdit");
	      if ( !modal.isActive() ) {
	        modal.show();
	        this.categoryForm = '';
	      }
	      this.resource.query( {id:"get"} , {ids:categoryId} ).then( res => {
	        if (res.data.status == 200) {
	          this.categoryForm = res.data.data
	        }
	      });
	    },

	    save:function()
	    {
	      this.resource.save( {id:"save"} , {data:this.categoryForm , ids:this.categoryForm.id} ).then(res => {
	        if (res.data.status == 200) {
	          var modal = UIkit.modal("#categoryEdit");
	          if ( modal.isActive() ) {
	            modal.hide();
	          }
	          this.categoryForm = '';
	          UIkit.notify(res.data.msg);
	          this.load();
	        }
	      })
	    },

	    status:function(value , change)
	    {
	      this.resource.update( {id:"change"} , {ids:value , status:change} ).then(res => {
	        if (res.data.status == 200) {
	          this.load();
	        }
	      })
	    },

	    allChange:function(val)
	    {
	      this.resource.update({id:"allchange"} , {data:this.selected , status:val}).then( res => {
	        if (res.data.status == 200) {
	          this.selected = [];
	          this.load();
	        }
	      })
	    },

	    remove:function()
	    {
	      this.resource.delete({id:"draft"} , {data:this.selected}).then( res => {
	        if (res.data.status == 200) {
	          this.selected = [];
	          this.load();
	        }
	      })
	    }

	  }

	}

	Vue.ready(module.exports);


/***/ }
/******/ ]);