<?= $view->script('admin-post-edit' , 'dpnblog:app/bundle/admin-post-edit.js' , ['vue' , 'editor' , 'jquery']) ?>
<?= $view->script('op-jquery-ui' , 'dpnblog:app/jquery/jquery-ui.min.js' , ['admin-post-edit']) ?>
<?= $view->script('op-caret-jquery' , 'dpnblog:app/jquery/jquery.caret.min.js' , ['op-jquery-ui']) ?>
<?= $view->script('op-tags-jquery' , 'dpnblog:app/jquery/jquery.tag-editor.min.js' , ['op-caret-jquery']) ?>
<?= $view->style('dpnblog-admin-css' , 'dpnblog:assets/css/dpnblog-admin.css' , 'theme') ?>
<?= $view->style('op-tags-css' , 'dpnblog:app/jquery/jquery.tag-editor.css') ?>

<form id="post" class="uk-form" v-validator="form" @submit.prevent="save | valid" v-cloak>

    <div class="uk-margin uk-flex uk-flex-space-between uk-flex-wrap" data-uk-margin>
        <div data-uk-margin>

            <h2 class="uk-margin-remove" v-if="data.post.id">{{ 'Edit Post' | trans }}</h2>
            <h2 class="uk-margin-remove" v-else>{{ 'Add Post' | trans }}</h2>

        </div>
        <div data-uk-margin>

            <a class="uk-button uk-margin-small-right" :href="$url.route('admin/dpnblog/posts')">{{ data.post.id ? 'Close' : 'Cancel' | trans }}</a>
            <button class="uk-button uk-button-primary" type="submit">{{ 'Save' | trans }}</button>

        </div>
    </div>

    <div class="uk-margin uk-panel uk-panel-box uk-panel-box-muted">
        <ul class="uk-list">
            <li>
                <span class="uk-text-small">Meta title:</span>
            </li>
            <li>
                <span class="uk-text-small">Meta description:</span>
            </li>
            <li>
                <span class="uk-text-small">Content length:</span>
            </li>
            <li>
                <span class="uk-text-small">Excerpt:</span>
            </li>
        </ul>
    </div>

    <ul class="uk-tab" v-el:tab v-show="sections.length > 1">
        <li v-for="section in sections"><a>{{ section.label | trans }}</a></li>
    </ul>

    <div class="uk-switcher uk-margin" v-el:content>
        <div v-for="section in sections">
            <component :is="section.name" :form="form" :post.sync="data.post" :data.sync="data"></component>
        </div>
    </div>

</form>
