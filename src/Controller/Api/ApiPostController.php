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
    * @Request({"data":"array"} , csrf="true")
    */
    public function saveAction($data = []){
        $back = new BackAnswer;
        try {
            $id = $data['id'];
            if (empty($data)) {
                return $back->abort(404 , 'Empty Data');
            }
            $data['modified'] = new \DateTime();
            if ( !$query = Post::where('id = ?' , [$id])->first() ) {
                unset($data['id']);
                $query = Post::create();
                if ( Post::where('title = ?' , [$data['title']])->first() ) {
                    $data['title'] = $data['title'] . ' - Copy' ;
                }
            }
            $data['title'] = ucwords($data['title']);
            if (empty($data['slug'])) {
                $data['slug'] = App::filter( $data['slug'] ?? $data['title'] , 'slugify');
                if ($slugController = Post::where('slug = ?' , [$data['slug']])->first() ) {
                    $data['slug'] = $data['slug'] . '-copy';
                }
            }
            $query->save($data);
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
