<?php
include_once './model/OrderDetail.php';

class OrderDetailController{
    private $orderDetail;

    public function __construct(){
        $this->orderDetail=new OrderDetail();
    }

    public function addOrderDetail($order_id,$book_id,$book_qty){
        return $this->orderDetail->addOrderDetail($order_id,$book_id,$book_qty);
    }

    public function getOrderDetail($order_id){
        return $this->orderDetail->getOrderDetail($order_id);
    }
}

?>