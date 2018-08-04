<?php

namespace Pastheme\Blog\Controller\Api;

use Pagekit\Application as App;
use Pastheme\Blog\Helper\BackAnswer;

/**
* @Access(admin=true)
* @Route("/category" , name="category")
*/
class ApiCategoryController
{

  /**
  * @Route("/" , methods="GET")
  * @Request({"filter":"array" , "page":"int"} , csrf=true)
  */
  public function indexAction( $filter = array() , $page = 0)
  {
    $backanswer = new BackAnswer;

    try {

      if (is_string($categories)) {
        $backanswer->abort(404 , 'Hello World');
      }

      return $backanswer->success('Tebrikler');

    } catch (\Exception $e) {

      return $backanswer->return();

    }

  }

  /**
  * @Route("/" , methods="POST")
  * @Route("/{id}" , methods="POST" , requirements={"id" ="\d+"})
  */
  public function saveAction()
  {

  }

}

?>
