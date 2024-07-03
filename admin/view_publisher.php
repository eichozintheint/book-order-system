<?php 
header('Content-Type: application/json');
include_once 'controller/PublisherController.php';
$pub_controller=new PublisherController();
$id=$_POST['id'];
$pub=$pub_controller->viewPublisher($id);   
// Output the JSON response
echo json_encode(['pub' => $pub]);

?>