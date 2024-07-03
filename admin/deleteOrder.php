<?php
include_once 'controller/OrderController.php';

$orderId=$_POST['orderId'];

$order_controller=new OrderController();
$deleteOrderStatus=$order_controller->deleteOrder($orderId);

if($deleteOrderStatus){
    echo "success";
}

?>