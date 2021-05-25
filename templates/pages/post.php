<main class="page__main page__main--publication">
    <div class="container">
        <h1 class="page__title page__title--publication"><?= $post['title'] ?></h1>
        <section class="post-details">
            <h2 class="visually-hidden">Публикация</h2>
            <div class="post-details__wrapper post-photo">
                <div class="post-details__main-block post post--details">

                    <?php
                    if ($post['class_name'] === 'photo') {
                        echo include_template('components/post_image_single.inc.php', ['image_uri' => $post['image_uri']]);
                    } else if ($post['class_name'] === 'link') {
                        echo include_template('components/post_link_single.inc.php', ['link' => $post['link'], 'title' => $post['title']]);
                    } else if ($post['class_name'] === 'quote') {
                        echo include_template('components/post_quote_single.inc.php', ['body' => $post['body'], 'cite_author' => $post['cite_author']]);
                    } else if ($post['class_name'] === 'text') {
                        echo include_template('components/post_text_single.inc.php', ['body' => $post['body']]);
                    } else if ($post['class_name'] === 'video') {
                        echo include_template('components/post_video_single.inc.php', ['video_url' => $post['video_url']]);
                    }
                    ?>

                    <?= include_template('components/post_indicators.php'); ?>
                    <?= include_template('components/post_tags.inc.php'); ?>
                    <?= include_template('components/post_comments.inc.php'); ?>

                </div>

                <?= include_template('components/post_single_author.inc.php'); ?>

            </div>
        </section>
    </div>
</main>
<?php
