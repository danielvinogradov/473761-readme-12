<?php
/**
 * Получить информацию об авторе поста.
 * Возвращает имя, аватар, дату регистрации, кол-во подписчиков и кол-во постов
 * @param $connection
 * @param int $user_id
 * @return array|false|mysqli_result|null
 */
function get_author_by_id($connection, int $user_id)
{
    $sql = '
    SELECT u.name,
       u.registration_date,
       u.avatar_uri,
       COUNT(p.id)            AS posts_count,
       COUNT(s.subscriber_id) AS subscribers_count
    FROM users u
         LEFT JOIN posts p on u.id = p.author_id
         LEFT JOIN subscriptions s on u.id = s.subscriber_id
    WHERE u.id = ?
    GROUP BY u.id
    ';

    $stmt = mysqli_prepare($connection, $sql);
    mysqli_stmt_bind_param($stmt, 'i', $user_id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if (!$result) {
        return $result;
    }

    return mysqli_fetch_all($result, MYSQLI_ASSOC);
}
