<?= $view->style('dpnblog-admin-css' , 'dpnblog:assets/css/dpnblog-admin.css' , 'slideshow') ?>
<?= $view->script('dpnblog-posts' , 'dpnblog:app/bundle/dpnblog-posts.js' , 'vue') ?>
<section id="posts">
    <?php foreach ($posts as $post): ?>
        <div>
            <?php if ($post->isPostStyle() == 'Default Post' && !empty($post->data['image']['src'])): ?>
                <img class="dpnblog-height" src="<?= $post->data['image']['src'] ?>" alt="<?= $post->data['image']['alt'] ?>">
            <?php endif; ?>
            <?php if ($post->isPostStyle() == 'Video Content' && !empty($post->data['video']['image'])): ?>
                <img class="dpnblog-height" src="<?= $post->data['video']['image'] ?>" alt="<?= $post->category->title ?>">
            <?php endif; ?>
            <?php if ($post->isPostStyle() == 'Article Post' && !empty($post->data['image']['src'])): ?>
                <img class="dpnblog-height" src="<?= $post->data['image']['src'] ?>" alt="<?= $post->data['image']['alt'] ?>">
            <?php endif; ?>
            <?php if ($post->isPostStyle() == 'Image Gallery' && !empty($post->data['gallery'][0]['image'])): ?>
                <img class="dpnblog-height" src="<?= $post->data['gallery'][0]['image'] ?>" alt="<?= $post->category->title ?>">
            <?php endif; ?>
            <?php if ($post->isPostStyle() == 'Document' && !empty($post->data['image']['src'])): ?>
                <img class="dpnblog-height" src="<?= $post->data['image']['src'] ?>" alt="<?= $post->data['image']['alt'] ?>">
            <?php endif; ?>
            <article class="uk-grid uk-grid-small uk-margin">
                <sidebar class="uk-width-medium-1-6">
                    <div class="uk-flex uk-flex-center uk-margin-small-top">
                        <div class="uk-text-center">
                            <?php if ($authorBox === true): ?>
                                <div class="uk-flex uk-flex-center uk-margin-small-bottom">
                                    <div class="uk-text-center">
                                        <div class="dpnblog-avatar">
                                            <img src="<?= $post->getGravatar() ?>"/>
                                            <?php if ( $post->isPostStyle() == 'Default Post'): ?>
                                                <span class="uk-icon-file"></span>
                                            <?php endif; ?>
                                            <?php if ( $post->isPostStyle() == 'Video Content'): ?>
                                                <span class="uk-icon-youtube-play"></span>
                                            <?php endif; ?>
                                            <?php if ( $post->isPostStyle() == 'Article Post'): ?>
                                                <span class="uk-icon-list-alt"></span>
                                            <?php endif; ?>
                                            <?php if ( $post->isPostStyle() == 'Image Gallery'): ?>
                                                <span class="uk-icon-image"></span>
                                            <?php endif; ?>
                                            <?php if ( $post->isPostStyle() == 'Document'): ?>
                                                <span class="uk-icon-mortar-board"></span>
                                            <?php endif; ?>
                                        </div>
                                        <h6 class="uk-margin-remove"><?= $post->user->username ?></h6>
                                        <p class="uk-text-small uk-margin-remove"><?= $post->user->email ?></p>
                                        <div class="uk-text-small">
                                            <?= __('%date%', ['%date%' => '<time datetime="'.$post->date->format(\DateTime::ATOM).'" v-cloak>{{ "'.$post->date->format(\DateTime::ATOM).'" | date "longDate" }}</time>' ]) ?>
                                             - <a href=""><?= $post->category->title ?></a>
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>
                            <a class="dpnblog-readme"><?= __('Readme') ?></a>
                        </div>
                    </div>
                </sidebar>
                <main class="uk-width-medium-5-6">
                    <h3 class="uk-h1 uk-margin-remove">
                        <a class="uk-link-reset" href=""><?= $post->title ?></a>
                    </h3>
                    <div class="uk-margin-remove">
                        <?= !empty($post->excerpt) ? $post->excerpt:$post->content ?>
                    </div>
                </main>
            </article>
            <hr />
        </div>
    <?php endforeach; ?>
</section>
