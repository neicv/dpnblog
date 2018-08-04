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
        'url'   => '@dpnblog/posts',
        'priority' => 110
      ],
      'dpnblog: posts' => [
        'parent'=> 'dpnblog',
        'label' => _('Posts'),
        'url'   => '@dpnblog/posts',
        'active'=> '@dpnblog/posts*'
      ],
      'dpnblog: categories' => [
        'parent'=> 'dpnblog',
        'label' => _('Categories'),
        'url'   => '@dpnblog/categories',
        'active'=> '@dpnblog/categories*'
      ]
    ],

    'routes' => [
      '/dpnblog' => [
        'name' => '@dpnblog',
        'controller' => [
          'Pastheme\\Blog\\Controller\\Admin\\PostController',
          'Pastheme\\Blog\\Controller\\Admin\\CategoryController'
        ]
      ],
      '/apidpnblog' => [
        'name' => '@apidpnblog',
        'controller' => [
          'Pastheme\\Blog\\Controller\\Api\\ApiCategoryController'
        ]
      ]
    ]

];
