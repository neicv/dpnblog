<!-- < ?= $view->style('dpnblog-admin-css' , 'dpnblog:assets/css/dpnblog-admin.css' , 'slideshow') ?> -->
<?= $view->script('dpnblog-posts' , 'dpnblog:app/bundle/dpnblog-posts.js' , 'vue') ?>
<section id="posts">
    <?php foreach ($posts as $post): ?>
        <div>
            <?php if ($post->isPostStyle() == __('Default Post') && !empty($post->data['image']['src'])): ?>  
                <img class="dpnblog-height" src="<?= $post->data['image']['src'] ?>" alt="<?= $post->data['image']['alt'] ?>">
            <?php endif; ?>
            <?php if ($post->isPostStyle() == __('Video Content') && !empty($post->data['video']['image'])): ?>
                <img class="dpnblog-height" src="<?= $post->data['video']['image'] ?>" alt="<?= $post->category->title ?>">
            <?php endif; ?>
            <?php if ($post->isPostStyle() == __('Article Post') && !empty($post->data['image']['src'])): ?>
                <img class="dpnblog-height" src="<?= $post->data['image']['src'] ?>" alt="<?= $post->data['image']['alt'] ?>">
            <?php endif; ?>
            <?php if ($post->isPostStyle() == __('Image Gallery') && !empty($post->data['gallery'][0]['image'])): ?>
                <img class="dpnblog-height" src="<?= $post->data['gallery'][0]['image'] ?>" alt="<?= $post->category->title ?>">
            <?php endif; ?>
            <?php if ($post->isPostStyle() == __('Document') && !empty($post->data['image']['src'])): ?>
                <img class="dpnblog-height" src="<?= $post->data['image']['src'] ?>" alt="<?= $post->data['image']['alt'] ?>">
            <?php endif; ?>
            <article class="uk-grid uk-grid-small uk-margin uk-margin-right">
                <div class="uk-width-medium-1-6">
                    <div class="uk-flex uk-flex-center uk-margin-small-top">
                        <div class="uk-text-center">
                            <?php if ($authorBox === true): ?>
                                <div class="uk-flex uk-flex-center uk-margin-small-bottom">
                                    <div class="uk-text-center">
                                        <div class="dpnblog-avatar">
                                            <img src="<?= $post->getGravatar() ?>"/>

                                            <?php if ( $post->isPostStyle() == __('Default Post')): ?>
                                                <!--span class="uk-icon-file"></span>-->
                                            <?php endif; ?>

                                            <?php if ( $post->isPostStyle() == __('Video Content')): ?>
                                                <span class="uk-icon-youtube-play"></span>
                                            <?php endif; ?>

                                            <?php if ( $post->isPostStyle() == __('Article Post')): ?>
                                                <span class="uk-icon-list-alt"></span>
                                            <?php endif; ?>

                                            <?php if ( $post->isPostStyle() == __('Image Gallery')): ?>
                                                <span class="uk-icon-image"></span>
                                            <?php endif; ?>

                                            <?php if ( $post->isPostStyle() == __('Document')): ?>
                                                <span class="uk-icon-mortar-board"></span>
                                            <?php endif; ?>

                                        </div>
                                        <h6 class="uk-margin-remove"><?= $post->user->username ?></h6>
                                        <p class="uk-text-small uk-margin-remove"><?= $post->user->email ?></p>
                                    </div>
                                </div>
                            <?php endif; ?>
                            <div class="uk-text-small uk-margin-small-top">
                                <?= __('%date%', ['%date%' => '<time datetime="'.$post->date->format(\DateTime::ATOM).'" v-cloak>{{ "'.$post->date->format(\DateTime::ATOM).'" | date "longDate" }}</time>' ]) ?>
                                 <div> <a href="<?= $view->url('@dpnblog/category/id' , ['id' => $post->category_id]) ?>"><?= $post->category->title ?></a></div>
                            </div>
                            <!-- <a href="< ?= $view->url('@dpnblog/id', ['id' => $post->id]) ?>" class="dpnblog-readme"><?= __('Read more') ?></a> -->
                        </div>
                    </div>
                </div>
                <main class="uk-width-medium-5-6">
                    <h3 class="uk-h1 uk-margin-remove">
                        <a class="uk-link-reset" href="<?= $view->url('@dpnblog/id', ['id' => $post->id]) ?>"><?= $post->title ?></a>
                    </h3>
                    <br>
                    <div class=""><!--uk-margin-remove-->
                        <?= !empty($post->excerpt) ? $post->excerpt:$post->content ?>
                    </div>
                    <div class="uk-text-right uk-margin-left">
                        <a href="<?= $view->url('@dpnblog/id', ['id' => $post->id]) ?>" class="dpnblog-readme"><?= __('Read more') ?></a>
                    </div>
                </main>
            </article>
            <hr />
        </div>
    <?php endforeach; ?>

    <?php
    $range     = 3;
    $total     = intval($total);
    $page      = intval($page);
    $pageIndex = $page - 1;
    ?>

    <?php if ($total > 1) : ?>
        <ul class="uk-pagination">

            <?php for($i=1;$i<=$total;$i++): ?>
                <?php if ($i <= ($pageIndex+$range) && $i >= ($pageIndex-$range)): ?>

                    <?php if ($i == $page): ?>
                    <li class="uk-active"><span><?=$i?></span></li>
                    <?php else: ?>
                    <li>
                        <a href="<?= $view->url('@dpnblog/page', ['page' => $i]) ?>"><?=$i?></a>
                    <li>
                    <?php endif; ?>

                <?php elseif($i==1): ?>

                    <li>
                        <a href="<?= $view->url('@dpnblog/page', ['page' => 1]) ?>">1</a>
                    </li>
                    <li><span>...</span></li>

                <?php elseif($i==$total): ?>

                    <li><span>...</span></li>
                    <li>
                        <a href="<?= $view->url('@dpnblog/page', ['page' => $total]) ?>"><?=$total?></a>
                    </li>

                <?php endif; ?>
            <?php endfor; ?>

        </ul>
    <?php endif ?>

</section>
