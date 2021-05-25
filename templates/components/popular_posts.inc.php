<div class="popular__posts">
    <?php foreach ($posts as $post_id => $post): ?>
        <article class="popular__post post post-<?= $post['type'] ?>">
            <header class="post__header">
                <h2><?= htmlspecialchars($post['title']) ?></h2>
            </header>
            <div class="post__main">
                <!--здесь содержимое карточки-->
                <?php if ($post['type'] === 'quote'): ?>
                    <?php echo include_template('components/post_quote.inc.php', ['body' => $post['body'], 'cite_author' => $post['cite_author']]); ?>

                <?php elseif ($post['type'] === 'link'): ?>
                    <?php echo include_template('components/post_link.inc.php', ['link' => $post['link'], 'title' => $post['title']]); ?>

                <?php elseif ($post['type'] === 'text'): ?>
                    <?php echo include_template('components/post_text.inc.php', ['body' => $post['body']]); ?>

                <?php elseif ($post['type'] === 'photo'): ?>
                    <?php echo include_template('components/post_photo.inc.php', ['image_uri' => $post['image_uri']]); ?>

                <?php elseif ($post['type'] === 'video'): ?>
                    <?php echo include_template('components/post_video.inc.php', ['video_url' => $post['video_url']]); ?>

                <?php endif; ?>

            </div>
            <footer class="post__footer">
                <?php echo include_template('components/post_author.inc.php', ['avatar_uri' => $post['avatar_uri'], 'username' => $post['username'], 'date_created' => $post['date_created']]); ?>
                <?php echo include_template('components/post_indicators.inc.php'); ?>
            </footer>
        </article>
    <?php endforeach; ?>
</div>
