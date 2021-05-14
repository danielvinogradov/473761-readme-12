<?php
require_once('config.php');
require_once('helpers.php');
require_once('utils/cut_string.php');
require_once('mock/popular_posts.php');
require_once('mock/is_auth.php');
require_once('mock/user_name.php');


$page_content_options = [
    'posts' => $popular_posts,
];

/**
 * Строка с контентом страницы. Что внутри <main>.
 * @return string
 */
$page_content = include_template('main.php', $page_content_options);

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
$layout_content = include_template('layout.php', $layout_content_options);

print($layout_content);
