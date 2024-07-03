<?php

include_once './model/Publisher.php';

class PublisherController{
    private $publisher;

    public function __construct()
    {
        $this->publisher=new Publisher();
    }

    public function getPublishers()
    {
        return $this->publisher->getPublishers();
    }
}

?>