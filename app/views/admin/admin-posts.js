module.exports = {

  name: 'PostsList',

  el: '#posts',

  data:function(){
    return _.merge({
      config:{
        filter:this.$session.get('posts.filter' , {
          order:'date desc',
          status:null,
          search:'',
        }),
        page:0,
      }
    }, window.$data);
  }

}

Vue.ready(module.exports);
