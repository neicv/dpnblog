<?php $view->script('category-index' , 'dpnblog:app/bundle/category-index.js' , 'vue'); ?>
<aside id="category">

    <div class="uk-padding">
        <form class="uk-form" @submit="addCategory">
            <div class="uk-clearfix">
                <h1 class="uk-h2 uk-align-left">{{ 'Add New A Category' | trans }}</h1>
                <div class="uk-align-right">
                    <button class="uk-button uk-button-primary" type="submit">{{ 'Add' | trans }}</button>
                </div>
            </div>
            <div class="uk-grid uk-grid-large uk-margin">
                <div class="uk-width-medium-1-3">
                    <label class="uk-margin-small">{{'Category Name' | trans}}</label>
                    <input v-model="cat.title" required>
                </div>
                <div class="uk-width-medium-1-3">
                    <label class="uk-margin-small">{{'Slug' | trans}}</label>
                    <input v-model="cat.slug">
                </div>
                <div class="uk-width-medium-1-3">
                    <label class="uk-margin-small">{{'Child Category' | trans}}</label>
                    <span class="uk-display-block uk-badge uk-badge-danger uk-margin-small" v-if="categorys.length == 0">{{'Not Found Category' | trans}}</span>
                    <select v-if="categorys.length != 0" v-model="cat.sub_category">
                        <option v-for="category in categorys" v-bind:value="category.id">{{category.title}}</option>
                    </select>
                </div>
            </div>
        </form>
    </div>

    <ul>
        <li v-for="le in pushEnd">
            {{le.title}}
        </li>
    </ul>

    <ul>
        <li v-for="category in categorys">
            {{category.title}}
        </li>
    </ul>

</aside>
