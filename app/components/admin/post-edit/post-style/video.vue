<template lang="html">
    <a class="uk-placeholder uk-text-center uk-display-block uk-margin-remove" v-if="!post.data.video" @click.prevent="pick">
        <img width="60" height="60" :alt="'Placeholder Video' | trans" :src="$url('app/system/assets/images/placeholder-video.svg')">
        <p class="uk-text-muted uk-margin-small-top">{{ 'Add Video'| trans }}</p>
    </a>
    <v-modal v-ref:modal>
       <form class="uk-form uk-form-stacked" @submit="update">

           <div class="uk-modal-header">
               <h2 class="uk-text-capitalize">{{ type | trans }}</h2>
           </div>

           <div class="uk-form-row">
               <input-video :source.sync="source"></input-video>
           </div>

           <div class="uk-form-row">
               <label for="form-src" class="uk-form-label">{{ 'URL' | trans }}</label>
               <div class="uk-form-controls">
                   <input class="uk-width-1-1" type="text" v-model="source" lazy>
               </div>
           </div>

           <div class="uk-modal-footer uk-text-right">
               <button class="uk-button uk-button-link uk-modal-close" type="button">{{ 'Cancel' | trans }}</button>
               <button class="uk-button uk-button-link" type="button" @click.prevent="update">{{ 'Update' | trans }}</button>
           </div>

       </form>
   </v-modal>
</template>

<script>
export default {
    props:['post'],
    data: function () {
        return _.merge({source: ''}, $pagekit);
    },
    methods:{
        pick:function(){
            this.source = this.post.data.video;
            this.$refs.modal.open();
        },
        update: function () {
            this.post.data.video = this.source;
            this.$refs.modal.close();
        },
        remove: function () {
            this.source = '';
            this.post.data.video = '';
        }
    }
}
</script>
