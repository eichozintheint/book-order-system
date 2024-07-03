<?php

include_once './includes/db.php';

class Author{
    private $con,$statement;

    public function getAuthors()
    {
        $this->con=Database::connect();
        $sql='select * from authors';
        $this->statement=$this->con->prepare($sql);
        if($this->statement->execute())
        {
            $authors=$this->statement->fetchAll(PDO::FETCH_ASSOC);
            return $authors;
        }
    } 
    //add new author in database
    public function addAuthor($name,$f_name,$email,$phone,$address){
        $this->con=Database::connect();
        $sql = "INSERT INTO authors(name,image,email,phone,address) 
        VALUES (:aname,:image,:email,:ph,:a_add)";
        $this->statement = $this->con->prepare($sql);
        $this->statement->bindParam(":aname",$name);
        $this->statement->bindParam(":image",$f_name);
        $this->statement->bindParam(":email",$email);
        $this->statement->bindParam(":ph",$phone);
        $this->statement->bindParam(":a_add",$address);
         return $this->statement->execute();
        
    }
    //view author and edit
    public function viewAuthor($id){
        $this->con=Database::connect();
        $sql='select * from authors where id=:id';
        $this->statement=$this->con->prepare($sql);
        $this->statement->bindParam(":id",$id);
        if($this->statement->execute())
        {
            $author=$this->statement->fetch(PDO::FETCH_ASSOC);
            return $author;
        }
    }

    //update author
    public function updateAuthor($id,$name,$f_name,$email,$phone,$address){
        $this->con=Database::connect();
        $sql = "update authors set name=:name,email=:email,
        phone=:ph,address=:address,image=:image where id=:id";
        $this->statement = $this->con->prepare($sql);
        $this->statement->bindParam(":id",$id);
        $this->statement->bindParam(":name",$name);
        $this->statement->bindParam(":email",$email);
        $this->statement->bindParam(":ph",$phone);
        $this->statement->bindParam(":address",$address);
        $this->statement->bindParam(":image",$f_name);
         return $this->statement->execute();
    }

    //delete author
    public function deleteAuthor($id){      
            $status="deleted";
            $this->con = Database::connect();
            $sql1="select * from books where author_id=:id";
            $statement1 = $this->con->prepare($sql1);
            $statement1->bindParam(':id',$id);
            if($statement1->execute()){
                $authors=$statement1->fetchAll(PDO::FETCH_ASSOC);
                if(count($authors) ==0){
                    $sql = "update authors set deleted_at=:status where id=:id";
                    $this->statement = $this->con->prepare($sql);
                    $this->statement->bindParam(':id',$id);
                    $this->statement->bindParam(':status',$status);
                    return  $this->statement->execute();
                }
                return false;
            }    
    }

    public function getAuthorCount(){
        $this->con=Database::connect();
        $sql='select * from authors where deleted_at IS NULL';
        $this->statement=$this->con->prepare($sql);
        if($this->statement->execute()){
            $results=$this->statement->fetchAll(PDO::FETCH_ASSOC);   
            return $results;    
        }
    }

}

?>