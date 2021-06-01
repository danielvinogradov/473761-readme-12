<?php
require_once('config/config.php');
require_once('helpers.php');
require_once('utils/cut_string.php');
require_once('utils/format_post_date.php');
require_once('mock/is_auth.php');
require_once('mock/user_name.php');

require_once('models/get_post_by_id.php');
require_once('models/get_author_by_id.php');
require_once('models/get_hashtags_by_post_id.php');

$db_con = mysqli_connect(getenv('DB_HOST'), getenv('DB_USER'), getenv('DB_PASSWORD'), getenv('DB_NAME'));
mysqli_set_charset($db_con, 'utf8');

$post_id = $_GET['post_id'] ?? null;

// Если параметра post_id не существует, то выполняем какую-то логику.
if (!$post_id) {
    http_response_code(404);
    print('<p>Error 404;</p>');
    return;
}

$post_data = get_post_by_id($db_con, $post_id);

// Если запрос выполнился корректно, но $post_data – пустой массив,
// то возвращаем 404, дальше исполнять скрипт не имеет смысла.
if (is_array($post_data) && count($post_data) === 0) {
    http_response_code(404);
    print('<p>Error 404;</p>');
    return;
}

$author_data = get_author_by_id($db_con, $post_data[0]['author_id']);
$hashtags = get_hashtags_by_post_id($db_con, $post_data[0]['id']);

$page_content_options = [
    'post' => $post_data[0],
    'author' => $author_data[0],
    'hashtags' => $hashtags,
];

/**
 * Строка с контентом страницы. Что внутри <main>.
 * @return string
 */
$page_content = include_template('pages/post.php', $page_content_options);

$layout_content_options = [
    'meta' => [
        'title' => 'readme: пост',
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
