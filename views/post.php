<?= $view->style('dpnblog-admin-css' , 'dpnblog:assets/css/dpnblog-admin.css' , ['uikit-slideshow']) ?>
<?= $view->script('dpnblog-posts' , 'dpnblog:app/bundle/dpnblog-posts.js' , ['vue' , 'uikit-slideshow']) ?>
<section id="posts">
    <?php
        switch($post->post_style){
            case 1:
                echo $view->render('dpnblog/post_style/video.php');
                break;
            case 2:
                echo $view->render('dpnblog/post_style/article.php');
                break;
            case 3:
                echo $view->render('dpnblog/post_style/gallery.php');
                break;
            case 4:
                echo $view->render('dpnblog/post_style/document.php');
                break;
            default:
                echo $view->render('dpnblog/post_style/default.php');
        }
    ?>
    <article class="uk-margin">

        <div class="uk-comment-meta">
          <?= __('Posted in') ?>
          <a class="uk-text-bold" href=""><?= $post->category->title ?></a>
          <?= __('%date%', ['%date%' => '<time datetime="'.$post->date->format(\DateTime::ATOM).'" v-cloak>{{ "'.$post->date->format(\DateTime::ATOM).'" | date "longDate" }}</time>' ]) ?>
        </div>

        <div class="uk-margin-small"><?= $post->content ?></div>

        <div class="uk-comment">
            <div class="uk-comment-header">
                <img class="uk-comment-avatar" src="<?= $post->getGravatar() ?>">
                <h4 class="uk-comment-title"><?= $user->name ?></h4>
                <div class="uk-comment-meta">
                    <?= $user->email ?>
                </div>
            </div>
        </div>

    </article>
</section
