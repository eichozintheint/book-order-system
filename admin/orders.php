<?php
include_once 'layout/adminheader.php';
include_once 'controller/OrderController.php';

$order_controller=new OrderController();
$orders=$order_controller->getOrders();
// var_dump($orders);


?>

<main>
    <div class="container-fluid px-4">
        <h1>Order Lists</h1>
        <table class="table table-sm table-striped" id="myTable">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Order Id</th>
                    <th>Username</th>
                    <th>Receiver Name</th>
                    <th>Receiver Phone</th>
                    <th>Receiver Address</th>
                    <th>Township</th>
                    <th>Payment</th>
                    <th>Total Price</th>
                    <th>Total Qty</th>
                    <th>Total</th>
                    <th>Order Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    $i=0;
                    foreach($orders as $order){
                        if($order['delete_status']==null){
                            echo "<tr class='order' id='".$order['id']."'>";
                            echo "<td>".(++$i)."</td>";
                            echo "<td>".$order['id']."</td>";
                            echo "<td mail='".$order['email']."'>".$order['email']."</td>";
                            echo "<td>".$order['receiver_name']."</td>";
                            echo "<td>".$order['receiver_phone']."</td>";
                            echo "<td>".$order['receiver_address']."</td>";
                            echo "<td>".$order['township']."</td>";
                            echo "<td>".$order['payment']."</td>";
                            echo "<td>".$order['total_price']."</td>";
                            echo "<td>".$order['total_qty']."</td>";
                            echo "<td>".$order['total']."</td>";
                            
                            if($order['order_status']=='pending'){
                                echo "<td><form action=''><button class='btn btn-warning orderApproveBtn'>Pending</button></form></td>";
                            }
                            else{
                                echo "<td><form action=''><button class='btn btn-info orderApproveBtn'>Approve</button></form></td>";
                            }

                            echo "<td><button class='btn btn-danger deleteOrder'>Delete</button></td>";
                            
                            echo "</tr>";
                        }
                    }
                ?>
            </tbody>
        </table>
    </div>
</main>

<?php
include_once 'layout/adminfooter.php';
?>