<div class="post__author">
    <a class="post__author-link" href="#" title="Автор">
        <div class="post__avatar-wrapper">
            <!--укажите путь к файлу аватара-->
            <img class="post__author-avatar" src="img/<?= $avatar_uri ?>"
                 alt="Аватар пользователя">
        </div>
        <div class="post__info">
            <b class="post__author-name"><?= htmlspecialchars($username) ?></b>
            <?php $date = $date_created; ?>
            <time class="post__time" datetime="<?= $date ?>"
                  title="<?= format_post_date($date) ?>">
                <?= format_post_date($date, 'text') ?>
            </time>
        </div>
    </a>
</div>
