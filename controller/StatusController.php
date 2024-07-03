<?php

include_once './model/Status.php';

class StatusController{
    private $status;

    public function __construct()
    {
        $this->status=new Status();
    }

    public function getStatus()
    {
        return $this->status->getStatus();
    }
}

?>