<?php

include_once './includes/db.php';

class Region{
    private $con,$statement;

    public function getRegion()
    {
        $deleted=NULL;
        $this->con=Database::connect();
        $sql='select * from regions where deleted_at=:n';
        $this->statement=$this->con->prepare($sql);
        $this->statement->bindParam(":n",$deleted);
        if($this->statement->execute())
        {
            $regions=$this->statement->fetchAll(PDO::FETCH_ASSOC);
            return $regions;
        }
    }
 
    //view 
    public function viewRegion($id){
        $this->con=Database::connect();
        $sql='select * from regions where id=:id';
        $this->statement=$this->con->prepare($sql);
        $this->statement->bindParam(':id',$id);
        if($this->statement->execute())
        {
            $region=$this->statement->fetch(PDO::FETCH_ASSOC);
            return $region;
        }
    }
    public function editRegion($id){
        $this->con=Database::connect();
        $sql='select * from regions where id=:id';
        $this->statement=$this->con->prepare($sql);
        $this->statement->bindParam(':id',$id);
        if($this->statement->execute())
        {
            $region=$this->statement->fetch(PDO::FETCH_ASSOC);
            return $region;
        }
    }
    //update
    public function updateRegion($id,$name){
        $this->con=Database::connect();
        $sql='update regions set name=:name where id=:id';
        $this->statement=$this->con->prepare($sql);
        $this->statement->bindParam(':id',$id);
        $this->statement->bindParam(':name',$name);
        return $this->statement->execute();
       
    }
      //update
      public function addRegion($name){
        $this->con=Database::connect();
        $sql='insert into regions(name) values (:name)';
        $this->statement=$this->con->prepare($sql);
        $this->statement->bindParam(':name',$name);
        return $this->statement->execute();
       
    }
   public function deleteRegion($id){
    $status="deleted";
    $this->con = Database::connect();
    $sql1="select * from townships where region_id=:id";
    $statement1 = $this->con->prepare($sql1);
    $statement1->bindParam(':id',$id);

    if($statement1->execute()){
        $region=$statement1->fetchAll(PDO::FETCH_ASSOC);
        if(count($region) ==0){
            $sql='update regions set deleted_at=:dd where id=:id';
            $this->statement = $this->con->prepare($sql);
            $this->statement->bindParam(':id',$id);
            $this->statement->bindParam(':dd',$status);
            return  $this->statement->execute();
        }
        return false;
    }
    
   }

      
}

?>