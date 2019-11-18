<?php
namespace Pastheme\Blog\Event;
use Pagekit\Application as App;
use Pagekit\Content\Event\ContentEvent;
use Pagekit\Event\EventSubscriberInterface;

class SocialShare implements EventSubscriberInterface{

     /**
     * @var Module
     */
    protected $blog;

    /**
     * Constructor.
     */
    public function __construct()
    {
        $this->blog = App::module('dpnblog');
    }

    public function onContent(ContentEvent $event){
        if (!$event['post']) {
            return;
        }
        if (strpos(App::request()->attributes->get('_route'), '@dpnblog/id') === false) {
            return;
        }
        $post = $event['post'];
        $data = [
            'id' => $post->id,
            'title' => isset($post->data['meta']['og:title']) ? $post->data['meta']['og:title']:$post->title,
            'desc' => isset($post->data['meta']['og:description']) ? $post->data['meta']['og:description']:$post->excerpt,
        ];
        $content = $event->getContent();
        $reply ='';
        if ( $this->blog->config('posts.social_share_enabled')){
            $reply = App::view('dpnblog/components/social.php', compact(['data']));
        }
        $event->setContent($content . $reply);
    }

    /**
    * (@inheritdoc)
    */
    public function subscribe(){
        return [
            'content.plugins' => ['onContent' , 11]
        ];
    }

}
?>
