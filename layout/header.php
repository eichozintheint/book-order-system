<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BookHeaven - Online Book Sales</title>
    <link rel="stylesheet" href="css/reset.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="css/slick-theme.css">
    <link rel="stylesheet" href="css/slick.css">
    <link rel="stylesheet" href="css/style.css">  

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
  <!-- container -->
<div class="con">   
      <!-- mainvisual -->
        <div class="mainvisual">
          <!-- header -->
            <header class="inner">
                  <h1 class="logo"><a href="index.php">BookHeaven</a></h1>        
                  <nav>
                    <ul>
                      <li class="active"><a href="index.php">HOME</a></li>
                      <li><a href="author.php">AUTHORS</a> </li>
                      <li><a href="category.php">CATEGORYS</a></li>
                      <li><a href="books.php">BOOK NAME</a></li>
                      <?php
                        session_start();
                        $loggedin_user_id=$_SESSION['user_id'];

                        // $cartList_count=count($_SESSION['cartList']);

                        if(isset($_SESSION['cartListCount'])){
                          $cartList_count=$_SESSION['cartListCount'];
                        }else{
                          $cartList_count=0;
                        }

                        if(isset($loggedin_user_id))
                        {
                          echo " <li><a href='logout.php'>LOG OUT</a></li>";
                          echo " <li><a href='cartList.php' class='cart-container'><i class='fa-solid fa-cart-shopping fa-2x'></i><span class='cart-badge'>$cartList_count</span></a></li>";
                        }
                        else
                        {
                          echo " <li><a href='login.php'>LOG IN</a></li>";
                        }
                      ?>                       
                    </ul>
                  </nav>                 
            </header>
</div>
          <!-- /header -->