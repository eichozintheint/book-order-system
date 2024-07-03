<?php
include_once './includes/db.php';

class OrderDetail{
    private $con,$statement;

    public function addOrderDetail($order_id,$book_id,$book_qty){
        $this->con=Database::connect();
        $sql="INSERT INTO order_detail (order_id,book_id,qty) VALUES(:order_id,:book_id,:book_qty)";
        $this->statement=$this->con->prepare($sql);
        $this->statement->bindParam(':order_id',$order_id);
        $this->statement->bindParam(':book_id',$book_id);
        $this->statement->bindParam(':book_qty',$book_qty);
        return $this->statement->execute();
    }

    public function getOrderDetail($order_id){
        $this->con=Database::connect();
        $sql="select order_detail.order_id,books.title,books.price,order_detail.qty
              from order_detail join books
              on order_detail.book_id=books.id and order_detail.order_id=:order_id";
        $this->statement=$this->con->prepare($sql);
        $this->statement->bindParam(':order_id',$order_id);
        if($this->statement->execute()){
            $results=$this->statement->fetchAll(PDO::FETCH_ASSOC);
            return $results;
        }
    }
}

?>