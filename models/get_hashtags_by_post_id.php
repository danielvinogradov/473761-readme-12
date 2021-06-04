<?php
/**
 * Получает массив хэштегов по id поста
 * @param $connection
 * @param int $post_id
 * @return array|false|mysqli_result|null
 */
function get_hashtags_by_post_id($connection, int $post_id)
{
    $sql = '
    SELECT h.name
    FROM hashtags h
    WHERE h.id IN (SELECT hashtag_id FROM posts_hashtags WHERE post_id = ?);
    ';

    $stmt = mysqli_prepare($connection, $sql);
    mysqli_stmt_bind_param($stmt, 'i', $post_id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if (!$result) {
        return $result;
    }

    return mysqli_fetch_all($result, MYSQLI_ASSOC);
}
