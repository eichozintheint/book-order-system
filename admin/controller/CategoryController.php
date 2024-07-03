<?php

include_once './model/Category.php';

class CategoryController{
    private $category;
    public function __construct()
    {
        $this->category=new Category();
    }
    //cat list
    public function getCategories()
    {
        return $this->category->getCategories();
    }
    //view categories
    public function viewCat($id){
        return $this->category->viewCat($id);
    }
    //delete cat
    public function deleteCat($id){
        return $this->category->deleteCat($id);
    }
    //add author
    public function addCate($name,$des){
        return $this->category->addCate($name,$des);
    }
    //edit cate
    public function editCat($id){
        return $this->category->editCat($id);
    }
    //update cate
    public function updateCat($id,$name,$des){
        return $this->category->updateCat($id,$name,$des);
    }
}

?>