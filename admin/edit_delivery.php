<?php 
header('Content-Type: application/json');
include_once 'controller/DeliveryController.php';
$del_controller=new DeliveryController();
$id=$_POST['id'];
$deli=$del_controller->editDel($id);
echo json_encode(['deli' => $deli,'success'=>"successfully update"]);
?>