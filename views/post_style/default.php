<?php if ($post->isPostStyle() == 'Default Post' && !empty($post->data['image']['src'])): ?>
    <img src="<?= $post->data['image']['src'] ?>" alt="<?= $post->data['image']['alt'] ?>">
<?php endif; ?>
