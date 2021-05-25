<?php
/**
 * Получить список категорий.
 * @param $connection
 * @return array|bool|mysqli_result|null
 */
function get_content_types($connection)
{
    $sql = 'SELECT name, class_name FROM content_type';
    $result = mysqli_query($connection, $sql);

    if (!$result) return $result;
    return mysqli_fetch_all($result, MYSQLI_ASSOC);
}
