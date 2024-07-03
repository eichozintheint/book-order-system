<?php 
header('Content-Type: application/json');
include_once 'controller/PublisherController.php';
$pub_controller=new PublisherController();
$id=$_POST['id'];
$name=$_POST['name'];
$address=$_POST['address'];
$pub=$pub_controller->updatePublisher($id,$name,$address);   
// Output the JSON response
echo json_encode(['pub' => $pub]);

?>