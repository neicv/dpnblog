<?php
use Pagekit\Application as App;
use Pagekit\Module\Module;
use Pastheme\Blog\Model\Post;

return [
    'name' => 'dpnblog/posts',

    'label' => 'DPN - Posts',

    'events' => [
        'view.scripts' => function ($event , $scripts) use ($app) {
            $scripts->register('posts-widget' , 'dpnblog:app/bundle/posts-widget.js' , ['~widgets']);
        }
    ],

    'render' => function ($widget) use ($app){

        $this->blog = App::module('dpnblog');
        $page = 1;
        $query = Post::query();
        $query->where(['status = ?', 'date < ?'], [Post::STATUS_PUBLISHED, new \DateTime])->where(function ($query) {
            return $query->where('roles IS NULL')->whereInSet('roles', App::user()->roles, false, 'OR');
        })->related('user' , 'category');

        if (!$limit = $this->blog->config('posts.posts_per_page')) {
            $limit = 10;
        }

        $count = $query->count('id');
        $total = ceil($count / $limit);
        $page = max(1, min($total, $page));

        $query->offset(($page - 1) * $limit)->limit($limit)->orderBy('date', 'DESC');

        foreach ($posts = $query->get() as $post) {
            $post->excerpt = App::content()->applyPlugins($post->excerpt, ['post' => $post, 'markdown' => $post->get('markdown')]);
            $post->content = App::content()->applyPlugins($post->content, ['post' => $post, 'markdown' => $post->get('markdown'), 'readmore' => true]);
        }

        $authorBox = $this->blog->config('posts.author_box_show');
        $socialShare = $this->blog->config('posts.social_share_enabled');

        return $app->view('dpnblog/widgets/posts.php' , compact('tags', 'posts', 'total', 'page', 'authorBox', 'socialShare'));
    }

]
?>
