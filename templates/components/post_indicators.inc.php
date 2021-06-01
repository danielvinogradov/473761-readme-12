<div class="post__indicators">
    <div class="post__buttons">
        <a class="post__indicator post__indicator--likes button" href="#" title="Лайк">
            <svg class="post__indicator-icon" width="20" height="17">
                <use xlink:href="#icon-heart"></use>
            </svg>
            <svg class="post__indicator-icon post__indicator-icon--like-active" width="20"
                 height="17">
                <use xlink:href="#icon-heart-active"></use>
            </svg>
            <span><?= $likes_count ?></span>
            <span class="visually-hidden">количество лайков</span>
        </a>
        <a class="post__indicator post__indicator--comments button" href="#"
           title="Комментарии">
            <svg class="post__indicator-icon" width="19" height="17">
                <use xlink:href="#icon-comment"></use>
            </svg>
            <span><?= $comments_count ?></span>
            <span class="visually-hidden">количество комментариев</span>
        </a>
        <a class="post__indicator post__indicator--repost button" href="#" title="Репост">
            <svg class="post__indicator-icon" width="19" height="17">
                <use xlink:href="#icon-repost"></use>
            </svg>
            <span><?= $reposts_count ?></span>
            <span class="visually-hidden">количество репостов</span>
        </a>
    </div>
    <span class="post__view">
        <?php
        $noun = get_noun_plural_form($views_count, 'просмотр', 'просмотра', 'просмотров');
        echo "$views_count $noun";
        ?>
    </span>
</div>
