<?php 
include_once 'controller/AuthorController.php';
$id=$_GET['id'];
$author_controller=new AuthorController();
$status = $author_controller->deleteAuthor($id);
echo $status;
if($status){
    header('location:author_list.php?');
}
else{
    header('location:author_list.php?status=fail');
}
?>