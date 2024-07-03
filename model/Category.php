<?php

include_once './includes/db.php';

class Category{
    private $con,$statement;

    public function getCategories()
    {
        $this->con=Database::connect();
        $sql='select * from categories';
        $this->statement=$this->con->prepare($sql);
        if($this->statement->execute())
        {
            $categories=$this->statement->fetchAll(PDO::FETCH_ASSOC);
            return $categories;
        }
    }
}

?>