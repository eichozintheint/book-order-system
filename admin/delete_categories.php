<?php 
include_once 'controller/CategoryController.php';
$cat_categories=new CategoryController();
$id=$_GET['id'];
$status=$cat_categories->deleteCat($id);
if($status){
    header('location:categories_list.php?status=deleteSuccess');
}
else{
    header('location:categories_list.php?status=fail');
}
?>