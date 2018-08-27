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

    methods:{
        save:function(){
            this.$http.post('admin/apidpnblog/post/save' , {data:this.data.post , id:this.data.post.id}).then(res => {
                console.log(res.data);
            } , err => {
                console.log(res.data);
            })
        }
    },

    components: {
        settings: require('../../components/admin/post-edit/settings.vue'),
        meta: require('../../components/admin/post-edit/meta.vue'),
    }
}

Vue.ready(window.Post);
