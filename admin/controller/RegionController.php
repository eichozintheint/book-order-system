<?php

include_once './model/Region.php';

class RegionController{
    private $region;

    public function __construct()
    {
        $this->region=new Region();
    }
    public function getRegion(){
        return $this->region->getRegion();
    }
    //view
    public function viewRegion($id){
        return $this->region->viewRegion($id);
    }
    //edit
    public function editRegion($id){
        return $this->region->editRegion($id);
    }
    //update 
    public function updateRegion($id,$name){
        return $this->region->updateRegion($id,$name);
    }
    //add 
    public function addRegion($name){
        return $this->region->addRegion($name);
    }
    //delete 
    public function deleteRegion($id){
        return $this->region->deleteRegion($id);
    }
   
}

?>