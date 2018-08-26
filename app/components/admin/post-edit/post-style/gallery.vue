<template lang="html">
    <a class="uk-placeholder uk-text-center uk-display-block uk-margin-remove" @click.prevent="pick">
        <img width="60" height="60" :alt="'Placeholder Video' | trans" :src="$url('packages/pastheme/dpnblog/assets/image/gallery.svg')">
        <p class="uk-text-muted uk-margin-small-top">{{ 'Add Gallery'| trans }}</p>
    </a>

    <v-modal v-ref:modal large>
        <div class="uk-clearfix">
            <button class="uk-button uk-button-primary uk-align-right">New Field</button>
        </div>
    </v-modal>

</template>

<script>
export default {
    props: ['post'],

    methods:{
        pick:function(){
            this.$refs.modal.open();
        }
    }
}
</script>
