module.exports = {

  name: 'Categories',

  el: '#categories',

  data:function()
  {
    return _.merge({

    }, window.$data)
  },


}

Vue.ready(module.exports);
