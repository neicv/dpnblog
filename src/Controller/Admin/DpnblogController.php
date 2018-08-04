<?php

namespace Pastheme\Blog\Controller\Admin;

use Pagekit\Application as App;

/**
 * @Access(admin=true)
 */
class DpnblogController
{

  /**
  * @Route("/post")
  */
  public function postAction(){

    return 'Hello World';

  }

}


?>
