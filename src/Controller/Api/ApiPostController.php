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
