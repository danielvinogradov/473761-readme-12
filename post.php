<?php
require_once('config/config.php');
require_once('helpers.php');
require_once('utils/cut_string.php');
require_once('utils/format_post_date.php');
require_once('mock/is_auth.php');
require_once('mock/user_name.php');

require_once('models/get_post_by_id.php');

$db_con = mysqli_connect(getenv('DB_HOST'), getenv('DB_USER'), getenv('DB_PASSWORD'), getenv('DB_NAME'));
mysqli_set_charset($db_con, 'utf8');

$post_id = $_GET['post_id'];
$post_data = get_post_by_id($db_con, $post_id);

$page_content_options = [
    'post' => $post_data
];

//!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
//Если параметр запроса отсутствует, либо если по этому ID не нашли ни одной записи, то вместо содержимого страницы возвращать код ответа 404.

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
