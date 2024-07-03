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
    //add 
    public function addPublisher($name, $address){
        return $this->publisher->addPublisher($name, $address);
    }
    //view
    public function viewPublisher($id){
        return $this->publisher->viewPublisher($id);
    }
    //edit
    public function editPublisher($id){
        return $this->publisher->editPublisher($id);
    }
    public function updatePublisher($id,$name,$address){
        return $this->publisher->updatePublisher($id,$name,$address);
    }
    //delete 
    public function deletePublisher($id){
        return $this->publisher->deletePublisher($id);
    }
}

?>