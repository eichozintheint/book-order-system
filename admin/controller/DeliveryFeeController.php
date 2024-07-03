<?php
include_once './model/DeliveryFee.php';

class DeliveryFeeController{
    private $deliveryFee;

    public function __construct(){
        $this->deliveryFee=new DeliveryFee();
    }

    public function getDeliveryFee($township_id){
        return $this->deliveryFee->getDeliveryFee($township_id);
    }
}
?>