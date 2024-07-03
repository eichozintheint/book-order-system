<?php

session_start();
// var_dump($_SESSION['cartList']);
if(isset($_SESSION['cartList'])){
    unset($_SESSION['cartList']);
}

if(isset($_SESSION['total'])){
    unset($_SESSION['total']);
}

header('location:index.php');
// ---------------------------------------



?>