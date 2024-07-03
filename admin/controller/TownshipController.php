<?php

include_once './model/Township.php';

class TownshipController{
    private $township,$region;

    public function __construct()
    {
        $this->township=new Township();
    }
   //get township list
    public function getTownship(){
        return $this->township->getTownship();
    }
    //view
    public function viewTownship($id){
        return $this->township->viewTownship($id);
    }

  
}

?>