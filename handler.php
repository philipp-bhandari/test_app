<?php
require 'functions.php';
$regex = '/[^a-zа-яё\d]/ui';

if(isset($_POST['word'])) {
    $text = $_POST['word'];

    // Удаляем символы и приводим строку в нижний регистр
    $no_symbols_str = mb_strtolower(preg_replace($regex,'', $text));

    // Разбиваем строку в массив
    $text_arr = preg_split("//u", $no_symbols_str, -1, PREG_SPLIT_NO_EMPTY);

    // Получаем данные для отправки
    $data = get_pals($text_arr);

    // Отвечаем на запрос
    echo json_encode($data);
}