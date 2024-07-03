<?php
include_once './model/Payment.php';

class PaymentController{
    private $payment;

    public function __construct(){
        $this->payment=new Payment();
    }

    public function getPayments(){
        return $this->payment->getPayments();
    }
}
?>