<?php
include_once 'controller/BookController.php';

$bookId=$_POST['bookId'];
// $id=$_GET['bookId'];

$book_controller=new BookController();
$deleteBookStatus=$book_controller->deleteBook($bookId);

if($deleteBookStatus){
    echo "success";
}

?>