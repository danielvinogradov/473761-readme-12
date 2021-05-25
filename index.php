<?php
require_once('config.php');
require_once('helpers.php');
require_once('utils/cut_string.php');
require_once('utils/format_post_date.php');
require_once('mock/is_auth.php');
require_once('mock/user_name.php');

require_once('models/get_content_types.php');
require_once('models/get_popular_posts.php');

$content_type_active = $_GET['content_type'] ?? 'any';

$db_con = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
mysqli_set_charset($db_con, "utf8");
$content_types = get_content_types($db_con);
$content_type_valid = in_array($content_type_active, array_map(fn($cv) => $cv['class_name'], $content_types));
if (!$content_type_valid) {
    $content_type_active = 'any';
    $_GET['content_type'] = 'any';
}

$popular_posts = get_popular_posts($db_con, $content_type_active);

$page_content_options = [
    'content_types' => $content_types,
    'content_type_active' => $content_type_active,
    'posts' => $popular_posts,
];


/**
 * Строка с контентом страницы. Что внутри <main>.
 * @return string
 */
$page_content = include_template('pages/main.php', $page_content_options);

$layout_content_options = [
    'meta' => [
        'title' => 'readme: популярное',
    ],
    'content' => $page_content,
    'is_auth' => $is_auth,
    'user_name' => $user_name,
];

/**
 * Все содержимое страницы с layout
 * @return string
 */
$layout_content = include_template('layouts/default.php', $layout_content_options);

print($layout_content);
