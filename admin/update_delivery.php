<?php 
header('Content-Type: application/json');
include_once 'controller/DeliveryController.php';
$del_controller=new DeliveryController();
$id=$_POST['id'];
$price=$_POST['price'];
$update_del=$del_controller->updateDel($id,$price);   
// Output the JSON response
echo json_encode(['update_del' => $update_del]);

?>