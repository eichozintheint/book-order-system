<?php
include_once './model/OrderDetail.php';

class OrderDetailController{
    private $orderDetail;

    public function __construct(){
        $this->orderDetail=new OrderDetail();
    }

    public function getOrderDetail($order_id){
        return $this->orderDetail->getOrderDetail($order_id);
    }
}

?>