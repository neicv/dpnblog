<?php
namespace Pastheme\Blog\Controller\Api;

use Pagekit\Application as App;
use Pastheme\Blog\Model\Tags;
use Pastheme\Blog\Helper\BackAnswer;

/**
* @Access(admin=true)
* @Route("/tags" , name="post")
*/
class ApiTagsController{

    /**
    * @Route(methods="GET")
    * @Request(csrf=true)
    */
    public function getTagsAction(){
        $back = new BackAnswer;
        try {
            if (!$query = Tags::findAll()) {
                return $back->success(array() , 'No Tags At All' , 404);
            }
            return $back->success($query , 'GET All Tags');
        } catch (\Exception $e) {
            return $back->return();
        }
    }

    /**
    * @Route(methods="POST")
    * @Request({"tags":"string"} , csrf="true")
    */
    public function addAction($tags = null){
        $back = new BackAnswer;
        try {
            if ( $query = Tags::where('tags LIKE :search' , [':search' => "%{$tags}%"])->get() ) {
                return $back->abort(400 , 'That\'s Already There');
            }

                        

        } catch (\Exception $e) {
            return $back->return();
        }

    }

}
?>
