<?php

include_once './includes/db.php';

class User{
    private $con,$statement;

    public function addUser($username,$email,$phone,$password)
    {
        $this->con=Database::connect();
        $sql='insert into users(username,email,phone,password) values (:username,:email,:phone,:password)';
        $this->statement=$this->con->prepare($sql);
        $this->statement->bindParam(':username',$username);
        $this->statement->bindParam(':email',$email);
        $this->statement->bindParam(':phone',$phone);
        $this->statement->bindParam(':password',$password);
        return $this->statement->execute();
    }

    public function getUser($email,$password)
    {
        $this->con=Database::connect();
        $sql='select * from users where email=:email and password=:password';
        $this->statement=$this->con->prepare($sql);
        $this->statement->bindParam(':email',$email);
        $this->statement->bindParam(':password',$password);
        if($this->statement->execute())
        {
            $user=$this->statement->fetch(PDO::FETCH_ASSOC);
            return $user;
        }
    }

    public function getEmail(){
        $this->con=Database::connect();
        $sql='select email from users';
        $this->statement=$this->con->prepare($sql);
        if($this->statement->execute()){
            $results=$this->statement->fetchAll(PDO::FETCH_ASSOC);
            return $results;
        }
    }

    public function resetPassword($reset_email,$new_password){
        $this->con=Database::connect();
        $sql='UPDATE users SET password=:new_password WHERE email=:reset_email';
        $this->statement=$this->con->prepare($sql);
        $this->statement->bindParam(':new_password',$new_password);
        $this->statement->bindParam(':reset_email',$reset_email);
        return $this->statement->execute();
    }

    public function getLoggedInUser($loggedin_user_id){
        $this->con=Database::connect();
        $sql='select * from users where id=:loggedin_user_id';
        $this->statement=$this->con->prepare($sql);
        $this->statement->bindParam(':loggedin_user_id',$loggedin_user_id);
        if($this->statement->execute()){
            $result=$this->statement->fetch(PDO::FETCH_ASSOC);
            return $result;
        }
    }

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