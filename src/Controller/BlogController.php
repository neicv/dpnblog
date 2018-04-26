<?php

namespace Dpn\Blog\Controller;

use Pagekit\Application as App;
use Dpn\Blog\Model\Comment;
use Dpn\Blog\Model\Post;
use Pagekit\User\Model\Role;
use Dpn\Blog\Model\Category;

/**
 * @Access(admin=true)
 */
class BlogController
{
    /**
     * @Access("dpnblog: manage own posts || dpnblog: manage all posts")
     * @Request({"filter": "array", "page":"int"})
     */
    public function postAction($filter = null, $page = null)
    {
        return [
            '$view' => [
                'title' => __('Posts'),
                'name'  => 'dpnblog/admin/post-index.php'
            ],
            '$data' => [
                'statuses' => Post::getStatuses(),
                'authors'  => Post::getAuthors(),
                'canEditAll' => App::user()->hasAccess('dpnblog: manage all posts'),
                'config'   => [
                    'filter' => (object) $filter,
                    'page'   => $page
                ]
            ]
        ];
    }

    /**
     * @Route("/post/edit", name="post/edit")
     * @Access("dpnblog: manage own posts || dpnblog: manage all posts")
     * @Request({"id": "int"})
     */
    public function editAction($id = 0)
    {
        try {

            if (!$post = Post::where(compact('id'))->related('user')->first()) {

                if ($id) {
                    App::abort(404, __('Invalid post id.'));
                }

                $module = App::module('dpnblog');

                $post = Post::create([
                    'user_id' => App::user()->id,
                    'status' => Post::STATUS_DRAFT,
                    'date' => new \DateTime(),
                    'comment_status' => (bool) $module->config('posts.comments_enabled')
                ]);

                $post->set('title', $module->config('posts.show_title'));
                $post->set('markdown', $module->config('posts.markdown_enabled'));
            }

            $user = App::user();
            if(!$user->hasAccess('dpnblog: manage all posts') && $post->user_id !== $user->id) {
                App::abort(403, __('Insufficient User Rights.'));
            }

            $roles = App::db()->createQueryBuilder()
                ->from('@system_role')
                ->where(['id' => Role::ROLE_ADMINISTRATOR])
                ->whereInSet('permissions', ['dpnblog: manage all posts', 'dpnblog: manage own posts'], false, 'OR')
                ->execute('id')
                ->fetchAll(\PDO::FETCH_COLUMN);

            $authors = App::db()->createQueryBuilder()
                ->from('@system_user')
                ->whereInSet('roles', $roles)
                ->execute('id, username')
                ->fetchAll();

            return [
                '$view' => [
                    'title' => $id ? __('Edit Post') : __('Add Post'),
                    'name'  => 'dpnblog/admin/post-edit.php'
                ],
                '$data' => [
                    'post'     => $post,
                    'statuses' => Post::getStatuses(),
                    'roles'    => array_values(Role::findAll()),
                    'canEditAll' => $user->hasAccess('dpnblog: manage all posts'),
                    'authors'  => $authors
                ],
                'post' => $post
            ];

        } catch (\Exception $e) {

            App::message()->error($e->getMessage());

            return App::redirect('@dpnblog/post');
        }
    }

    /**
     * @Access("dpnblog: manage comments")
     * @Request({"filter": "array", "post":"int", "page":"int"})
     */
    public function commentAction($filter = [], $post = 0, $page = null)
    {
        $post = Post::find($post);
        $filter['order'] = 'created DESC';

        return [
            '$view' => [
                'title' => $post ? __('Comments on %title%', ['%title%' => $post->title]) : __('Comments'),
                'name'  => 'dpnblog/admin/comment-index.php'
            ],
            '$data'   => [
                'statuses' => Comment::getStatuses(),
                'config'   => [
                    'filter' => (object) $filter,
                    'page'   => $page,
                    'post'   => $post,
                    'limit'  => App::module('dpnblog')->config('comments.comments_per_page')
                ]
            ]
        ];
    }

    /**
     * @Access("system: access settings")
     */
    public function settingsAction()
    {
        return [
            '$view' => [
                'title' => __('Blog Settings'),
                'name'  => 'dpnblog/admin/settings.php'
            ],
            '$data' => [
                'config' => App::module('dpnblog')->config()
            ]
        ];
    }

    /**
     * @Access("system: access settings")
     * @Route("/category")
     */
    public function categoryAction()
    {
        $category = Category::query()->where('sub_category = ?' , [0])->get();

        return [
            '$view' => [
                'title' => __('Category Template'),
                'name'  => 'dpnblog/admin/category-index.php'
            ],
            '$data' => [
                'category' => (object) $category
            ]
        ];
    }

    /**
     * @Access("system: access settings")
     * @Route("/tag")
     */
    public function tagAction()
    {
        return 'Yes';
    }
}
