<?php 
header('Content-Type: application/json');
include_once 'controller/PublisherController.php';
$pub_controller=new PublisherController();
$id=$_POST['id'];
$edit=$pub_controller->editPublisher($id);   
// Output the JSON response
echo json_encode(['edit' => $edit,'success'=>"successfully update"]);

?>