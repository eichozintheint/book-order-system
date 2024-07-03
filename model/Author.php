<?php

include_once './includes/db.php';

class Author{
    private $con,$statement;

    public function getAuthors()
    {
        $this->con=Database::connect();
        $sql='select * from authors';
        $this->statement=$this->con->prepare($sql);
        if($this->statement->execute())
        {
            $authors=$this->statement->fetchAll(PDO::FETCH_ASSOC);
            return $authors;
        }
    } 
}

?>