<?php
function is_palindrome($text_arr, $left_border, $right_border) {

    // Перебираем левую и правую границы слова, если они не равны - значит это не палиндром

    while($left_border <= $right_border) {
        if($text_arr[$left_border] != $text_arr[$right_border]) {
            return false;
        }
        ++$left_border;
        --$right_border;
    }
    return true;
}

function get_pals($text_arr) {
    $text_len = count($text_arr);

    $returned_data = [
        'count' => 0,
        'pals'  => []
    ];

    // Перебираем символы по очереди, для каждого символа справа вызываем функцию is_palindrome для проверки

    for($left_border = 0; $left_border < $text_len; ++$left_border){
        for($right_border = $left_border + 1; $right_border < $text_len; ++$right_border){
            if(is_palindrome($text_arr, $left_border, $right_border)){

                // Вычисляем смещение чтобы отрезать палиндром
                $offset = count(range($left_border, $right_border));

                // Отрезаем часть массива, преобразуем в строку и добавляем палиндром в ключ pals
                $returned_data['pals'][] = implode(array_slice($text_arr, $left_border, $offset));
                ++$returned_data['count'];

            }
        }
    }
    return $returned_data;
}
