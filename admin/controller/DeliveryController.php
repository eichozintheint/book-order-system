<?php

include_once './model/Delivery.php';

class DeliveryController{
    private $del;

    public function __construct()
    {
        $this->del=new Delivery();
    }
    public function getDelivery(){
        return $this->del->getDelivery();
    }
    //edit
    public function editDel($id){
        return $this->del->editDel($id);
    }
    //update
    public function updateDel($id,$price){
        return $this->del->updateDel($id,$price);
    }
   
   
}

?>