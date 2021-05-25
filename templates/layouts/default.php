<?php
$app_head = include_template('components/app_head.inc.php', [
    'meta' => [
        'title' => $meta['title']
    ]
]);
$app_icons = include_template('components/app_icons.inc.php');
$app_header = include_template('components/app_header.inc.php', [
    'is_auth' => $is_auth,
    'user_name' => $user_name
]);
$app_scripts = include_template('components/app_scripts.inc.php');
$app_footer = include_template('components/app_footer.inc.php');
?>

<!DOCTYPE html>
<html lang="ru">
<?= $app_head ?>
<body class="page">
<?= $app_icons ?>
<?= $app_header ?>
<section class="page__main page__main--popular">
    <?= $content ?>
</section>
<?= $app_footer ?>
<?= $app_scripts ?>
</body>
</html>
