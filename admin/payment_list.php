<?php 
include_once 'layout/adminheader.php';
include_once 'controller/PaymentController.php';
$payment_controller=new PaymentController();
$payments=$payment_controller->getPayment();

?>
<div class="container">
    <div class="row mt-5">
        <div class="col-md-6 m-auto">
        <table class=" table table-striped col-md-5 m-auto ">
            <thead>
                <tr style="background-color:#01031f;color:#f4f4f4;">
                    <th>No</th>
                    <th>Payment Name</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                foreach($payments as $payment){     
                    
                        echo "<tr id='".$payment['id']."'>";
                        echo "<td>".$payment['id']."</td>";
                        echo "<td>".$payment['name']."</td>";
                        echo "</tr>";                                             
                    }                                 
                ?>
                
            </tbody>
        </table>
        </div>
    </div>

</div>
<?php 
include_once 'layout/adminfooter.php';
?>