<template lang="html">

    <div class="uk-grid pk-grid-large" data-uk-grid-margin>

        <div class="uk-form pk-width-content uk-grid-margin">

            <div class="uk-form-row">
                <div class="uk-form-controls">
                    <input type="text" class="uk-form-large uk-width-1-1" :placeholder="'Title' | trans" v-model="post.title">
                </div>
            </div>

            <div class="uk-form-row">
                <label class="uk-form-label">{{'Content' | trans}}</label>
                <div class="uk-form-controls">
                    <v-editor id="post-content" :value.sync="post.content" :options="{markdown : post.data.markdown}"></v-editor>
                </div>
            </div>

            <div class="uk-form-row">
                <label class="uk-form-label">{{'Excerpt' | trans}}</label>
                <div class="uk-form-controls">
                    <v-editor id="post-content" :value.sync="post.excerpt" :options="{markdown : post.data.markdown , height:200}"></v-editor>
                </div>
            </div>

        </div>

        <div class="pk-width-sidebar">

            <div class="uk-panel uk-panel-box uk-panel-box-muted">
                <div class="uk-panel-title">
                    <h3>{{'Post Style' | trans}}</h3>
                </div>
                <div class="uk-form-row">
                    <div class="uk-form-controls">
                        <p class="uk-margin-small">
                            <label><input type="radio" v-model="post.post_style" value="0"> <i class="uk-icon-file"></i> {{'Default' | trans}}</label>
                        </p>
                        <p class="uk-margin-small">
                            <label><input type="radio" v-model="post.post_style" value="1"> <i class="uk-icon-youtube-play"></i> {{'Video' | trans}}</label>
                        </p>
                        <p class="uk-margin-small">
                            <label><input type="radio" v-model="post.post_style" value="2"> <i class="uk-icon-list-alt"></i> {{'Article' | trans}}</label>
                        </p>
                        <p class="uk-margin-small">
                            <label><input type="radio" v-model="post.post_style" value="3"> <i class="uk-icon-image"></i> {{'Gallery' | trans}}</label>
                        </p>
                        <p class="uk-margin-small">
                            <label><input type="radio" v-model="post.post_style" value="4"> <i class="uk-icon-mortar-board"></i> {{'Document' | trans}}</label>
                        </p>
                    </div>
                </div>
            </div>

            

        </div>

    </div>

</template>

<script>
export default {

    props:['post' , 'data' , 'form'],

    section:{
        label:'Post',
        priority:0
    }

}
</script>
