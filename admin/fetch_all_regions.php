<?php
include_once 'controller/RegionController.php';
$regions_controller=new RegionController();
$regions = $regions_controller->getRegion();

// Send JSON response
header('Content-Type: application/json');
echo json_encode($regions);
?>