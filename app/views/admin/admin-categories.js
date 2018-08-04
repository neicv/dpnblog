module.exports = {

  name: 'Categories',

  el: '#categories',

  data:function()
  {
    return _.merge({
      config:{
        filter:{
          date:'desc',
          status:null,
          search:'',
        },
        page:0,
        selected:[],
      }
    }, window.$data)
  },

  ready:function()
  {
    
  }


}

Vue.ready(module.exports);
