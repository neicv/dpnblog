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

}

Vue.ready(module.exports);
