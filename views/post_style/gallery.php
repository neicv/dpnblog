<?php if ($post->isPostStyle() == 'Image Gallery' && !empty($post->data['gallery'][0]['image'])): ?>

    <ul class="uk-slideshow" data-uk-slideshow="{autoplay:true}">
    <?php foreach ($post->data['gallery'] as $gallery): ?>
        <li>
            <img class="dpnblog-height" src="<?= $gallery['image'] ?>" alt="<?= $post->title ?>">
        </li>
    <?php endforeach; ?>
    </ul>
    
<?php endif; ?>
