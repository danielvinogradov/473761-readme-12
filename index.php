<?php
$is_auth = rand(0, 1);

/**
 * Захардкоженное имя пользователя.
 * @global string $GLOBALS ['user_name']
 * @name $user_name
 */
$user_name = 'Данил';

/**
 * Популярные посты.
 * @global array[] $GLOBALS ['popular_posts']
 * @name $popular_posts
 */
$popular_posts = [
    [
        'title' => 'Цитата',
        'type' => 'post-quote',
        'content' => 'Мы в жизни любим только раз, а после ищем лишь похожих',
        'username' => 'Лариса',
        'avatar' => 'userpic-larisa-small.jpg',
    ],
    [
        'title' => 'Игра престолов',
        'type' => 'post-text',
        'content' => 'Не могу дождаться начала финального сезона своего любимого сериала!',
        'username' => 'Владик',
        'avatar' => 'userpic.jpg',
    ],
    [
        'title' => 'Наконец, обработал фотки!',
        'type' => 'post-photo',
        'content' => 'rock-medium.jpg',
        'username' => 'Виктор',
        'avatar' => 'userpic-mark.jpg',
    ],
    [
        'title' => 'Моя мечта',
        'type' => 'post-photo',
        'content' => 'coast-medium.jpg',
        'username' => 'Лариса',
        'avatar' => 'userpic-larisa-small.jpg',
    ],
    [
        'title' => 'Лучшие курсы',
        'type' => 'post-link',
        'content' => 'www.htmlacademy.ru',
        'username' => 'Владик',
        'avatar' => 'userpic.jpg',
    ],
];

/**
 * Функция для обрезания строки до заданного значения и добавления многоточия.
 * Если длина строки не превышает заданный максимум, то возвращается сама строка.
 * @param string $str
 * @param int $max_length
 * @return string
 */
function cut_string(string $str, int $max_length = 300): string
{
    if (mb_strlen($str) > $max_length) {
        $s = mb_strcut($str, 0, $max_length);
        return mb_strrchr($s, ' ', true) . '...';
    }

    return $str;
}

require_once ('helpers.php');

$page_content = include_template('main.php', ['posts' => $popular_posts]);

$layout_content_options = [
    'meta' => [
        'title' => 'readme: популярное',
    ],
    'content' => $page_content,
    'is_auth' => $is_auth,
    'user_name' => $user_name,
];
$layout_content = include_template('layout.php', $layout_content_options);

print($layout_content);
