<?= $view->script('admin-categories' , 'dpnblog:app/bundle/admin-categories.js' , 'vue') ?>

<section id="categories" class="uk-grid pk-grid-large" data-uk-grid-margin>

  <div class="pk-width-sidebar uk-row-first">
    Hello World
  </div>

  <div class="uk-form pk-width-content uk-grid-margin uk-row-first">
    <div class="pk-table-fake pk-table-fake-header">
      <div class="pk-table-width-minimum pk-table-fake-nestable-padding"><input type="checkbox" number=""></div>
      <div class="pk-table-width-200">{{ 'Title' | trans}}</div>
      <div class="pk-table-width-minimum uk-text-center">{{ 'Status' | trans}}</div>
      <div class="pk-table-width-minimum uk-text-center">{{ 'Icon' | trans}}</div>
      <div class="pk-table-width-100 uk-text-center">{{ 'URL' | trans}}</div>
    </div>
    <ul class="uk-nestable uk-margin-remove uk-nestable-empty">
      <li v-for="category in categories" class="uk-nestable-item check-item">
        <div class="uk-nestable-panel pk-table-fake uk-form uk-visible-hover">
          <div class="pk-table-width-minimum uk-text-center"><input type="checkbox" name="id" ></div>
          <div class="pk-table-width-200">{{category.title}}</div>
          <div class="pk-table-width-minimum uk-text-center">{{ 'Status' | trans}}</div>
          <div class="pk-table-width-minimum uk-text-center">{{ 'Icon' | trans}}</div>
          <div class="pk-table-width-100 uk-text-center">{{ 'URL' | trans}}</div>
        </div>
      </li>
    </ul>
  </div>

</section>
