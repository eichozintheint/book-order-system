<?php
session_start();

include_once 'controller/RegionController.php';
include_once 'controller/PaymentController.php';
include_once 'controller/TownshipController.php';
include_once 'controller/DeliveryFeeController.php';
include_once 'controller/OrderController.php';
include_once 'controller/OrderDetailController.php';


$user_id=$_SESSION['user_id'];

// Total Price 
if (isset($_SESSION['totalPrice'])) {
    $totalPrice = $_SESSION['totalPrice'];
    // echo "Total Price: " . $totalPrice;
} else {
    echo "No total price found in session.";
}


// Total Qty 
if (isset($_SESSION['totalQty'])) {
    $totalQty = $_SESSION['totalQty'];
    // echo "Total Qty: " . $totalQty;
} else {
    echo "No total price found in session.";
}

// Books
if (isset($_SESSION['books'])) {
    $books = $_SESSION['books'];
    // var_dump($books);
} else {
    echo "No books found in session.";
}

if (isset($_SESSION['book_qtys'])) {
    $book_qtys = $_SESSION['book_qtys'];
    // var_dump($book_qtys);
} else {
    echo "No book_qtys found in session.";
}


$region_controller=new RegionController();
$regions=$region_controller->getRegions();

$township_controller=new TownshipController();
// $townships=$township_controller->getTownships();

$payment_controller=new PaymentController();
$payments=$payment_controller->getPayments();

$deliveryFee_controller=new DeliveryFeeController();
$deliveryFees=$deliveryFee_controller->getDeliveryFees();

$order_controller=new OrderController();

$orderDetail_controller=new OrderDetailController();



if(isset($_POST['confirmOrderInfo'])){
    if(isset($_SESSION['cartListCount'])){
        $_SESSION['cartListCount']=0;
    }
    $error=false;

    if(!empty($_POST['receiver_name'])){
        $receiver_name=$_POST['receiver_name'];
    }else{
        $error=true;
        $receiverName_err="Please enter receiver name";
    }

    if(!empty($_POST['receiver_phone'])){
        $receiver_phone=$_POST['receiver_phone'];
    }else{
        $error=true;
        $receiverPhone_err="Please enter receiver phone number";
    }

    if(!empty($_POST['receiver_phone'])){
        $receiver_phone=$_POST['receiver_phone'];
    }else{
        $error=true;
        $receiverPhone_err="Please enter receiver phone number";
    }

    if(!empty($_POST['receiver_address'])){
        $receiver_address=$_POST['receiver_address'];
    }else{
        $error=true;
        $receiverAddress_err="Please enter receiver address";
    }

    $region_id=$_POST['region'];
    $township_id=$_POST['township'];

    $payment_typeId=$_POST['payment'];

    foreach($deliveryFees as $deliveryFee){
        if($deliveryFee['township_id']==$township_id){
            $total=$totalPrice+$deliveryFee['price'];
        }
    }
    
    if(!$error){
        $status=$order_controller->addOrder($user_id,$township_id,$receiver_name,$receiver_phone,$receiver_address,$payment_typeId,$totalPrice,$totalQty,$total);
        if($status){
            $order_id=$order_controller->getLastInsertedId();
            foreach($books as $index=>$book_id){
                $book_qty=$book_qtys[$index];
                $orderDetail_controller->addOrderDetail($order_id,$book_id,$book_qty);
            }
            

            if(isset($_SESSION['cartList'])){
                unset($_SESSION['cartList']);
            }
            
            if(isset($_SESSION['total'])){
                unset($_SESSION['total']);
            }

            if(isset($_SESSION['books'])){
                unset($_SESSION['books']);
            }

            if(isset($_SESSION['book_qtys'])){
                unset($_SESSION['book_qtys']);
            }


            echo "<script>
                    alert('Thank you for your order. Please check your email');
                    window.location.href = 'index.php';
                </script>";

            
        }
    }
    
}
include_once 'layout/header.php';
?>
<div class="main orderForm">
    <main class="sidebar-content">
    <div class="container my-5">
    <div class="row">
        <div class="col-4"></div>
        <div class="col-4 order-form">
            <h2 class="order-form-title">ORDER FORM</h2>
            <form id="orderForm" action="" method="post"> 
                <h4 class="mt-4">Order Information</h4>
                <div>
                    <p>Total Quantity : <span class="float-end"><?php echo $totalQty; ?></span></p>
                    <p>Total Price : <span class="float-end"><?php echo $totalPrice; ?> Ks</span></p>
                </div>
                <h4 class="mt-4">Delivery Information</h4>
                <div class="form-group my-3">
                    <label for="">Receiver Name</label>
                    <input type="text" name="receiver_name" id="receiver_name" class="form-control">
                    <?php
                        if(isset($_POST['order']) && !empty($receiverName_err)){
                            echo "<span class='text-danger'>".$receiverName_err."</span>";
                        }
                    ?>
                </div>
                <div class="form-group my-3">
                    <label for="">Receiver Phone</label>
                    <input type="text" name="receiver_phone" id="receiver_phone" class="form-control">
                    <?php
                        if(isset($_POST['order']) && !empty($receiverPhone_err)){
                            echo "<span class='text-danger'>".$receiverPhone_err."</span>";
                        }
                    ?>
                </div>
                <div class="form-group my-3">
                    <label for="">Receiver Address</label>
                    <input type="text" name="receiver_address" id="receiver_address" class="form-control">
                    <?php
                        if(isset($_POST['order']) && !empty($receiverAddress_err)){
                            echo "<span class='text-danger'>".$receiverAddress_err."</span>";
                        }
                    ?>
                </div>
                <div class="form-group my-3">
                    <label for="">Select Region</label>
                    <select name="region" id="region" class="form-control">
                        <option value="" disabled selected>-- Select Region --</option>
                        <?php
                            foreach($regions as $region){
                                echo "<option id='".$region['id']."' value='".$region['id']."'>".$region['name']."</option>";
                            }
                        ?>
                    </select>
                    <?php
                        if(isset($_POST['order']) && empty($region_id)){
                            echo "<span class='text-danger'>Please select region</span>";
                        }
                    ?>
                </div>
                <div class="form-group">
                    <label for="">Township</label>
                    <select name="township" id="township" class="form-control">
                        
                    </select>
                    <?php
                        if(isset($_POST['order']) && empty($township_id)){
                            echo "<span class='text-danger'>Please select township</span>";
                        }
                    ?>
                </div>
                <h4 class="mt-5">Payment Information</h4>
                <div class="form-group my-3">
                    <label for="">Payment Type</label>
                    <select name="payment" id="payment" class="form-control">
                        <option selected disabled>--Select Payment Type--</option>
                        <?php
                            foreach($payments as $payment){
                                echo "<option value='".$payment['id']."'>".$payment['name']."</option>";
                            }
                        ?>
                    </select>
                    <?php
                        if(isset($_POST['order']) && empty($payment_typeId)){
                            echo "<span class='text-danger'>Please select payment type</span>";
                        }
                    ?>
                </div>
                <div>
                    <button class="btn btn-dark float-end place-order" name="order" id="orderConfirm" data-toggle="modal" data-target="#exampleModalCenter">Place Order</button>
                    <div class="modal fade modal-box" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">Order Information</h5>
                                <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close"> -->
                                <!-- <span aria-hidden="true">&times;</span> -->
                                </button>
                            </div>
                            <div class="modal-body">
                                <p id="modalTotalQty"></p>
                                <p id="modalSubtotalPrice"></p>
                                <p id="modalReceiverName"></p>
                                <p id="modalReceiverPhone"></p>
                                <p id="modalReceiverAddress"></p>
                                <p id="modalDeliveryFee"></p>
                                <p id="modalTotalPrice"></p>
                                <p id="modalReceiverPayment"></p>
                            </div>
                            <div class="modal-footer">
                                <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
                                <button type="submit" class="btn btn-dark" name="confirmOrderInfo">Confirm Order</button>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
    </main>
</div>



<?php
include_once 'layout/footer.php';
$reg=json_encode($regions);
$towns=json_encode($townships);
$paymentTypes=json_encode($payments);
$deliveryFees=json_encode($deliveryFees)
?>
<script>
let regions='<?php echo $reg; ?>'
let towns='<?php echo $towns; ?>'
let payments='<?php echo $paymentTypes; ?>'
let deliveryFees='<?php echo $deliveryFees; ?>'
const regionArray = JSON.parse(regions)
const townArray = JSON.parse(towns)
const paymentArray = JSON.parse(payments)
const deliverFeeArray = JSON.parse(deliveryFees)
    console.log(deliveryFees)


document.getElementById('orderConfirm').addEventListener('click', function(event) {
    event.preventDefault();
    var receiverName = document.getElementById('receiver_name').value;
    var receiverPhone = document.getElementById('receiver_phone').value;
    var receiverAddress = document.getElementById('receiver_address').value;
    var regionId = document.getElementById('region').value;
    var matchingRegion = regionArray.find(function(region) {
        if(region.id == regionId)
            return region.name;
        });
    console.log(matchingRegion)

    var townshipId = document.getElementById('township').value;
    var total='<?php echo $totalPrice; ?>'
    let t=parseInt(total)
    var matchingDelivery = deliverFeeArray.find(function(deliveryFee){
        if(deliveryFee.id == townshipId){
                document.getElementById('modalDeliveryFee').textContent = 'Delivery Fee: ' + deliveryFee.price;
                t+=parseInt(deliveryFee.price)
        }
    })
    console.log(t)
    // var data = function(){
    //     $.ajax({
    //     url:'townshipName.php',
    //     method:'post',
    //     data:{regionId:regionId},
    //     success:function(response){
    //         let townships=JSON.parse(response)
    //         var matchingTownship = townships.find(function(township) {
    //             if(township.id == townshipId)
    //                 return township.name;
    //             });
    //         console.log(matchingTownship)
    //         return matchingTownship
    //         }
    //     })
    // }
    // console.log(data)
    
    var paymentId = document.getElementById('payment').value;
    var matchingPayment = paymentArray.find(function(payment) {
        if(payment.id == paymentId)
            return payment.name;
        });
    console.log(matchingPayment)
    
    
    document.getElementById('modalReceiverName').textContent = 'Receiver Name: ' + receiverName;
    document.getElementById('modalReceiverPhone').textContent = 'Receiver Phone: ' + receiverPhone;
    document.getElementById('modalReceiverAddress').textContent = 'Receiver Address: ' + receiverAddress + ', '  + matchingRegion.name;
    document.getElementById('modalReceiverPayment').textContent = 'Payment Type: ' + matchingPayment.name;
    document.getElementById('modalTotalQty').textContent = 'Total Qty: ' + '<?php echo $totalQty; ?>';
    document.getElementById('modalSubtotalPrice').textContent = 'Subtotal Price: ' + '<?php echo $totalPrice; ?>';
    document.getElementById('modalTotalPrice').textContent = 'Total Price: ' + t;
    
    $('#exampleModalCenter').modal('show');
});

document.querySelector('[name="confirmOrderInfo"]').addEventListener('click', function() {
    document.getElementById('orderForm').submit();
});
</script>

