<?php
use Pastheme\Blog\Content\ReadmorePlugin;
use Pastheme\Blog\Event\PostListener;
use Pastheme\Blog\Event\RouteListener;
use Pastheme\Blog\Event\CategoryRouteListener;
use Pastheme\Blog\Event\TagsRouteListener;

return [
    'name' => 'dpnblog',
    'autoload' => ['Pastheme\\Blog\\' => 'src'],

    'menu' => [
      'dpnblog' => [
        'label' => 'Blog',
        'icon'  => 'dpnblog:icon.svg',
        'url'   => '@dpnblog/posts',
        'priority' => 110,
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
      ],
      'dpnblog: comments' => [
        'label' => 'Comments',
        'parent' => 'dpnblog',
        'url' => '@dpnblog/comment',
        'active' => '@dpnblog/comment*',
        'access' => 'dpnblog: manage comments'
      ],
      'dpnblog: settings' => [
        'parent'=> 'dpnblog',
        'label' => _('Settings'),
        'url'   => '@dpnblog/settings',
        'active'=> '@dpnblog/settings*'
      ]
    ],

    'routes' => [
      '/dpnblog' => [
        'name' => '@dpnblog',
        'controller' => [
          'Pastheme\\Blog\\Controller\\Admin\\PostController',
          'Pastheme\\Blog\\Controller\\Admin\\CategoryController',
          'Pastheme\\Blog\\Controller\\Admin\\SettingsController',
          'Pastheme\\Blog\\Controller\\Admin\\CommentsController'
        ]
      ],
      '/apidpnblog' => [
        'name' => '@apidpnblog',
        'controller' => [
          'Pastheme\\Blog\\Controller\\Api\\ApiCategoryController',
          'Pastheme\\Blog\\Controller\\Api\\ApiPostController',
          'Pastheme\\Blog\\Controller\\Api\\ApiTagsController',
          'Pastheme\\Blog\\Controller\\Api\\ApiCommentsController'
        ]
      ]
    ],

    'nodes' => [
        'dpnblog' => [
            'name'  => '@dpnblog',
            'label' => _('Blog'),
            'protected' => true,
            'frontpage' => true,
            'controller' => [
                'Pastheme\\Blog\\Controller\\BlogController',
                'Pastheme\\Blog\\Controller\\CategoryController',
                'Pastheme\\Blog\\Controller\\TagController'
            ]
        ],
    ],

    'widgets' => [
        'widgets/categories.php',
        'widgets/tags.php'
    ],

    'permissions' => [
      'dpnblog: manage own posts' => [
        'title' => 'Manage own posts',
        'description' => 'Create, edit, delete and publish posts of their own'
      ],
      'dpnblog: manage all posts' => [
        'title' => 'Manage all posts',
        'description' => 'Create, edit, delete and publish posts by all users'
      ],
      'dpnblog: manage all categories' => [
        'title' => 'Manage all categories',
        'description' => 'Create, edit, delete and publish categories by all users'
      ],
      'dpnblog: manage comments' => [
        'title' => 'Manage comments',
        'description' => 'Approve, edit and delete comments'
      ],
      'dpnblog: post comments' => [
        'title' => 'Post comments',
        'description' => 'Allowed to write comments on the site'
      ],
      'dpnblog: skip comment approval' => [
        'title' => 'Skip comment approval',
        'description' => 'User can write comments without admin approval'
      ],
      'dpnblog: comment approval required once' => [
        'title' => 'Comment approval required only once',
        'description' => 'First comment needs to be approved, later comments are approved automatically'
      ],
      'dpnblog: skip comment min idle' => [
        'title' => 'Skip comment minimum idle time',
        'description' => 'User can write multiple comments without having to wait in between'
      ]
    ],

    'config' => [

        'posts' => [
            'posts_per_page' => 10,
            'markdown_enabled' => true,
            'author_box_show' => true,
        ],

        'comments' => [
            'autoclose' => false,
            'autoclose_days' => 14,
            'blacklist' => '',
            'comments_per_page' => 20,
            'gravatar' => true,
            'max_depth' => 5,
            'maxlinks' => 2,
            'minidle' => 120,
            'nested' => true,
            'notifications' => 'always',
            'order' => 'ASC',
            'replymail' => true,
            'require_email' => true
        ],

        'permalink' => [
            'type' => '',
            'custom' => '{slug}'
        ],
    ],

    'events' => [

        'boot' => function($event , $app) {
            $app->subscribe(
                new RouteListener,
                new CategoryRouteListener,
                new TagsRouteListener,
                new PostListener()
            );
        },

        'view.scripts' => function ($event, $scripts) {
            $scripts->register('link-dpnblog', 'dpnblog:app/bundle/link-dpnblog.js', '~panel-link');
        }
    ]
];
