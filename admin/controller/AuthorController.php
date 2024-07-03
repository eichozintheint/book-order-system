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
    //add new author
    public function addAuthors($name,$f_name,$email,$phone,$address){
        return $this->author->addAuthor($name,$f_name,$email,$phone,$address);
    }

    //view author
    public function viewAuthor($id){
        return $this->author->viewAuthor($id);
    }

    //update author
   public function updateAuthor($id,$name,$f_name,$email,$phone,$address){
    return $this->author->updateAuthor($id,$name,$f_name,$email,$phone,$address);
   }
   //delete author
   public function deleteAuthor($id){
    return $this->author->deleteAuthor($id);
   }

   public function getAuthorCount(){
    return $this->author->getAuthorCount();
   }

}

?>