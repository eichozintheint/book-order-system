<?php
include_once 'controller/TownshipController.php';

if(isset($_POST['regionId'])){
    $regionId=$_POST['regionId'];
}

$township_controller=new TownshipController();
$townships=$township_controller->getTownshipsByRegionId($regionId);
echo json_encode($townships);



?>