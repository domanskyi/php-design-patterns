<?php

class Book
{
    private $title;

    public function __construct(string $t) {
        $this->title = $t;
    }

    public function getTitle() {
        return $this->title;
    }
}

class BookShelf
{
    private $books = [];

    private $currentIndex = 0;

    public function addBook(Book $book) {
        $this->books[] = $book;
    }

    public function removeBook(Book $removedBook) {
        // ... some code to remove book
    }

    public function count() {
        return count($this->books);
    }

    public function current() {
        return $this->books[$this->currentIndex];
    }

    public function key() {
        return $this->currentIndex;
    }

    public function next() {
        $this->currentIndex++;
    }

    public function rewind() {
        $this->currentIndex = 0;
    }

    public function valid() {
        return isset($this->books[$this->currentIndex]);
    }
}

$shelf = new BookShelf;
$shelf->addBook(new Book('Harry Potter'));
$shelf->addBook(new Book('Clockwork Orange'));

echo $shelf->current()->getTitle(); //Harry Potter

$shelf->next();
echo $shelf->current()->getTitle(); //Clockwork Orange
?>