<?php
require_once('helpers.php');

/**
 * Функция форматирования даты для карточки постов.
 * Если $type === 'default', то вернет дату в формате 'дд.мм.гггг чч:мм'
 * Если $type === 'text', то вернет текстовое представление в формате '<int> минут|часов|дней|недель|месяцев назад'
 * @param string $date - Дата в формате «ГГГГ-ММ-ДД ЧЧ: ММ: СС»
 * @param string $type – Тип форматирования: default или text
 * @return string
 */
function format_post_date(string $date, string $type = 'default'): string
{
    if ($type === 'default') {
        $format = 'd.m.Y H:i'; // дд.мм.гггг чч:мм
        return date($format);
    } elseif ($type === 'text') {
        $now_timestamp = time(); // timestamp текущего момента
        $target_timestamp = strtotime($date); // timestamp даты из параметров
        $diff_in_seconds = $now_timestamp - $target_timestamp; // разница в секундах
        $diff_in_hours = $diff_in_seconds / (60 ** 2); // разница в часах

        if ($diff_in_hours > (24 * 7 * 5)) { // прошло больше 5 недель
            $num = floor($diff_in_hours / 24 / 7 / 4);
            $plural_form = get_noun_plural_form($num, 'месяц', 'месяца', 'месяцев');
        } elseif ($diff_in_hours > (24 * 7)) { // прошло больше 7 дней
            $num = floor($diff_in_hours / 24 / 7);
            $plural_form = get_noun_plural_form($num, 'неделя', 'недели', 'недель');
        } elseif ($diff_in_hours > 24) { // прошло больше 24 часов
            $num = floor($diff_in_hours / 24);
            $plural_form = get_noun_plural_form($num, 'день', 'дня', 'дней');
        } elseif ($diff_in_hours > 1) { // прошло больше часа
            $num = floor($diff_in_hours);
            $plural_form = get_noun_plural_form($num, 'час', 'часа', 'часов');
        } else { // во всех остальных случаях (прошло меньше часа)
            $num = floor($diff_in_seconds / 60);
            $plural_form = get_noun_plural_form($num, 'минута', 'минуты', 'минут');
        }

        return "{$num} {$plural_form} назад";
    }
}
