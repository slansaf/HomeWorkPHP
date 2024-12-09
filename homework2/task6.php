<?php 
/*Написать функцию, которая вычисляет текущее время и возвращает его в формате с правильными склонениями, например:
22 часа 15 минут
21 час 43 минуты.*/

function getCurrentTimeWithDeclension() {

    $currentTime = new DateTime();
    $hours = $currentTime->format('H');
    $minutes = $currentTime->format('i');

    $hourDeclension = getHourDeclension($hours);

    $minuteDeclension = getMinuteDeclension($minutes);

    return "$hours $hourDeclension $minutes $minuteDeclension \n";
}

function getHourDeclension($hours) {
    if ($hours % 10 == 1 && $hours % 100 != 11) {
        return 'час';
    } elseif ($hours % 10 >= 2 && $hours % 10 <= 4 && ($hours % 100 < 10 || $hours % 100 >= 20)) {
        return 'часа';
    } else {
        return 'часов';
    }
}

function getMinuteDeclension($minutes) {
    if ($minutes % 10 == 1 && $minutes % 100 != 11) {
        return 'минута';
    } elseif ($minutes % 10 >= 2 && $minutes % 10 <= 4 && ($minutes % 100 < 10 || $minutes % 100 >= 20)) {
        return 'минуты';
    } else {
        return 'минут';
    }
}

// Пример использования
echo getCurrentTimeWithDeclension();
