<?php
include_once './includes/db.php';

class Order{
    private $con,$statement;

    public function addOrder($user_id,$township_id,$receiver_name,$receiver_phone,$receiver_address,$payment_typeId,$totalPrice,$totalQty,$total){
        $this->con=Database::connect();
        $sql='INSERT INTO orders(user_id,township_id,receiver_name,receiver_phone,receiver_address,payment_type_id,total_price,total_qty,total) VALUES (:user_id,:township_id,:receiver_name,:receiver_phone,:receiver_address,:payment_type_id,:total_price,:total_qty,:total)';
        $this->statement=$this->con->prepare($sql);
        $this->statement->bindParam(':user_id',$user_id);
        $this->statement->bindParam(':township_id',$township_id);
        $this->statement->bindParam(':receiver_name',$receiver_name);
        $this->statement->bindParam(':receiver_phone',$receiver_phone);
        $this->statement->bindParam(':receiver_address',$receiver_address);
        $this->statement->bindParam(':payment_type_id',$payment_typeId);
        $this->statement->bindParam(':total_price',$totalPrice);
        $this->statement->bindParam(':total_qty',$totalQty);
        $this->statement->bindParam(':total',$total);
        return $this->statement->execute();
    }

    public function getLastInsertedId(){
        $this->con=Database::connect();
        return $this->con->lastInsertId();
    }

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
}
?>