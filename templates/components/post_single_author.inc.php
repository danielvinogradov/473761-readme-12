<div class="post-details__user user">
    <div class="post-details__user-info user__info">
        <div class="post-details__avatar user__avatar">
            <a class="post-details__avatar-link user__avatar-link" href="#">
                <img class="post-details__picture user__picture" src="../img/<?= $author['avatar_uri'] ?>"
                     alt="Аватар пользователя">
            </a>
        </div>
        <div class="post-details__name-wrapper user__name-wrapper">
            <a class="post-details__name user__name" href="#">
                <span><?= $author['name'] ?></span>
            </a>
            <?php
            $date = new DateTime($author['registration_date']);
            $date_string = $date->format('Y-m-d H:i:s');
            $formatted_date = format_post_date($date_string, 'text');
            ?>
            <time class="post-details__time user__time" datetime="<?= $date_string ?>">
                <?= $formatted_date ?>
            </time>
        </div>
    </div>
    <div class="post-details__rating user__rating">
        <p class="post-details__rating-item user__rating-item user__rating-item--subscribers">
            <?php $subscribers_count = $author['subscribers_count'] ?>
            <span class="post-details__rating-amount user__rating-amount">
                <?= $subscribers_count ?>
            </span>
            <span class="post-details__rating-text user__rating-text">
                <?= get_noun_plural_form($subscribers_count, 'подписчик', 'подписчика', 'подписчиков') ?>
            </span>
        </p>
        <p class="post-details__rating-item user__rating-item user__rating-item--publications">
            <?php $posts_count = $author['posts_count'] ?>
            <span class="post-details__rating-amount user__rating-amount">
                <?= $posts_count ?>
            </span>
            <span class="post-details__rating-text user__rating-text">
                <?= get_noun_plural_form($posts_count, 'публикация', 'публикации', 'публикаций') ?>
            </span>
        </p>
    </div>
    <div class="post-details__user-buttons user__buttons">
        <button class="user__button user__button--subscription button button--main" type="button">
            Подписаться
        </button>
        <a class="user__button user__button--writing button button--green" href="#">Сообщение</a>
    </div>
</div>
