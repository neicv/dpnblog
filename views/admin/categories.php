<?= $view->script('admin-categories' , 'dpnblog:app/bundle/admin-categories.js' , 'vue') ?>

<section id="categories">

  <div class="uk-clearfix">
    <button class="uk-button uk-button-primary uk-align-right" @click="editCategory()">{{'Add Category' | trans}}</button>
  </div>

  <div class="uk-grid pk-grid-large" data-uk-grid-margin>
    <div class="pk-width-sidebar uk-row-first">
      Hello World
    </div>
    <div class="uk-form pk-width-content uk-grid-margin uk-row-first">
      <div class="pk-table-fake pk-table-fake-header">
        <div class="pk-table-width-minimum uk-text-center"><input type="checkbox" v-check-all:selected.literal="input[name=id]" number></div>
        <div class="pk-table-width-200">{{ 'Title' | trans}}</div>
        <div class="pk-table-width-minimum uk-text-center">{{ 'Status' | trans}}</div>
        <div class="pk-table-width-100 uk-text-center">{{ 'Meta' | trans}}</div>
        <div class="pk-table-width-100 uk-text-center">{{ 'Description' | trans}}</div>
        <div class="pk-table-width-100 uk-text-center">{{ 'URL' | trans}}</div>
      </div>
      <ul class="uk-nestable uk-margin-remove uk-nestable-empty">
        <li v-for="category in categories" class="uk-nestable-item check-item">
          <div class="uk-nestable-panel pk-table-fake uk-form uk-visible-hover">
            <div class="pk-table-width-minimum uk-text-center"><input type="checkbox" name="id" :value="category.id"></div>
            <div class="pk-table-width-200"><a v-on:click="editCategory(category.id)">{{category.title}}</a></div>
            <div class="pk-table-width-minimum uk-text-center"><a :class="{
                  'pk-icon-circle': category.status == 0,
                  'pk-icon-circle-warning': category.status == 1,
                  'pk-icon-circle-success': category.status == 2,
                  'pk-icon-circle-danger': category.status == 3,
              }" @click="status(category.id , category.status)"></a></div>
            <div class="pk-table-width-100 uk-text-center" v-html="category.data.meta['og:title'] | lengthMeta"></div>
            <div class="pk-table-width-100 uk-text-center" v-html="category.data.meta['og:description'] | lengthDesc"></div>
            <div class="pk-table-width-100 uk-text-center">{{ 'URL' | trans}}</div>
          </div>
        </li>
      </ul>
      <div v-if="!categories.length">
        <h2 class="uk-text-center">{{'Categories Not Found' | trans}}</h2>
      </div>
    </div>
  </div>

  <aside>
    <div id="categoryEdit" class="uk-modal">
      <div class="uk-modal-dialog">
          <a class="uk-modal-close uk-close"></a>
          <span v-if="!categoryForm">Wait...</span>
          <form v-if="categoryForm" class="uk-form" v-on:submit.prevent="save">

            <h3 v-if="!categoryForm.id">{{'New Category' | trans}}</h3>
            <h3 v-else>{{'Edit Category' | trans}}</h3>

            <div class="uk-form-row">
              <label class="uk-form-label">{{'Title' | trans}}</label>
              <div class="uk-form-controls">
                <input type="text" class="uk-width-1-1" v-model="categoryForm.title" required>
              </div>
            </div>

            <div class="uk-form-row">
              <label class="uk-form-label">{{'Slug' | trans}}</label>
              <div class="uk-form-controls">
                <input type="text" class="uk-width-1-1" v-model="categoryForm.slug">
              </div>
            </div>

            <div class="uk-form-row">
              <label class="uk-form-label">{{'Meta' | trans}} </label>
              <div class="uk-form-controls">
                <input type="text" class="uk-width-1-1" v-model="categoryForm.data.meta['og:title']">
              </div>
              <div class="uk-margin-small"><span v-html="categoryForm.data.meta['og:title'] | lengthMeta"></span></div>
            </div>

            <div class="uk-form-row">
              <label class="uk-form-label">{{'Slug' | trans}}</label>
              <div class="uk-form-controls">
                <textarea style="width:100%" class="uk-form-width-large uk-width-1-1" rows="5" type="text" v-model="categoryForm.data.meta['og:description']"></textarea>
              </div>
              <div class="uk-margin-small"><span v-html="categoryForm.data.meta['og:description'] | lengthDesc"></span></div>
            </div>

            <div class="uk-form-row">
              <button class="uk-button uk-button-primary" type="submit" v-if="!categoryForm.id">{{'Add' | trans}}</button>
              <button class="uk-button uk-button-primary" type="submit" v-else>{{'Save' | trans}}</button>
            </div>

          </form>
      </div>
    </div>
  </aside>

</section>
