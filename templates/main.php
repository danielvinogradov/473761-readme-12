<div class="container">
    <h1 class="page__title page__title--popular">Популярное</h1>
</div>
<div class="popular container">
    <div class="popular__filters-wrapper">
        <div class="popular__sorting sorting">
            <b class="popular__sorting-caption sorting__caption">Сортировка:</b>
            <ul class="popular__sorting-list sorting__list">
                <li class="sorting__item sorting__item--popular">
                    <a class="sorting__link sorting__link--active" href="#">
                        <span>Популярность</span>
                        <svg class="sorting__icon" width="10" height="12">
                            <use xlink:href="#icon-sort"></use>
                        </svg>
                    </a>
                </li>
                <li class="sorting__item">
                    <a class="sorting__link" href="#">
                        <span>Лайки</span>
                        <svg class="sorting__icon" width="10" height="12">
                            <use xlink:href="#icon-sort"></use>
                        </svg>
                    </a>
                </li>
                <li class="sorting__item">
                    <a class="sorting__link" href="#">
                        <span>Дата</span>
                        <svg class="sorting__icon" width="10" height="12">
                            <use xlink:href="#icon-sort"></use>
                        </svg>
                    </a>
                </li>
            </ul>
        </div>
        <?php require_once('components/popular_filters_content_types.php') ?>
    </div>
    <?php if (is_array($posts)): ?>
        <div class="popular__posts">
            <?php foreach ($posts as $post_id => $post): ?>
                <article class="popular__post post post-<?= $post['type'] ?>">
                    <header class="post__header">
                        <h2><?= htmlspecialchars($post['title']) ?></h2>
                    </header>
                    <div class="post__main">
                        <!--здесь содержимое карточки-->
                        <?php if ($post['type'] === 'quote'): ?>
                            <!--содержимое для поста-цитаты-->
                            <blockquote>
                                <p>
                                    <?= htmlspecialchars($post['body']) ?>
                                </p>
                                <cite><?= htmlspecialchars($post['cite_author']) ?></cite>
                            </blockquote>

                        <?php elseif ($post['type'] === 'link'): ?>
                            <!--содержимое для поста-ссылки-->
                            <div class="post-link__wrapper">
                                <a class="post-link__external" href="https://<?= $post['link']; ?>"
                                   title="Перейти по ссылке">
                                    <div class="post-link__info-wrapper">
                                        <div class="post-link__icon-wrapper">
                                            <img src="https://www.google.com/s2/favicons?domain=vitadental.ru"
                                                 alt="Иконка">
                                        </div>
                                        <div class="post-link__info">
                                            <h3><?= htmlspecialchars($post['title']) ?></h3>
                                        </div>
                                    </div>
                                    <span><?= htmlspecialchars($post['link']) ?></span>
                                </a>
                            </div>

                        <?php elseif ($post['type'] === 'text'): ?>
                            <!--содержимое для поста-текста-->
                            <p><?= htmlspecialchars(cut_string($post['body'])) ?></p>
                            <?php if (htmlspecialchars(cut_string($post['body'])) !== htmlspecialchars($post['body'])): ?>
                                <div class="post-text__more-link-wrapper">
                                    <a class="post-text__more-link" href="#">Читать далее</a>
                                </div>
                            <?php endif; ?>

                        <?php elseif ($post['type'] === 'photo'): ?>
                            <!--содержимое для поста-фото-->
                            <div class="post-photo__image-wrapper">
                                <img src="img/<?= htmlspecialchars($post['image_uri']) ?>" alt="Фото от пользователя"
                                     width="360"
                                     height="240">
                            </div>

                        <?php elseif ($post['type'] === 'video'): ?>
                            <!--содержимое для поста-видео-->
                            <div class="post-video__block">
                                <div class="post-video__preview">
                                    <?= embed_youtube_cover($post['video_url']); ?>
                                    <img src="img/coast-medium.jpg" alt="Превью к видео" width="360" height="188">
                                </div>
                                <a href="post-details.html" class="post-video__play-big button">
                                    <svg class="post-video__play-big-icon" width="14" height="14">
                                        <use xlink:href="#icon-video-play-big"></use>
                                    </svg>
                                    <span class="visually-hidden">Запустить проигрыватель</span>
                                </a>
                            </div>

                        <?php endif; ?>

                    </div>
                    <footer class="post__footer">
                        <div class="post__author">
                            <a class="post__author-link" href="#" title="Автор">
                                <div class="post__avatar-wrapper">
                                    <!--укажите путь к файлу аватара-->
                                    <img class="post__author-avatar" src="img/<?= $post['avatar_uri'] ?>"
                                         alt="Аватар пользователя">
                                </div>
                                <div class="post__info">
                                    <b class="post__author-name"><?= htmlspecialchars($post['username']) ?></b>
                                    <?php $date = $post['date_created']; ?>
                                    <time class="post__time" datetime="<?= $date ?>"
                                          title="<?= format_post_date($date) ?>">
                                        <?= format_post_date($date, 'text') ?>
                                    </time>
                                </div>
                            </a>
                        </div>
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
                                    <span>0</span>
                                    <span class="visually-hidden">количество лайков</span>
                                </a>
                                <a class="post__indicator post__indicator--comments button" href="#"
                                   title="Комментарии">
                                    <svg class="post__indicator-icon" width="19" height="17">
                                        <use xlink:href="#icon-comment"></use>
                                    </svg>
                                    <span>0</span>
                                    <span class="visually-hidden">количество комментариев</span>
                                </a>
                            </div>
                        </div>
                    </footer>
                </article>
            <?php endforeach; ?>
        </div>
    <?php else: ?>
        <p>Произошла ошибка, попробуйте перезагрузить страницу.</p>
    <?php endif; ?>
</div>
