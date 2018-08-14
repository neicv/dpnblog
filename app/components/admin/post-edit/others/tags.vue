<template lang="html">
    <div class="uk-text-small uk-margin-small">
        <p v-if="tags" class="tm-tags-padding">
            <span v-for="tag in tags" v-on:click="postTags(tag.id)" v-bind:class="tag.id | checkedTag">{{tag.tags}}</span>
        </p>
        <p class="uk-text-large uk-text-center" v-else>
            {{'Not Found Tags' | trans}}
        </p>
        <div class="uk-form-controls uk-flex">
            <input type="text" class="uk-width-1-1" v-model="newTags" :placeholder="'Add A New Tag' | trans">
            <button class="uk-button uk-button-primary" type="button" v-on:click="addTags">{{'Add' | trans}}</button>
        </div>
    </div>
</template>

<script>
export default {
    props:['post'],

    data:function(){
        return {
            tags:'',
            newTags:''
        }
    },

    ready:function(){
        this.getTags();
    },

    filters:{
        checkedTag:function(val){
            if (!this.post.length) {
                return 'uk-badge';
            }else {
                for (var i = 0; i < this.post; i++) {
                    if (val == this.post[i]) {
                        return 'uk-badge uk-badge-success';
                    }else {
                        return 'uk-badge';
                    }
                }
            }
        }
    },

    methods:{
        getTags:function(){
            this.$http.get('admin/apidpnblog/tags/gettags').then(res => {
                if (res.data.status == 200) {
                    this.tags = res.data.data;
                    UIkit.notify(res.data.msg , 'primary');
                }else {
                    UIkit.notify(res.data.msg , 'danger');
                }
            })
        },
        addTags:function(){
            this.$http.post('admin/apidpnblog/tags/addtags' , {tags:this.newTags}).then(res => {

                if (res.data.status == 200) {
                    this.newTags = '';
                    //this.post.tags.push(res.data.data.id);
                    this.getTags();
                }else {
                    UIkit.notify(res.data.msg , 'danger');
                }
            });
        },
        postTags:function(val){
            this.post.push(val);
        },
        removeTags:function(val){
            this.post.splice(val , 0);
        }
    }
}
</script>
