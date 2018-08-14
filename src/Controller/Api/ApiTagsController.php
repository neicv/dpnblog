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
    * @Route("/addtags" , methods="POST")
    * @Request({"tags":"string"} , csrf="true")
    */
    public function addTagsAction($tags = null){
        $back = new BackAnswer;
        try {

            $tagsLower = ucwords(strtolower($tags));

            if ( $query = Tags::where(['tags = :tags' , 'slug = :tags'] , ['tags' => $tagsLower])->get() ) {
                return $back->abort(400 , 'That\'s Already There');
            }

            $query = Tags::create([
                'tags' => $tagsLower,
                'slug' => App::filter($tagsLower , 'slugify'),
                'date' => new \DateTime(),
                'user_id' => App::user()->id
            ]);
            $query->save();
            return $back->success($query , 'A new tag has been added');

        } catch (\Exception $e) {
            return $back->return();
        }

    }

}
?>
