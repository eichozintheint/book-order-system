<?php 
include_once 'controller/RegionController.php';
$reg_controller=new RegionController();
$id=$_POST['id'];
$status=$reg_controller->deleteRegion($id);
if($status){
    header('location:region_list.php?');
}
else{
    header('location:region_list.php?status=fail');
}
?>