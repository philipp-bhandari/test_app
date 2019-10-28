<?php
function is_palindrome($text_arr, $left_border, $right_border) {
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

    for($left_border = 0; $left_border < $text_len; ++$left_border){
        for($right_border = $left_border + 1; $right_border < $text_len; ++$right_border){
            if(is_palindrome($text_arr, $left_border, $right_border)){

                $offset = count(range($left_border, $right_border));
                $returned_data['pals'][] = implode(array_slice($text_arr, $left_border, $offset));
                ++$returned_data['count'];

            }
        }
    }
    return $returned_data;
}
