<?php
include_once 'controller/UserController.php';

$user_id=$_POST['user_id'];

$user_controller=new UserController();
$status=$user_controller->deleteUser($user_id);

echo $status;

?>