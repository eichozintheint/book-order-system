<?php
include_once './includes/db.php';

class Payment{
    private $con,$statement;

    public function getPayments(){
        $this->con=Database::connect();
        $sql='select * from payment_types';
        $this->statement=$this->con->prepare($sql);
        if($this->statement->execute()){
            $payments=$this->statement->fetchAll(PDO::FETCH_ASSOC);
            return $payments;
        }
    }
}
?>