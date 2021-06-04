<?php
/**
 * Получить отдельный пост по ID
 * @param $connection
 * @param $post_id
 * @return bool|mixed|mysqli_result|null
 */
function get_post_by_id($connection, $post_id)
{
    $sql = '
    SELECT
       p.id,
       p.date_created,
       p.title,
       p.body,
       p.cite_author,
       p.image_uri,
       p.video_url,
       p.link,
       p.views_count,
       p.author_id,
       p.content_type_id,
       ct.class_name,
       COUNT(l.id) AS likes_count,
       COUNT(c.id) AS comments_count
            FROM posts p
                INNER JOIN content_type ct on p.content_type_id = ct.id
                LEFT JOIN likes l on p.id = l.post_id
                LEFT JOIN comments c on p.id = c.post_id
            WHERE p.id = ?
            GROUP BY p.id
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
