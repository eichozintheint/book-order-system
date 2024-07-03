<?php 
header('Content-Type: application/json');
include_once 'controller/TownshipController.php';
$township_controller=new TownshipController();
$id=$_POST['id'];
$township=$township_controller->viewTownship($id);   
// Output the JSON response
echo json_encode(['township' => $township]);

?>