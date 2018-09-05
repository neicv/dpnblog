<?= $view->style('dpnblog-admin-css' , 'dpnblog:assets/css/dpnblog-admin.css') ?>
<?php foreach ($posts as $post): ?>
    <section>
        <?php if ($post->post_style == 0 && !empty($post->data['image']['src'])): ?>
            <img class="dpnblog-height" src="<?= $post->data['image']['src'] ?>" alt="<?= $post->data['image']['alt'] ?>">
        <?php endif; ?>
        <article class="uk-grid uk-margin">
            <sidebar class="uk-width-medium-1-6 uk-flex uk-flex-center">
                <div>
                    <?php if ($authorBox === true): ?>
                        <div class="uk-flex uk-flex-center uk-flex-middle">
                            <div class="uk-text-center">
                                <img src="<?= $post->getGravatar() ?>" class="dpnblog-avatar"/>
                                <span class="uk-display-block"><?= $post->user->username ?></span>
                            </div>
                        </div>
                    <?php endif; ?>
                    <button class="uk-button uk-button-default uk-margin-large"><?= __('Readme') ?></button>
                </div>
            </sidebar>
            <main class="uk-width-medium-5-6">
                <div>
                    <span class="uk-align-right">
                        Kategori Pastheme
                    </span>
                    <h3 class="uk-h1 uk-margin-remove"><a class="uk-link-reset" href=""><?= $post->title ?></a></h3>
                </div>
                <?= !empty($post->excerpt) ? $post->excerpt:$post->content ?>
            </main>
        </article>
        <hr />
    </section>
<?php endforeach; ?>
