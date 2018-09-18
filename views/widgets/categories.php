<?php if ($categories): ?>
    <ul class="uk-nav uk-nav-default">
        <?php foreach ($categories as $category): ?>
            <li>
                <a href="<?= $view->url('@dpnblog/category' , ['category' => $category->id]) ?>"><?= $category->title ?></a>
            </li>
        <?php endforeach; ?>
    </ul>
<?php else: ?>
    <?= __('Category Not Found') ?>
<?php endif; ?>
