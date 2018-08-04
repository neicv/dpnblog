<?php

use Pastheme\Blog\Content\ReadmorePlugin;
use Pastheme\Blog\Event\PostListener;
use Pastheme\Blog\Event\RouteListener;
use Pastheme\Blog\Event\CategoryRouteListener;

return [

    'name' => 'dpnblog',

    'autoload' => ['Pastheme\\Blog\\' => 'src'],

    'menu' => [
      'dpnblog' => [
        'label' => 'Blog',
        'icon'  => 'dpnblog:icon.svg',
        'url'   => '@dpnblog/post',
        'priority' => 110
      ]
    ],

    'routes' => [
      '/dpnblog' => [
        'name' => '@dpnblog/post',
        'controller' => [
          
        ]
      ]
    ]

];
