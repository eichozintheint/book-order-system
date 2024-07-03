<?php

 include_once './includes/db.php';

class Category{
    private $con,$statement;
    public function getCategories(){
        $this->con=Database::connect();
        $sql='select * from categories';
        $this->statement=$this->con->prepare($sql);
        if($this->statement->execute())
        {
            $categories=$this->statement->fetchAll(PDO::FETCH_ASSOC);
            return $categories;
        }
    } 
    //view cat
    public function viewCat($id){
        $this->con=Database::connect();
        $sql='select * from categories where id=:id';
        $this->statement=$this->con->prepare($sql);
        $this->statement->bindParam(':id',$id);
        if($this->statement->execute())
        {
            $categories=$this->statement->fetch(PDO::FETCH_ASSOC);
            return $categories;
        }
    }
    //delete cat
    public function deleteCat($id){
        $status="deleted";
        $this->con = Database::connect();
        $sql1="select * from books where category_id=:id";
        $statement1 = $this->con->prepare($sql1);
        $statement1->bindParam(':id',$id);
        
        if($statement1->execute()){
            $books=$statement1->fetchAll(PDO::FETCH_ASSOC);
            if(count($books) ==0){
                $sql = "update categories set deleted_at=:status where id=:id";
                $this->statement = $this->con->prepare($sql);
                $this->statement->bindParam(':id',$id);
                $this->statement->bindParam(':status',$status);
                return  $this->statement->execute();
            }
            return false;
        }    
    }
    //add author
    public function addCate($name, $des) {
        try {
            $this->con = Database::connect();
            $sql1 = "SELECT * FROM categories WHERE name = :catname";
            $statement1 = $this->con->prepare($sql1);
            $statement1->bindParam(':catname', $name);
            $statement1->execute();
            
            $categories = $statement1->fetchAll(PDO::FETCH_ASSOC);
    
            if (count($categories) == 0) {
                // Insert new category
                $sql = "INSERT INTO categories (name, description) VALUES (:name, :des)";
                $this->statement = $this->con->prepare($sql);
                $this->statement->bindParam(':name', $name);
                $this->statement->bindParam(':des', $des);
                $result = $this->statement->execute();
                
                // Close connection
                Database::disconnect();
    
                return $result;
            }
    
            // Close connection
            Database::disconnect();
            return false;
    
        } catch (PDOException $e) {
            // Handle exception
            echo "Error: " . $e->getMessage();
            return false;
        }
    }
    //edit cat
    public function editCat($id){
        $this->con=Database::connect();
        $sql='select * from categories where id=:id';
        $this->statement=$this->con->prepare($sql);
        $this->statement->bindParam(":id",$id);
        if($this->statement->execute())
        {
            $categories=$this->statement->fetch(PDO::FETCH_ASSOC);
            return $categories;
        }
    }
    public function updateCat($id,$name,$des){
        $this->con=Database::connect();
        $sql = "update categories set name=:name,description=:des where id=:id";
        $this->statement = $this->con->prepare($sql);
        $this->statement->bindParam(":id",$id);
        $this->statement->bindParam(":name",$name);
        $this->statement->bindParam(":des",$des);
         return $this->statement->execute();
    }
    
}

?>