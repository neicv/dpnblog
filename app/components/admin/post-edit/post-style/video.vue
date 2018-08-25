<template lang="html">
    <a class="uk-placeholder uk-text-center uk-display-block uk-margin-remove" v-if="!post.data.video" @click.prevent="pick">
        <img width="60" height="60" :alt="'Placeholder Video' | trans" :src="$url('app/system/assets/images/placeholder-video.svg')">
        <p class="uk-text-muted uk-margin-small-top">{{ 'Add Video'| trans }}</p>
    </a>
    <v-modal v-ref:modal>
        <form class="uk-form uk-form-stacked" @submit="update">

            <div class="uk-modal-header">
                <h2 class="uk-text-capitalize">{{ 'Video' | trans }}</h2>
            </div>

            <div class="uk-form-row">
                <input-image class="pk-image-max-height"></input-image>
            </div>

            <div class="uk-form-row">
                <a class="uk-placeholder uk-text-center uk-display-block uk-margin-remove" v-if="!post.data.video" @click.prevent="video">
                    <img width="60" height="60" :alt="'Placeholder Video' | trans" :src="$url('app/system/assets/images/placeholder-video.svg')">
                    <p class="uk-text-muted uk-margin-small-top">{{ 'Add Video'| trans }}</p>
                </a>
            </div>

            <v-modal v-ref:modal large>
                <panel-finder :root="storage" :modal="true" v-ref:finder></panel-finder>

                <div class="uk-modal-footer uk-text-right">
                    <button class="uk-button uk-button-link uk-modal-close" type="button">{{ 'Cancel' | trans }}</button>
                    <button class="uk-button uk-button-primary" type="button" :disabled="!selectButton" @click.prevent="select">{{ 'Select' | trans }}</button>
                </div>
            </v-modal>

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

    computed: {
        selectButton: function () {
            var selected = this.$refs.finder.getSelected();
            return selected.length === 1 && this.$refs.finder.isVideo(selected[0])
        }
    },

    methods:{
        pick:function(){
            this.source = this.post.data.video;
            this.$refs.modal.open();
        },

        select: function () {
            this.source = this.$refs.finder.getSelected()[0];
            this.$refs.modal.close();
        },

        video:function(){
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

Vue.component('input-video', function (resolve, reject) {
    Vue.asset({
        js: [
            'app/assets/uikit/js/components/upload.min.js',
            'app/system/modules/finder/app/bundle/panel-finder.js'
        ]
    }).then(function () {
        resolve(module.exports);
    })
});
</script>
