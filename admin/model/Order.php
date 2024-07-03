<?php

include_once './includes/db.php';

class Order{
    private $con,$statement;

    public function getOrders()
    {
        $this->con=Database::connect();
        $sql='select orders.id,users.email,townships.name as township,orders.receiver_name,orders.receiver_phone,orders.receiver_address,payment_types.name as payment,orders.order_status,orders.total_price,orders.total_qty,orders.total,orders.delete_status
              from orders join users join townships join payment_types
              on orders.user_id=users.id and orders.township_id=townships.id and orders.payment_type_id=payment_types.id';
        $this->statement=$this->con->prepare($sql);
        if($this->statement->execute())
        {
            $results=$this->statement->fetchAll(PDO::FETCH_ASSOC);
            return $results;
        }
    }

    public function updateStatus($order_id)
    {
        $this->con=Database::connect();
        $sql='update orders set order_status="approve" where id=:order_id';
        $this->statement=$this->con->prepare($sql);
        $this->statement->bindParam(':order_id',$order_id);
        return $this->statement->execute();
    }

    public function deleteOrder($orderId)
    {
        $this->con=Database::connect();
        $sql='update orders set delete_status="deleted" where id=:orderId';
        $this->statement=$this->con->prepare($sql);
        $this->statement->bindParam(':orderId',$orderId);
        return $this->statement->execute();
    }

    public function getOrderInformation($order_id){
        $this->con=Database::connect();
        $sql='select orders.receiver_name,orders.receiver_phone,orders.receiver_address,orders.township_id,townships.name as township,payment_types.name as payment,orders.total
            from orders join townships join payment_types
            on orders.township_id=townships.id and orders.payment_type_id=payment_types.id and orders.id=:order_id';
        $this->statement=$this->con->prepare($sql);
        $this->statement->bindParam(':order_id',$order_id);
        if($this->statement->execute()){
            $result=$this->statement->fetch(PDO::FETCH_ASSOC);
            return $result;
        }

    }
    
    public function getPendingOrder(){
        $this->con=Database::connect();
        $sql="select * from orders where order_status='pending'";
        $this->statement=$this->con->prepare($sql);
        if($this->statement->execute()){
            $results=$this->statement->fetchAll(PDO::FETCH_ASSOC);   
            return $results;    
        }
    }

    public function getApproveOrder(){
        $this->con=Database::connect();
        $sql="select * from orders where order_status='approve'";
        $this->statement=$this->con->prepare($sql);
        if($this->statement->execute()){
            $results=$this->statement->fetchAll(PDO::FETCH_ASSOC);   
            return $results;    
        }
    }
}


?>