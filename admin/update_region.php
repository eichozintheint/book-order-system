<?php 
header('Content-Type: application/json');
include_once 'controller/RegionController.php';
$region_controller=new RegionController();
$id=$_POST['id'];
$name=$_POST['name'];
$update=$region_controller->updateRegion($id,$name);   
// Output the JSON response
echo json_encode(['update' => $update,'success'=>"successfully update"]);

?>