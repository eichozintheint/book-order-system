<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';
require 'PHPMailer/Exception.php';

header('Content-Type: application/json');

include_once 'controller/OrderController.php';
include_once 'controller/OrderDetailController.php';
include_once 'controller/DeliveryFeeController.php';

$order_id=$_POST['order_id'];
$receiver_email=$_POST['mail'];

$order_controller=new OrderController();
$order_status=$order_controller->updateStatus($order_id);
$order_information=$order_controller->getOrderInformation($order_id);
$township_id=$order_information['township_id'];

$deliveryFee_controller=new DeliveryFeeController();
$deliveryFee=$deliveryFee_controller->getDeliveryFee($township_id);

$orderDetail_controller=new OrderDetailController();
$order_details=$orderDetail_controller->getOrderDetail($order_id);

if($order_status){
    $mail=new PHPMailer;

    // SMTP server configuration 
    $mail->isSMTP();
    $mail->Host='smtp.gmail.com';
    $mail->SMTPAuth=TRUE;
    $mail->Username='eichozintheint2559@gmail.com';
    $mail->Password='gsih bheq fybg hvyz';
    $mail->SMTPSecure='ssl';
    $mail->Port=465;

    $mail->setFrom('eichozintheint2559@gmail.com','BookHeaven');

    $mail->addAddress($receiver_email);

    $mail->Subject='Book Order Confirmation';

    $mail->isHTML(true);

    

    $mailContent='<h2>Invoice</h2>';

    $mailContent.='<table border="1" cellpadding="5" cellspacing="0" style="width: 100%; border-collapse: collapse;">';
    $mailContent.="<thead>";
    $mailContent.="<tr>";
    $mailContent.="<th>No.</th>";
    $mailContent.="<th>Book Name</th>";
    $mailContent.="<th>Qty</th>";
    $mailContent.="<th>Price</th>";
    $mailContent.="</tr>";
    $mailContent.="</thead>";
    $mailContent.="<tbody>";

    $i=0;
    $total=0;
    foreach($order_details as $order_detail){
        $total+=($order_detail['price']*$order_detail['qty']);
        $mailContent.="<tr>";
        $mailContent.="<td>".(++$i)."</td>";
        $mailContent.="<td>".htmlspecialchars($order_detail['title'])."</td>";
        $mailContent.="<td>".htmlspecialchars($order_detail['qty'])."</td>";
        $mailContent.="<td>".htmlspecialchars($order_detail['price']*$order_detail['qty'])."</td>";
        $mailContent.="</tr>";
    }
    $mailContent.="<tr>";
    $mailContent.="<td colspan='3'>Total</td>";
    $mailContent.="<td>".htmlspecialchars($total)."</td>";
    $mailContent.="</tr>";
    
    $mailContent.="</tbody>";
    $mailContent.='</table>';

    $mailContent.='<p>Receiver Name : '.$order_information['receiver_name'].'</p>';
    $mailContent.='<p>Receiver Phone : '.$order_information['receiver_phone'].'</p>';
    $mailContent.='<p>Receiver Address : '.$order_information['receiver_address'].'</p>';
    $mailContent.='<p>Township : '.$order_information['township'].'</p>';
    $mailContent.='<p>Delivery Fee : '.$deliveryFee['price'].'</p>';
    $mailContent.='<p>Total : '.$order_information['total'].'</p>';
    $mailContent.='<p>Payment Type : '.$order_information['payment'].'</p>';

    $mail->Body=$mailContent;

    if ($mail->send()) {
        echo json_encode(['status' => 'success', 'message' => 'Mail has been sent to customer successfully']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Mail could not be sent']);
    }
}
?>