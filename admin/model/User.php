<?php
include_once './includes/db.php';

class User{
    private $con,$statement;

    public function getUsers(){
        $this->con=Database::connect();
        $sql='select * from users';
        $this->statement=$this->con->prepare($sql);
        if($this->statement->execute()){
            $results=$this->statement->fetchAll(PDO::FETCH_ASSOC);   
            return $results;    
        }
    }

    public function deleteUser($user_id){
        $this->con=Database::connect();
        $sql='delete from users where id=:user_id';
        $this->statement=$this->con->prepare($sql);
        $this->statement->bindParam(':user_id',$user_id);
        return $this->statement->execute();
    }
}

?>