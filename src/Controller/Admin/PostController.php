<?php

namespace Pastheme\Blog\Controller\Admin;

use Pagekit\Application as App;

/**
 * @Access(admin=true)
 */
class PostController
{

  /**
  * @Route("/")
  */
  public function postsAction(){

    return 'Hello World';

  }

}


?>
