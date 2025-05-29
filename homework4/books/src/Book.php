<?php
 abstract class Book {
    protected string $title;       
    protected string $author;      
    protected string $isbn;        
    protected int $readCount;   

    public function __construct($title, $author, $isbn) {
        $this->title = $title;
        $this->author = $author;
        $this->isbn = $isbn;
        $this->readCount = 0;
    }

    public function getISBN() {
        return $this->isbn;
    }

    public function getTitle() {
        return $this->title;
    }

    public function getAuthor() {
        return $this->author;
    }

    public function incrementReadCount() {
        $this->readCount++;
    }

    public function getReadCount() {
        return $this->readCount;
    }
}
