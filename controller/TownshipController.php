<?php
include_once './model/Township.php';

class TownshipController{
    private $township;

    public function __construct(){
        $this->township=new Township();
    }

    public function getTownships(){
        return $this->township->getTownships();
    }

    public function getTownshipsByRegionId($regionId){
        return $this->township->getTownshipsByRegionId($regionId);
    }
}

?>