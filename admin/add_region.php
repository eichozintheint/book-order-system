<?php 
header('Content-Type: application/json');
include_once 'controller/RegionController.php';
$region_controller=new RegionController();

$name=$_POST['name'];
$add=$region_controller->addRegion($name);   
// Output the JSON response
echo json_encode(['add' => $add,'success'=>"successfully add"]);

?>