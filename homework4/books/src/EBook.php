<?php

class EBook extends Book {
    private $downloadLink; // Ссылка на скачивание

    public function __construct($title, $author, $isbn, $downloadLink) {
        parent::__construct($title, $author, $isbn);
        $this->downloadLink = $downloadLink;
    }

    public function getDownloadLink() {
        return $this->downloadLink;
    }

    public function getHandout() {
        return "Ссылка на скачивание: " . $this->downloadLink;
    }
}