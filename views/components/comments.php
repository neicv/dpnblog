<?php $view->script('comments-module' , 'comments:app/bundle/comments-module.js' , 'vue') ?>
<div id="comments" v-cloak>
    <div class="uk-block uk-block-default">
        <div class="uk-container">

            <?php if ($app['user']->isAuthenticated()): ?>
                <form class="uk-form" @submit.prevent="sendReply">
                    <h3> {{ 'Comment' | trans }} </h3>
                    <div class="uk-form-row">
                        <textarea class="uk-width-1-1" rows="5" style="resize: none;" :placeholder="'Enter your comment' | trans" v-model="form.message" required></textarea>
                    </div>
                    
                    <div class="uk-form-row">
                        <button class="uk-button uk-button-primary uk-align-right"> {{'Submit' | trans}} </button>
                    </div>
                </form>
            <?php endif; ?>

        </div>
    </div>
</div>
