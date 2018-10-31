<?= $view->style('social' , 'dpnblog:assets/css/social.css' , 'uikit') ?>
<section class="uk-margin">
    <div class="uk-grid uk-grid-small uk-flex uk-flex-middle uk-flex-center" data-uk-grid-margin>
        <div>
            <a href="https://www.facebook.com/sharer/sharer.php?u=<?= $data['url'] ?>" target="_blank" class="uk-button uk-button-default"><span class="uk-icon uk-icon-facebook tm-icon-facebook"></span> Facebook Share</a>
        </div>
        <div>
            <a href="https://twitter.com/home?status=<?= $data['url'] ?>" target="_blank" class="uk-button uk-button-default"><span class="uk-icon uk-icon-twitter tm-icon-twitter"></span> Twitter Share</a>
        </div>
        <div>
            <a href="https://plus.google.com/share?url=<?= $data['url'] ?>" target="_blank" class="uk-button uk-button-default"><span class="uk-icon uk-icon-google-plus tm-icon-google"></span> Google + Share</a>
        </div>
    </div>
</section>
