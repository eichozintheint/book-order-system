<?php
include_once './model/Region.php';

class RegionController{
    private $region;

    public function __construct(){
        $this->region=new Region();
    }

    public function getRegions(){
        return $this->region->getRegions();
    }
}

?>