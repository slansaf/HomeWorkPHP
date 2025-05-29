<?php
class PhysicalBook extends Book {
    private $libraryAddress; // Адрес библиотеки

    public function __construct($title, $author, $isbn, $libraryAddress) {
        parent::__construct($title, $author, $isbn);
        $this->libraryAddress = $libraryAddress;
    }

    public function getLibraryAddress() {
        return $this->libraryAddress;
    }

    public function getHandout() {
        return "Адрес библиотеки: " . $this->libraryAddress;
    }
}