<div class="uk-flex uk-flex-middle uk-flex-center">
    <div class="uk-grid uk-grid-small uk-margin-bottom" data-uk-grid-margin>
        <div>
            <a target="_blank" href="https://www.facebook.com/sharer.php?u=<?= $post->getUrl() ?>" class="uk-width-1-1 tm-sbtn tm-sbtn-facebook">
                <i class="uk-icon-facebook"></i> Facebook
            </a>
        </div>

        <div>
            <a target="_blank" href="https://twitter.com/share?url=<?= $post->getUrl() ?>" class="uk-width-1-1 tm-sbtn tm-sbtn-twitter">
              <i class="uk-icon-twitter"></i> Twitter
            </a>
        </div>

        <div>
            <a target="_blank" href="https://plus.google.com/share?url=<?= $post->getUrl() ?>" class="uk-width-1-1 tm-sbtn tm-sbtn-google-plus">
              <i class="uk-icon-google-plus"></i> Google
            </a>
        </div>

        <div>
            <a target="_blank" href="https://www.linkedin.com/shareArticle?mini=true&url=<?= $post->getUrl() ?>" class="uk-width-1-1 tm-sbtn tm-sbtn-linkedin">
              <i class="uk-icon-linkedin"></i> Linkedin
            </a>
        </div>

    </div>
</div>
