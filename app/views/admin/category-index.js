module.exports = {
    name: 'category',

    el  : '#category',

    data:   {
        categorys:  window.$data.category,
        cat: {title:'' , slug: '' , sub_category: '' },
    },

    methods: {
      addCategory: function(event){
        event.preventDefault();

        this.$http.post('admin/api/dpnblog/post/categoryadd' , {category:this.cat}, function(){
          UIkit.notify('Saved', '');
        }).catch(function(data){
          UIkit.notify(data, 'danger');
        })
        this.cat = {title:'' , slug: '' , sub_category: '' };
      }
    }
};

var vm = Vue.ready(module.exports);
