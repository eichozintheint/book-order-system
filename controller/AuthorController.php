<?php

include_once './model/Author.php';

class AuthorController{
    private $author;

    public function __construct()
    {
        $this->author=new Author();
    }

    public function getAuthors()
    {
       return $this->author->getAuthors();
    }
}

?>