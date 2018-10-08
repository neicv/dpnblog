<?php
namespace Pastheme\Blog\Controller\Admin;
use Pagekit\Application as App;
use Pastheme\Blog\Model\Comment;
use Pastheme\Blog\Model\Post;
/**
 * @Access(admin=true)
 */
class CommentsController{
    /**
     * @Access("dpnblog: manage comments")
     * @Request({"filter": "array", "post":"int", "page":"int"})
     */
    public function commentAction($filter = [], $post = 0, $page = null){
        $post = Post::find($post);
        $filter['order'] = 'created DESC';
        return [
            '$view' => [
                'title' => $post ? __('Comments on %title%', ['%title%' => $post->title]) : __('Comments'),
                'name'  => 'dpnblog/admin/comment-index.php'
            ],
            '$data'   => [
                'statuses' => Comment::getStatuses(),
                'config'   => [
                    'filter' => (object) $filter,
                    'page'   => $page,
                    'post'   => $post,
                    'limit'  => App::module('dpnblog')->config('comments.comments_per_page')
                ]
            ]
        ];
    }
}
?>
