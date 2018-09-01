<?php
namespace Pastheme\Blog\Controller\Api;

use Pagekit\Application as App;
use Pastheme\Blog\Helper\BackAnswer;
use Pastheme\Blog\Model\Category;
use Pastheme\Blog\Model\Post;
use Pastheme\Blog\Controller\Api\ApiTagsController;

/**
* @Access(admin=true)
* @Route("/post" , name="post")
*/
class ApiPostController
{

    /**
    * @Route("/posts", methods="GET")
    * @Request({"filter": "array", "page":"int"})
    */
    public function postsAction($filter = [], $page = 0){

        $query  = Post::query();
        $filter = array_merge(array_fill_keys(['status', 'search', 'author', 'order', 'limit', 'category'], ''), $filter);
        extract($filter, EXTR_SKIP);

        if(!App::user()->hasAccess('dpnblog: manage all posts')) {
            $author = App::user()->id;
        }

        if (is_numeric($status)) {
            $query->where(['status' => (int) $status]);
        }

        if ($category > 0) {
            $query->where(['category_id' => (int) $category]);
        }

        if ($search) {
            $query->where(function ($query) use ($search) {
                $query->orWhere(['title LIKE :search', 'slug LIKE :search'], ['search' => "%{$search}%"]);
            });
        }

        if ($author) {
            $query->where(function ($query) use ($author) {
                $query->orWhere(['user_id' => (int) $author]);
            });
        }
        if (!preg_match('/^(date|title|comment_count)\s(asc|desc)$/i', $order, $order)) {
            $order = [1 => 'date', 2 => 'desc'];
        }

        $limit = (int) $limit ?: App::module('dpnblog')->config('posts.posts_per_page');
        $count = $query->count();
        $pages = ceil($count / $limit);
        $page  = max(0, min($pages - 1, $page));
        $posts = array_values($query->offset($page * $limit)->related('user')->limit($limit)->orderBy($order[1], $order[2])->get());
        return compact('posts', 'pages', 'count');
    }

    /**
    * @Route("/save" , methods="POST")
    * @Request({"post":"array"} , csrf="true")
    */
    public function saveAction($post = []){
        $back = new BackAnswer;
        try {
            $id = $post['id'];
            if (empty($post)) {
                return $back->abort(404 , 'Empty Data');
            }
            $post['modified'] = new \DateTime();
            if ( !$query = Post::where('id = ?' , [$id])->first() ) {
                unset($post['id']);
                $query = Post::create();
                if ( Post::where('title = ?' , [$post['title']])->first() ) {
                    $post['title'] = $post['title'] . ' - Copy' ;
                }
            }
            $post['title'] = ucwords($post['title']);
            if (empty($post['slug'])) {
                $post['slug'] = App::filter( empty($post['slug']) ? $post['title']:$post['slug'] , 'slugify');
                if ($slugController = Post::where('slug = ?' , [$post['slug']])->first() ) {
                    $post['slug'] = $post['slug'] . '-copy';
                }
            }
            $query->save($post);
            return $back->success( $query , __('Post Saved') );
        } catch (\Exception $e) {
            return $back->return();
        }
    }

    /**
    * @Route("/get-categories" , methods="GET")
    * @Request(csrf=true)
    */
    public function getCategoriesAction(){
        $backanswer = new BackAnswer;
        try {
            if ( !$categories = Category::where('status = 2')->orderBy('date', 'DESC')->get() ) {
                return $backanswer->abort('404' , 'Categories Not Found');
            }
            return $backanswer->success((array)$categories , 'GET All Categories');
        } catch (\Exception $e) {
            return $backanswer->return();
        }
    }

}
?>
