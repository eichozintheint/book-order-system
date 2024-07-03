<?php 
header('Content-Type: application/json');
include_once 'controller/RegionController.php';
$region_controller=new RegionController();
$id=$_POST['id'];
$edit=$region_controller->editRegion($id);   
// Output the JSON response
echo json_encode(['edit' => $edit,'success'=>"successfully update"]);

?>