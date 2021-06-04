<?php
/**
 * Получить список популярных постов.
 * @param $connection
 * @return array|bool|mysqli_result|null
 */
function get_popular_posts($connection, $content_type = 'any')
{
    $sql = 'SELECT p.*, ct.name AS content_type_name, ct.class_name AS type, u.name AS username, u.avatar_uri AS avatar_uri';
    $sql .= ' FROM posts p';
    $sql .= ' INNER JOIN users u on p.author_id = u.id';
    $sql .= ' INNER JOIN content_type ct on p.content_type_id = ct.id';
    if ($content_type !== 'any') {
        $sql .= " WHERE ct.class_name = '$content_type'";
    }
    $sql .= ' ORDER BY p.views_count';

    $result = mysqli_query($connection, $sql);

    if (!$result) return $result;
    return mysqli_fetch_all($result, MYSQLI_ASSOC);
}
