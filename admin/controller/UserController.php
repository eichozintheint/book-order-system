<?php
include_once './model/User.php';

class UserController{
    private $user;

    public function __construct()
    {
        $this->user=new User();
    }

    public function getUsers(){
        return $this->user->getUsers();
    }

    public function deleteUser($user_id){
        return $this->user->deleteUser($user_id);
    }
}

?>