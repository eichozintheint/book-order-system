<?php

include_once './model/Order.php';

class OrderController{
    private $order;

    public function __construct()
    {
        $this->order=new Order();
    }

    public function getOrders()
    {
        return $this->order->getOrders();
    }

    public function updateStatus($order_id){
        return $this->order->updateStatus($order_id);
    }

    public function deleteOrder($orderId){
        return $this->order->deleteOrder($orderId);
    }

    public function getOrderInformation($order_id){
        return $this->order->getOrderInformation($order_id);
    }

    public function getPendingOrder(){
        return $this->order->getPendingOrder();
    }

    public function getApproveOrder(){
        return $this->order->getApproveOrder();
    }
}

?>