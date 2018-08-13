<template lang="html">
    <div class="uk-text-small uk-margin-small">
        <p v-if="tags">
            <span class="uk-badge uk-badge-success">Hello World</span>
        </p>
        <p class="uk-text-large uk-text-center" v-else>
            {{'Not Found Tags' | trans}}
        </p>
        <div class="uk-form-controls uk-flex">
            <input type="text" class="uk-width-1-1" v-model="newTags" :placeholder="'Add A New Tag' | trans">
            <button class="uk-button uk-button-primary" @click="addTags">{{'Add' | trans}}</button>
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
            this.$http.get('admin/apidpnblog/tags/').then(res => {
                if (res.data.data == 200) {

                }else if (res.data.data === 400) {
                    UIkit.notify(res.data.msg , 'danger');
                }
            })
        }
    }
}
</script>
