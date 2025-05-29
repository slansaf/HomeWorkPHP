<?php
class Library {
    private $books = []; // Массив для хранения книг

    // Метод для добавления книги в библиотеку
    public function addBook(Book $book) {
        $this->books[] = $book;
    }

    // Метод для получения книги по ISBN
    public function getBookByISBN($isbn) {
        foreach ($this->books as $book) {
            if ($book->getISBN() === $isbn) {
                return $book;
            }
        }
        return null; // Если книга не найдена
    }

    // Метод для получения всех книг
    public function getAllBooks() {
        return $this->books;
    }

    // Метод для получения статистики по прочтениям
    public function getReadStatistics() {
        $statistics = [];
        foreach ($this->books as $book) {
            $statistics[$book->getTitle()] = $book->getReadCount();
        }
        return $statistics;
    }
}
