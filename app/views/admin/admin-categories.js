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
