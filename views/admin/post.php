<?= $view->script('admin-posts' , 'dpnblog:app/bundle/admin-posts.js' , 'vue') ?>

<section id="posts">

    <div class="uk-margin uk-flex uk-flex-space-between uk-flex-wrap" data-uk-margin>
        <div class="uk-flex uk-flex-middle uk-flex-wrap" data-uk-margin>
            <h2 class="uk-margin-remove" v-if="!selected.length">{{ '{0} %count% Categories|{1} %count% Category|]1,Inf[ %count% Categories' | transChoice count {count:count} }}</h2>
            <template v-else>
                <h2 class="uk-margin-remove">{{ '{1} %count% Category selected|]1,Inf[ %count% Categories selected' | transChoice selected.length {count:selected.length} }}</h2>
                <div class="uk-margin-left">
                    <ul class="uk-subnav pk-subnav-icon">
                        <li><a class="pk-icon-check pk-icon-hover" title="Publish" data-uk-tooltip="{delay: 500}" @click="allChange(2)"></a></li>
                        <li><a class="pk-icon-block pk-icon-hover" title="Unpublish" data-uk-tooltip="{delay: 500}" @click="allChange(3)"></a></li>
                        <li><a class="pk-icon-delete pk-icon-hover" title="Delete" data-uk-tooltip="{delay: 500}" @click="remove" v-confirm="'Delete Posts?'"></a></li>
                    </ul>
                </div>
            </template>
            <div class="pk-search">
                <div class="uk-search">
                    <input class="uk-search-field" type="text" v-model="config.filter.search" debounce="300">
                </div>
            </div>
        </div>
        <div data-uk-margin>
            <button class="uk-button uk-button-primary uk-align-right" @click="editCategory()">{{'Add Category' | trans}}</button>
        </div>
    </div>

</section>
