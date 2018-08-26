<?php
namespace Pastheme\Blog\Controller\Api;

use Pagekit\Application as App;
use Pastheme\Blog\Helper\BackAnswer;
use Pastheme\Blog\Model\Category;
use Pastheme\Blog\Model\Post;

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
    public function saveAction($data = null){
        $back = new BackAnswer;
        try {

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
