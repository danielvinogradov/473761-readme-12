<div class="popular__filters-wrapper">
    <?php echo include_template('components/popular_sorting.inc.php') ?>
    <?php echo include_template('components/popular_filters_content_types.inc.php', ['content_types' => $content_types, 'content_type_active' => $content_type_active]) ?>
</div>
