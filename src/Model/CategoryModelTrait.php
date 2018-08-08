<?php

namespace Pastheme\Blog\Model;

use Pagekit\Database\ORM\ModelTrait;

trait CategoryModelTrait
{
  use ModelTrait;

  /**
   * {@inheritdoc}
   */
  public static function findByTitle($title)
  {
      return static::where(compact('title'))->first();
  }

}

?>
