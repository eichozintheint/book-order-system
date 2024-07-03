<?php 
header('Content-Type: application/json');
include_once 'controller/RegionController.php';
$region_controller=new RegionController();
$id=$_POST['id'];
$region=$region_controller->viewRegion($id);   
// Output the JSON response
echo json_encode(['region' => $region]);

?>