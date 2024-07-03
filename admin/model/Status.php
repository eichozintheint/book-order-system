<?php

include_once './includes/db.php';

class Status{
    private $con,$statement;

    public function getStatus()
    {
        $this->con=Database::connect();
        $sql='select * from status';
        $this->statement=$this->con->prepare($sql);
        if($this->statement->execute())
        {
            $results=$this->statement->fetchAll(PDO::FETCH_ASSOC);
            return $results;
        }
    }
}

?>