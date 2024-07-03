<?php
session_start();

$book_id=$_POST['id'];
$title=$_POST['title'];
$category=$_POST['category'];
$price=$_POST['price'];

$cartList=[];
$cartList['id']=$book_id;
$cartList['title']=$title;
$cartList['category']=$category;
$cartList['price']=$price;

if (!isset($_SESSION['cartList'])) {
    $_SESSION['cartList'] = [];
}

array_push($_SESSION['cartList'],$cartList);

$cartList_count = isset($_SESSION['cartList']) ? count($_SESSION['cartList']) : 0;
$_SESSION['cartListCount']=$cartList_count;

echo "success";
?>


