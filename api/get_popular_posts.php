<?php
/**
 * Получить список популярных постов.
 * @param $connection
 * @return array|bool|mysqli_result|null
 */
function get_popular_posts($connection)
{
    $sql = 'SELECT p.*, ct.name AS content_type_name, ct.class_name AS type, u.name AS username, u.avatar_uri AS avatar_uri FROM posts p INNER JOIN users u on p.author_id = u.id INNER JOIN content_type ct on p.content_type_id = ct.id ORDER BY p.views_count;';
    $result = mysqli_query($connection, $sql);

    if (!$result) return $result;
    return mysqli_fetch_all($result, MYSQLI_ASSOC);
}
