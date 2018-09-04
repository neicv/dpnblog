<?= $view->style('dpnblog-admin-css' , 'dpnblog:assets/css/dpnblog-admin.css') ?>
<?php foreach ($posts as $post): ?>
    <section>
        <?php if ($post->post_style == 0 && !empty($post->data['image']['src'])): ?>
            <img class="dpnblog-height" src="<?= $post->data['image']['src'] ?>" alt="<?= $post->data['image']['alt'] ?>">
        <?php endif; ?>
        <article class="uk-grid uk-grid-small uk-margin">
            <sidebar class="uk-width-medium-1-6 uk-flex uk-flex-center">
                Sidebar
            </sidebar>
            <main class="uk-width-medium-5-6">
                <h3 class="uk-h1"><a class="uk-link-reset" href=""><?= $post->title ?></a></h3>
                
            </main>
        </article>
    </section>
<?php endforeach; ?>
