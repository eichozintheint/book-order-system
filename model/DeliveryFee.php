<?php
include_once './includes/db.php';

class DeliveryFee{
    private $con,$statement;

    public function getDeliveryFees(){
        $this->con=Database::connect();
        $sql='select * from delivery_fees';
        $this->statement=$this->con->prepare($sql);
        if($this->statement->execute()){
            $delivery_fees=$this->statement->fetchAll(PDO::FETCH_ASSOC);
            return $delivery_fees;
        }
    }

    public function getDeliveryFee($township_id){
        $this->con=Database::connect();
        $sql='select price from delivery_fees where township_id=:township_id';
        $this->statement=$this->con->prepare($sql);
        $this->statement->bindParam(':township_id',$township_id);
        if($this->statement->execute()){
            $result=$this->statement->fetch(PDO::FETCH_ASSOC);
            return $result;
        }
    }
}
?>