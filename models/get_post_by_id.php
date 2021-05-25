<?php
/**
 * Получить отдельный пост по ID
 * @param $connection
 * @param $post_id
 * @return bool|mixed|mysqli_result|null
 */
function get_post_by_id($connection, $post_id)
{
    $sql = 'SELECT * FROM posts p';
    $sql .= ' INNER JOIN content_type ct on p.content_type_id = ct.id';
    $sql .= " WHERE p.id = $post_id";
    $result = mysqli_query($connection, $sql);

    if (!$result) {
        return $result;
    }

    return mysqli_fetch_all($result, MYSQLI_ASSOC)[0];
}
