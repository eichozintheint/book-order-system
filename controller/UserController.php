<?php

include_once './model/User.php';

class UserController{
    private $user;

    public function __construct()
    {
        $this->user=new User();
    }

    public function addUser($username,$email,$phone,$password)
    {
        return $this->user->addUser($username,$email,$phone,$password);
    }

    public function getUser($email,$password)
    {
        return $this->user->getUser($email,$password);
    }

    public function getEmail(){
        return $this->user->getEmail();
    }

    public function resetPassword($reset_email,$new_password){
        return $this->user->resetPassword($reset_email,$new_password);
    }

    public function getLoggedInUser($loggedin_user_id){
        return $this->user->getLoggedInUser($loggedin_user_id);
    }

    public function getUsers(){
        return $this->user->getUsers();
    }

    public function deleteUser($user_id){
        return $this->user->deleteUser($user_id);
    }
}

?>