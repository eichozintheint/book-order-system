<?php

include_once './model/Category.php';

class CategoryController{
    private $category;

    public function __construct()
    {
        $this->category=new Category();
    }

    public function getCategories()
    {
        return $this->category->getCategories();
    }
}

?>