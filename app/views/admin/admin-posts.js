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

    ready:function(){
        this.resource = this.$resource('admin/apidpnblog/post/{id}');
        this.$watch('config.page', this.load, {immediate: true});
    },

    watch:{
        'config.filter':{
            handler:function(filter){
                if (this.config.page) {
                    this.config.page = 0;
                } else {
                    this.load();
                }
                this.$session.set('posts.filter', filter);
            },
            deep:true
        }
    },

    methods:{
        load:function(){
            this.resource.query({ id: 'posts' } , { filter: this.config.filter, page: this.config.page }).then(function (res) {
                var data = res.data;
                this.$set('posts', data.posts);
                this.$set('pages', data.pages);
                this.$set('count', data.count);
                this.$set('selected', []);
            });
        }
    }

}

Vue.ready(module.exports);
