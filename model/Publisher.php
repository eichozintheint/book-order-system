<?php

include_once './includes/db.php';

class Publisher{
    private $con,$statement;

    public function getPublishers()
    {
        $this->con=Database::connect();
        $sql='select * from publishers';
        $this->statement=$this->con->prepare($sql);
        if($this->statement->execute())
        {
            $publishers=$this->statement->fetchAll(PDO::FETCH_ASSOC);
            return $publishers;
        }
    }
}

?>