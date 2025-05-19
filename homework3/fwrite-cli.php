<?php

$address = 'birthdays.txt';

$name = readline("Введите имя: ");
$date = readline("Введите дату рождения в формате ДД-ММ-ГГГГ: ");

if (validate($date)) {
    $data = $name . ", " . $date . "\r\n";

    $fileHandler = fopen($address, 'a');

    if (fwrite($fileHandler, $data)) {
        echo "Запись $data добавлена в файл $address\n";
    } else {
        echo "Произошла ошибка записи. Данные не сохранены\n";
    }

    fclose($fileHandler);
} else {
    echo "Введена некорректная информация\n";
}

// Функция для валидации даты
function validate(string $date): bool {
    $dateBlocks = explode("-", $date);

    // Проверка на наличие трех частей
    if (count($dateBlocks) !== 3) {
        return false;
    }

    // Проверка, что все части являются числами
    foreach ($dateBlocks as $block) {
        if (!is_numeric($block)) {
            return false;
        }
    }

    $day = (int)$dateBlocks[0];
    $month = (int)$dateBlocks[1];
    $year = (int)$dateBlocks[2];

    // Проверка на корректность дня, месяца и года
    if ($day < 1 || $day > 31 || $month < 1 || $month > 12 || $year < 1900 || $year > date('Y')) {
        return false;
    }

    // Дополнительная проверка на количество дней в месяце
    if (in_array($month, [4, 6, 9, 11]) && $day > 30) {
        return false;
    }
    if ($month == 2) {
        // Проверка на високосный год
        $isLeapYear = ($year % 4 == 0 && $year % 100 != 0) || ($year % 400 == 0);
        if ($day > ($isLeapYear ? 29 : 28)) {
            return false;
        }
    }

    return true;
}

// Функция для поиска дней рождения
function findBirthdaysToday($address) {
    $today = date('d-m');
    $fileHandler = fopen($address, 'r');
    $found = false;

    while (($line = fgets($fileHandler)) !== false) {
        $data = explode(", ", trim($line));
        if (count($data) === 2) {
            $date = explode("-", $data[1]);
            if (count($date) === 3 && $today === "{$date[0]}-{$date[1]}") {
                echo "Поздравляем с днем рождения: {$data[0]}!\n";
                $found = true;
            }
        }
    }

    if (!$found) {
        echo "Сегодня нет дней рождения.\n";
    }

    fclose($fileHandler);
}

// Функция для удаления записи
function deleteEntry($address, $searchTerm) {
    $fileHandler = fopen($address, 'r');
    $lines = [];
    $found = false;

    while (($line = fgets($fileHandler)) !== false) {
        if (strpos($line, $searchTerm) === false) {
            $lines[] = $line; // Сохраняем строки, которые не соответствуют критериям
        } else {
            $found = true; // Найдена строка для удаления
        }
    }

    fclose($fileHandler);

    // Записываем обратно только те строки, которые остались
    $fileHandler = fopen($address, 'w');
    foreach ($lines as $line) {
        fwrite($fileHandler, $line);
    }
    fclose($fileHandler);

    if ($found) {
        echo "Запись с '{$searchTerm}' успешно удалена.\n";
    } else {
        echo "Запись с '{$searchTerm}' не найдена.\n";
    }
}

// Пример использования функции поиска
findBirthdaysToday($address);

// Запрос на удаление записи
$searchTerm = readline("Введите имя или дату для удаления записи: ");
deleteEntry($address, $searchTerm);
