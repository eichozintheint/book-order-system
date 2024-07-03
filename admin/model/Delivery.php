<?php

include_once './includes/db.php';

class Delivery{
    private $con,$statement;

    public function getDelivery()
    {
        $this->con=Database::connect();
        $sql='select delivery_fees.*,
                townships.name as township_name from delivery_fees join townships
                on delivery_fees.township_id=townships.id';
        $this->statement=$this->con->prepare($sql);
        if($this->statement->execute())
        {
            $del=$this->statement->fetchAll(PDO::FETCH_ASSOC);
            return $del;
        }
    }
 
    public function editDel($id){
        $this->con=Database::connect();
        $sql = 'SELECT delivery_fees.price,
        delivery_fees.township_id,
        townships.name as township
        FROM townships
        JOIN delivery_fees ON delivery_fees.township_id = townships.id
        WHERE delivery_fees.id = :id';
        $this->statement=$this->con->prepare($sql);
        $this->statement->bindParam(':id',$id);
        if($this->statement->execute())
        {
            $del1=$this->statement->fetchAll(PDO::FETCH_ASSOC);
            return $del1;
        }
    }
    public function updateDel($id,$price){
        $this->con=Database::connect();
        $sql='update delivery_fees set price=:price where id=:id';
        $this->statement=$this->con->prepare($sql);
        $this->statement->bindParam(':id',$id);
        $this->statement->bindParam(':price',$price);
        return $this->statement->execute();
    }
   
   
      
}

?>