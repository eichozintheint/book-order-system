<?php

include_once './includes/db.php';

class Township{
    private $con,$statement;

    public function getTownship()
    {
        $this->con=Database::connect();
        $sql=' SELECT 
                townships.id, townships.name, townships.region_id, regions.name as region_name
                FROM townships JOIN regions ON townships.region_id = regions.id';
        $this->statement=$this->con->prepare($sql);
        if($this->statement->execute())
        {
            $townships=$this->statement->fetchAll(PDO::FETCH_ASSOC);
            return $townships;
        }

    }
    //view 
    public function viewTownship($id){
        $this->con=Database::connect();
        $sql='SELECT 
                townships.id, townships.name, townships.region_id, regions.name as region_name
                FROM townships JOIN regions ON townships.region_id = regions.id where townships.id=:id';
        $this->statement=$this->con->prepare($sql);
        $this->statement->bindParam(':id',$id);
        if($this->statement->execute())
        {
            $township=$this->statement->fetch(PDO::FETCH_ASSOC);
            return $township;
        }
    }
    // public function editRegion($id){
    //     $this->con=Database::connect();
    //     $sql='select * from regions where id=:id';
    //     $this->statement=$this->con->prepare($sql);
    //     $this->statement->bindParam(':id',$id);
    //     if($this->statement->execute())
    //     {
    //         $region=$this->statement->fetch(PDO::FETCH_ASSOC);
    //         return $region;
    //     }
    // }
    //update
    // public function updateRegion($id,$name){
    //     $this->con=Database::connect();
    //     $sql='update regions set name=:name where id=:id';
    //     $this->statement=$this->con->prepare($sql);
    //     $this->statement->bindParam(':id',$id);
    //     $this->statement->bindParam(':name',$name);
    //     return $this->statement->execute();
       
    // }
    //   //update
    //   public function addRegion($name){
    //     $this->con=Database::connect();
    //     $sql='insert into regions(name) values (:name)';
    //     $this->statement=$this->con->prepare($sql);
    //     $this->statement->bindParam(':name',$name);
    //     return $this->statement->execute();
       
    // }
      
}

?>