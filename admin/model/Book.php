<?php
include_once './includes/db.php';

class Book{
    private $con,$statement;

    public function getBooks(){
        $this->con=Database::connect();
        $sql='select books.id,books.title,books.image,categories.name as category,books.price ,books.stock,status.name as status,authors.name as author,publishers.name as publisher,books.delete_status
            from books join categories join status join authors join publishers
            on books.category_id=categories.id and books.status_id=status.id and books.author_id=authors.id and books.publisher_id=publishers.id ';
        $this->statement=$this->con->prepare($sql);
        if($this->statement->execute()){
            $results=$this->statement->fetchAll(PDO::FETCH_ASSOC);   
            return $results;    
        }
    }

    public function getBookCount(){
        $this->con=Database::connect();
        $sql='select * from books where delete_status IS NULL';
        $this->statement=$this->con->prepare($sql);
        if($this->statement->execute()){
            $results=$this->statement->fetchAll(PDO::FETCH_ASSOC);   
            return $results;    
        }
    }

    public function addBook($title,$f_name,$category,$price,$stock,$status,$author,$publisher,$description,$edition,$pages,$rating,$published_date,$discount){
        $this->con=Database::connect();
        $sql='INSERT INTO books (title,image,category_id,price,stock,status_id,author_id,publisher_id,description,edition,pages,rating,publish_date,discount)
             VALUES(:title,:f_name,:category_id,:price,:stock,:status_id,:author_id,:publisher_id,:description,:edition,:pages,:rating,:published_date,:discount)';
        $this->statement=$this->con->prepare($sql);
        $this->statement->bindParam(':title',$title);
        $this->statement->bindParam(':f_name',$f_name);
        $this->statement->bindParam(':category_id',$category);
        $this->statement->bindParam(':price',$price);
        $this->statement->bindParam(':stock',$stock);
        $this->statement->bindParam(':title',$title);
        $this->statement->bindParam(':status_id',$status);
        $this->statement->bindParam(':author_id',$author);
        $this->statement->bindParam(':publisher_id',$publisher);
        $this->statement->bindParam(':description',$description);
        $this->statement->bindParam(':edition',$edition);
        $this->statement->bindParam(':pages',$pages);
        $this->statement->bindParam(':rating',$rating);
        $this->statement->bindParam(':published_date',$published_date);
        $this->statement->bindParam(':discount',$discount);
        return $this->statement->execute();
    }

    public function getBook($bookId){
        $this->con=Database::connect();
        $sql='select books.id,books.title,books.image,categories.name as category,books.price ,books.stock,status.name as status,authors.name as author,publishers.name as publisher,books.publish_date,books.discount,books.description,books.edition,books.pages,books.rating,books.delete_status
            from books join categories join status join authors join publishers
            on books.category_id=categories.id and books.status_id=status.id and books.author_id=authors.id and books.publisher_id=publishers.id and books.id=:bookId';
        $this->statement=$this->con->prepare($sql);
        $this->statement->bindParam(':bookId',$bookId);
        if($this->statement->execute()){
            $results=$this->statement->fetch(PDO::FETCH_ASSOC);
            return $results;
        }
    }

    public function updateBook($bookId,$title,$f_name,$category,$price,$stock,$status,$author,$publisher,$description,$edition,$pages,$rating,$published_date,$discount){
        $this->con=Database::connect();
        $sql='UPDATE books SET title=:title,image=:f_name,category_id=:category_id,price=:price,stock=:stock,status_id=:status_id,author_id=:author_id,publisher_id=:publisher_id,description=:description,edition=:edition,pages=:pages,rating=:rating,publish_date=:published_date,discount=:discount WHERE id=:bookId';
        $this->statement=$this->con->prepare($sql);
        $this->statement->bindParam(':bookId',$bookId);
        $this->statement->bindParam(':title',$title);
        $this->statement->bindParam(':f_name',$f_name);
        $this->statement->bindParam(':category_id',$category);
        $this->statement->bindParam(':price',$price);
        $this->statement->bindParam(':stock',$stock);
        $this->statement->bindParam(':title',$title);
        $this->statement->bindParam(':status_id',$status);
        $this->statement->bindParam(':author_id',$author);
        $this->statement->bindParam(':publisher_id',$publisher);
        $this->statement->bindParam(':description',$description);
        $this->statement->bindParam(':edition',$edition);
        $this->statement->bindParam(':pages',$pages);
        $this->statement->bindParam(':rating',$rating);
        $this->statement->bindParam(':published_date',$published_date);
        $this->statement->bindParam(':discount',$discount);
        return $this->statement->execute();
    }

    public function deleteBook($bookId){
        $this->con=Database::connect();
        $sql='UPDATE books SET delete_status="deleted" WHERE books.id=:bookId';
        $this->statement=$this->con->prepare($sql);
        $this->statement->bindParam(':bookId',$bookId);
        return $this->statement->execute();
    }
}

?>