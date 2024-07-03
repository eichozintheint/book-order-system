<?php

include_once 'includes/db.php';

class Township{
    private $con,$statement;

    public function getTownships(){
        $this->con=Database::connect();
        $sql='select * from township';
        $this->statement=$this->con->prepare($sql);
        if($this->statement->execute()){
            $townships=$this->statement->fetchAll(PDO::FETCH_ASSOC);
            return $townships;
        }
    }

    public function getTownshipsByRegionId($regionId){
        $this->con=Database::connect();
        $sql='select * from townships where region_id=:regionId';
        $this->statement=$this->con->prepare($sql);
        $this->statement->bindParam(':regionId',$regionId);
        if($this->statement->execute()){
            $townships=$this->statement->fetchAll(PDO::FETCH_ASSOC);
            return $townships;
        }
    }
}

?>