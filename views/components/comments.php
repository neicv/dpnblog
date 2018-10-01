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
                        <div v-if="form.sub_id">
                            <a class="uk-text-danger" @click.prevent="removeReply()">{{'You will comment on the sub' | trans}}</a>
                        </div>
                    </div>
                </form>
            <?php endif; ?>

            <div v-if="comments">
                <ul class="uk-list">
                    <li class="uk-margin" v-for="comment in comments">
                        <div class="uk-comment">
                            <header class="uk-comment-header">
                                <?php if ($app['user']->isAuthenticated()): ?>
                                    <a class="uk-align-right" @click.prevent="replyRead(comment.id)">Reply</a>
                                <?php endif; ?>
                                <img class="uk-comment-avatar uk-border-circle" width="50" height="50" :alt="comment.author.name" v-gravatar="comment.author.email">
                                <h4 class="uk-comment-title">{{comment.author.name}}</h4>
                                <div class="uk-comment-meta">{{ comment.date | date }}</div>
                            </header>
                            <div class="uk-comment-body uk-margin-remove">{{comment.content}}</div>
                        </div>
                        <ul v-if="comment.subReply">
                            <li class="uk-margin-top" v-for="sub in comment.subReply">
                                <div class="uk-comment uk-comment-primary">
                                    <header class="uk-comment-header">
                                        <img class="uk-comment-avatar uk-border-circle" width="50" height="50" :alt="sub.author.name" v-gravatar="sub.author.email">
                                        <div class="uk-flex uk-flex-middle">
                                            <div>
                                                <h4 class="uk-comment-title">{{sub.author.name}}</h4>
                                                <div class="uk-comment-meta">
                                                    {{ sub.date | date }}
                                                </div>
                                            </div>
                                        </div>
                                    </header>
                                    <div class="uk-comment-body uk-margin-remove">{{sub.content}}</div>
                                </div>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>

            <div v-else>
                <h3 class="uk-text-center">{{'Any Not Found Comments' | trans}}</h3>
            </div>

        </div>
    </div>
</div>
