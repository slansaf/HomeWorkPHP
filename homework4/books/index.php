<?php
require 'vendor/autoload.php'; // Подключаем автозагрузчик Composer

use Monolog\Logger;
use Monolog\Handler\StreamHandler;

// Создаем логгер
$log = new Logger('name');
$log->pushHandler(new StreamHandler('app.log', Logger::WARNING));

// Добавляем записи в лог
$log->warning('Это предупреждение!');
$log->error('Это ошибка!');

// Ваш код для работы с книгами
require 'src/Book.php';
require 'src/EBook.php';
require 'src/PhysicalBook.php';
require 'src/Library.php';

$library = new Library();

// Пример добавления книг
$book1 = new PhysicalBook("1984", "George Orwell", "1234567890", "Библиотека №1");
$book2 = new EBook("The Great Gatsby", "F. Scott Fitzgerald", "0987654321", "http://example.com/download");

$library->addBook($book1);
$library->addBook($book2);

// Вывод информации о книгах
foreach ($library->getAllBooks() as $book) {
    echo "Книга: " . $book->getTitle() . " автор: " . $book->getAuthor() . "\n";
}
