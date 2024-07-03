<?php
include_once './includes/db.php';

class Region{
    private $con,$statement;

    public function getRegions(){
        $this->con=Database::connect();
        $sql='select * from regions';
        $this->statement=$this->con->prepare($sql);
        if($this->statement->execute()){
            $regions=$this->statement->fetchAll(PDO::FETCH_ASSOC);
            return $regions;
        }
    }
}

?>