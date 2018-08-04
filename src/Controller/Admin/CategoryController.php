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
  */
  public function categoriesAction(){

    return [
      '$view' => [
        'title' => __('Categories List'),
        'name'  => 'dpnblog:views/admin/categories.php'
      ]
    ];

  }

}


?>
