<?php if ($post->isPostStyle() == 'Image Gallery' && !empty($post->data['gallery'][0]['image'])): ?>

    <div class="uk-slidenav-position" data-uk-slideshow="">
        <ul class="uk-slideshow" style="height: 411px;">
            <?php foreach ($post->data['gallery'] as $gallery): ?>
                <li data-slideshow-slide="img">
                    <img class="dpnblog-height" src="<?= $gallery['image'] ?>" alt="<?= $post->title ?>">
                </li>
            <?php endforeach; ?>
        </ul>
        <a href="#" class="uk-slidenav uk-slidenav-contrast uk-slidenav-previous" data-uk-slideshow-item="previous" style="color: rgba(255,255,255,0.4)"></a>
        <a href="#" class="uk-slidenav uk-slidenav-contrast uk-slidenav-next" data-uk-slideshow-item="next" style="color: rgba(255,255,255,0.4)"></a>
        <ul class="uk-dotnav uk-dotnav-contrast uk-position-bottom uk-flex-center">
            <li data-uk-slideshow-item="0" class=""><a href="#">Item 1</a></li>
            <li data-uk-slideshow-item="1" class=""><a href="#">Item 2</a></li>
            <li data-uk-slideshow-item="2" class="uk-active"><a href="#">Item 3</a></li>
        </ul>
    </div>
<?php endif; ?>
