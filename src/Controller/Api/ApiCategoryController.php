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
      $filter = array_merge(array_fill_keys(['status' , 'search' , 'order'] , '') , $filter);
      extract($filter , EXTR_SKIP);

      if ( !empty($search) ) {
        $query->where(['title LIKE :search' , 'slug LIKE :search'] , ['search' => "%{$search}%"]);
      }

      if ( !empty($status) ) {
        $query->where('status = ?' , [$status]);
      }

      $categories = array_values($query->get());
      $count = $query->count();
      $page = 0;

      return compact('categories' , 'filter' , 'page' , 'count');

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
