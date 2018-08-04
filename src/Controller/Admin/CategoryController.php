<?php

namespace Pastheme\Blog\Controller\Admin;

use Pagekit\Application as App;

/**
 * @Access(admin=true)
 */
class CategoryController
{

  /**
  * @Route("/categories")
  * @Request({"page":"int" , "filter":"array"})
  */
  public function categoriesAction( $page = 0 , $filter = array() )
  {
    return [
      '$view' => [
        'title' => __('Categories List'),
        'name'  => 'dpnblog:views/admin/categories.php'
      ],
      '$data' => [
        'config' => [
          'filter' => $filter,
          'page'   => $page
        ]
      ]
    ];
  }

}


?>
