<?php foreach ($posts as $post): ?>
    <article>
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
    </article>
<?php endforeach; ?>
