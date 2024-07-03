<?php
session_start();

if (isset($_POST['deleteItemId']) && !empty($_POST['deleteItemId'])) {
    $id = $_POST['deleteItemId'];

    if (isset($_SESSION['cartList']) && is_array($_SESSION['cartList'])) {
        if (isset($_SESSION['cartList'][$id])) {
            unset($_SESSION['cartList'][$id]);

            if (!empty($_SESSION['cartList'])) {
                $_SESSION['cartList'] = array_values($_SESSION['cartList']);
            }

            $count = count($_SESSION['cartList']);
            echo $count;
            exit;
        } else {
            echo "Item not found";
            exit;
        }
    } else {
        echo "Cart is empty";
        exit;
    }
} else {
    echo "Invalid item ID";
    exit;
}

// echo "fail";
?>





