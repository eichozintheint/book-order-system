<?php

include_once './includes/db.php';

class Publisher{
    private $con,$statement;

    public function getPublishers()
    {   
        $deleted=NULL;
        $this->con=Database::connect();
        $sql='select * from publishers where deleted_at IS :n';
        $this->statement=$this->con->prepare($sql);
        $this->statement->bindParam(":n",$deleted);
        if($this->statement->execute())
        {
            $publishers=$this->statement->fetchAll(PDO::FETCH_ASSOC);
            return $publishers;
        }
    }
    //add
    public function addPublisher($name,$address){
        $this->con=Database::connect();
        $sql='insert into publishers(name,address) values(:name,:address)';
        $this->statement=$this->con->prepare($sql);
        $this->statement->bindParam(":name",$name);
        $this->statement->bindParam(":address",$address);
        return $this->statement->execute();
    }
    //view
    public function viewPublisher($id){
        
        $this->con=Database::connect();
        $sql='select * from publishers where id=:id';
        $this->statement=$this->con->prepare($sql);
        $this->statement->bindParam(":id",$id);
       
        if($this->statement->execute())
        {
            $publisher=$this->statement->fetch(PDO::FETCH_ASSOC);
            return $publisher;
        }
     
    }
      //view
      public function editPublisher($id){
        $this->con=Database::connect();
        $sql='select * from publishers where id=:id';
        $this->statement=$this->con->prepare($sql);
        $this->statement->bindParam(":id",$id);
        if($this->statement->execute())
        {
            $publisher=$this->statement->fetch(PDO::FETCH_ASSOC);
            return $publisher;
        }
     
    }
    //update 
    public function updatePublisher($id,$name,$address){
        $this->con=Database::connect();
        $sql='update publishers set name=:name ,address=:address where id=:id';
        $this->statement=$this->con->prepare($sql);
        $this->statement->bindParam(":id",$id);
        $this->statement->bindParam(":name",$name);
        $this->statement->bindParam(":address",$address);
        return $this->statement->execute();
    }
    //delete
    public function deletePublisher($id){
        $status="deleted";
        $this->con = Database::connect();
        $sql1="select * from books where publisher_id=:id";
        $statement1 = $this->con->prepare($sql1);
        $statement1->bindParam(':id',$id);

        if($statement1->execute()){
            $region=$statement1->fetchAll(PDO::FETCH_ASSOC);
            if(count($region) ==0){
                $sql='update publishers set deleted_at=:dd where id=:id';
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