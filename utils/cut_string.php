<?php
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
