<?php echo include_template('components/app_title.inc.php', ['class_name' => 'popular', 'title' => 'Популярное']); ?>
<div class="popular container">
    <?php
    echo include_template('components/popular_filters.inc.php', ['content_types' => $content_types, 'content_type_active' => $content_type_active]);
    if (is_array($posts) && count($posts) > 0) {
        echo include_template('components/popular_posts.inc.php', ['posts' => $posts]);
    } else if (count($posts) === 0) {
        echo '<p>В этой категории ничего не найдено.</p>';
    } else {
        echo '<p>Произошла ошибка, попробуйте перезагрузить страницу.</p>';
    }
    ?>
</div>
