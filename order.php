<?php
session_start();

$totalPrice=$_POST['total_price'];
$_SESSION['totalPrice']=$totalPrice;

$totalQty=$_POST['total_qty'];
$_SESSION['totalQty']=$totalQty;
// echo $_SESSION['totalQty'];

$books=$_POST['books'];
$_SESSION['books']=$books;

$book_qtys=$_POST['book_qtys'];
$_SESSION['book_qtys']=$book_qtys;
// var_dump($_SESSION['book_qtys']);

echo "success";
?>
