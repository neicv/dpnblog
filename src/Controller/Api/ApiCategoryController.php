<?php

namespace Pastheme\Blog\Controller\Api;

use Pagekit\Application as App;
use Pastheme\Blog\Helper\BackAnswer;
use Pastheme\Blog\Model\Category;

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

      $query = Category::query();

      if (!empty($filter['search'])) {
        $query->where(['title LIKE :search' , 'slug LIKE :search'] , ['search' => "%{$filter['search']}%"]);
      }

      if (!empty($filter['status'])) {
        $query->where('status = ?' , [$filter['status']]);
      }

      $query->get();

      print_r($query);

      return $backanswer->success($query , 'Tebrikler');

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
