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
    * @Request({"data":"array" , "id":"integer"} , csrf="true")
    */
    public function saveAction($data = [] , $id = 0){
        if (empty($data)) {
            return $back->abort(404 , 'Empty Data');
        }

        if (!$query = Post::where(compact('id'))->first() ) {
            unset($data['id']);
            $query = Post::create();
        }

        $data['title'] = ucwords($data['title']);
        $data['modified'] = new \DateTime();
        $data['tags'] = ApiTagsController::checkedTags($data['tags']);

        if (empty($data['date'])) {
            $data['date'] = new \DateTime();
        }

        if (empty($data['slug'])) {
            $data['slug'] = App::filter( $data['slug'] ?? $data['title'] , 'slugify');
        }

        $query->save($data);
        return ['hi' => 'Hi'];
        //$back->success( $data , 'Success Post' );

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
