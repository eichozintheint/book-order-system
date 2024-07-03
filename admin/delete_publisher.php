<?php 
include_once 'controller/PublisherController.php';
$pub_controller=new PublisherController();
$id=$_POST['id'];
$status=$pub_controller->deletePublisher($id);
if($status){
    header('location:publishers.php?');
}
else{
    header('location:publishers.php?status=fail');
}
?>