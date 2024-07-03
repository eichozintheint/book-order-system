<?php
include_once './model/Order.php';

class OrderController{
    private $order;

    public function __construct(){
        $this->order=new Order();
    }

    public function addOrder($user_id,$township_id,$receiver_name,$receiver_phone,$receiver_address,$payment_typeId,$totalPrice,$totalQty,$total){
        return $this->order->addOrder($user_id,$township_id,$receiver_name,$receiver_phone,$receiver_address,$payment_typeId,$totalPrice,$totalQty,$total);
    }

    public function getLastInsertedId(){
        return $this->order->getLastInsertedId();
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
}
?>