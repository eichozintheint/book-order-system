<?php
include_once './model/Book.php';

class BookController{
    private $book;

    public function __construct(){
        $this->book=new Book();
    }

    public function getBooks(){
        return $this->book->getBooks();
    }

    public function addBook($title,$f_name,$category,$price,$stock,$status,$author,$publisher,$description,$edition,$pages,$rating,$published_date,$discount){
        return $this->book->addBook($title,$f_name,$category,$price,$stock,$status,$author,$publisher,$description,$edition,$pages,$rating,$published_date,$discount);
    }

    public function getBook($bookId){
        return $this->book->getBook($bookId);
    }

    public function updateBook($bookId,$title,$f_name,$category,$price,$stock,$status,$author,$publisher,$description,$edition,$pages,$rating,$published_date,$discount){
        return $this->book->updateBook($bookId,$title,$f_name,$category,$price,$stock,$status,$author,$publisher,$description,$edition,$pages,$rating,$published_date,$discount);
    }

    public function deleteBook($bookId){
        return $this->book->deleteBook($bookId);
    }

    public function getBookCount(){
        return $this->book->getBookCount();
    }


}
?>