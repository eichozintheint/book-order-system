<?php
session_start();
include_once 'controller/BookController.php';
include_once 'controller/CategoryController.php';
include_once 'controller/AuthorController.php';
include_once 'controller/PublisherController.php';
include_once 'controller/UserController.php';

$book_controller=new BookController();
$books=$book_controller->getBooks();

$category_controller=new CategoryController();
$categories=$category_controller->getCategories();

$author_controller=new AuthorController();
$authors=$author_controller->getAuthors();

$publisher_controller=new PublisherController();
$publishers=$publisher_controller->getPublishers();

$loggedin_user_id=$_SESSION['user_id'];

$user_controller=new UserController();
$user=$user_controller->getLoggedInUser($loggedin_user_id);

if(isset($_GET['order_status']) && $_GET['order_status']=="success"){
  echo "<script>alert('Order is added successfully and Check your email for more info!')</script>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BookHeaven - Online Book Sales</title>
    <link rel="stylesheet" href="css/reset.css">
    
    <link rel="stylesheet" href="css/slick-theme.css">
    <link rel="stylesheet" href="css/slick.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
</head>
<body>
  <!-- container -->
    <div class="container">
     
      <!-- mainvisual -->
        <div class="mainvisual-index">
          <!-- header -->
            <header class="inner-index">
                  <h1 class="index-logo"><a href="index.php">BookHeaven</a></h1>        
                  <nav class="index">
                    <ul>
                      <li class="active"><a href="index.php">HOME</a></li>
                      <li><a href="author.php">AUTHORS</a> </li>
                      <li><a href="category.php">CATEGORYS</a></li>
                      <li><a href="books.php">BOOK NAME</a></li>
                      <?php
                      // session_start();
                        
                      if(isset($_SESSION['cartListCount'])){
                        $cartList_count=$_SESSION['cartListCount'];
                      }else{
                        $cartList_count=0;
                      }
                      
                        if(isset($loggedin_user_id))
                        {
                          echo " <li><a href='logout.php'>LOG OUT</a></li>";
                          echo "<li class='user-icon'>
                                  <a><i class='fa-solid fa-user fa-lg'></i></a>
                                  <div class='user-info'>
                                    <h3>Username: " . htmlspecialchars($user['username']) . "</h3>
                                    <h3>Email: " . htmlspecialchars($user['email']) . "</h3>
                                    <h3>Phone: " . htmlspecialchars($user['phone']) . "</h3>
                                  </div>
                                </li>";
                          echo " <li><a href='cartList.php' class='cart-container'><i class='fa-solid fa-cart-shopping fa-2x'></i><span class='cart-badge'>$cartList_count</span></a></li>";
                        }
                        else
                        {
                          echo " <li><a href='login.php'>LOG IN</a></li>";
                        }
                      ?>                     
                    </ul>
                  </nav>

                  <!-- <div class="user-info">
                        <h3>Username : <?php echo $user['username']; ?></h3>
                        <h3>Email : <?php echo $user['email']; ?></h3>
                        <h3>Phone : <?php echo $user['phone']; ?></h3>
                  </div> -->
                  
            </header>
          <!-- /header -->

          <!-- banner -->
          
          <!-- /banner -->
        </div>

        <div class="filler"></div>

        <div class="slider">
            <div class="multi-slider com-slider index-slider">
              <div>
                  <img src="img/book_07.jpg" alt="html">
              </div>
              <div>
                <img src="img/book_04.jpg" alt="html">
              </div>
              <div>
                <img src="img/book_04.jpg" alt="html">
              </div>
              <div>
                <img src="img/book_04.jpg" alt="html">
              </div>
              <div>
                <img src="img/book_04.jpg" alt="html">
              </div>
              <div>
                <img src="img/book_04.jpg" alt="html">
              </div>
            </div>   
          </div>

        <!-- / mainvisual -->
        <!-- content -->
        <div class="content">
          <!-- service-container -->
          <div class="service-container inner-index-div">
            <h3><span>AUTHORS</span></h3>
            <div class="display-service">
              <div class="service-item">
                <div class="author-image">
                  <img src="img/jk_rowling.jpg" alt="author">              
                </div>
                 <h4 class="service-title">J.K. Rowling</h4>
                 <!-- <P class="service-text">Vestassapede et donec ut est libe ros sus et eget sed eget quisq ueta habitur augue
                  Vestassapede et donec ut est libe ros sus et eget sed eget quisq ueta habitur augue
                 </P> -->
              </div>
              <div class="service-item">
              <div class="author-image">
                  <img src="img/stepen_king.jpg" alt="author">              
                </div>            
                 <h4 class="service-title">Stephen King</h4>
              </div>
              <div class="service-item">
              <div class="author-image">
                  <img src="img/jrr_tolkien.jpg" alt="author">              
                </div>             
                 <h4 class="service-title">J.R.R. Tolkien</h4>
              </div>
              <div class="service-item">
              <div class="author-image">
                  <img src="img/rr_ martin.jpg" alt="author">              
                </div>             
                 <h4 class="service-title">George R.R. Martin</h4>
              </div>
            </div>
          </div>
          <!-- /service-container -->

          <div class="inner-index-div best-book">
            <img src="img/best-book.jpg" alt="best book">
           </div>

          <!-- work-container -->
          <div class="work-container inner-index-div">
            <h3><span>CATEGORY</span></h3>
            <div class="display-work">
              <ul class=" work-list clearfix">
                <li class="cat-img"><img src="img/medical_book.jpg" alt="work-image"><p class="work-p">Health and Medical</p></li>
                <li class="cat-img"><img src="img/computer_internet.jpg" alt="work-image"><p class="work-p">Computer and Internet</p></li>
                <li class="cat-img"><img src="img/technology.jpeg" alt="work-image"><p class="work-p">Technology</p></li>
                <li class="cat-img"><img src="img/business_management.jpg" alt="work-image"><p class="work-p">Business and Management</p></li>
                <li class="cat-img"><img src="img/travel_geography.jpg" alt="work-image"><p class="work-p">Travel and Geography</p></li>
                <li class="cat-img"><img src="img/policy.jpg" alt="work-image"><p class="work-p">Politics</p></li>
                <li class="cat-img"><img src="img/education.jpg" alt="work-image"><p class="work-p">Education</p></li>
                <li class="cat-img"><img src="img/language.jpg" alt="work-image"><p class="work-p">Language</p></li>
                <li class="cat-img"><img src="img/sport.jpg" alt="work-image"><p class="work-p">Sport</p></li>
                <li class="cat-img"><img src="img/cooking_food.jpg" alt="work-image"><p class="work-p">Cooking and Food</p></li>
                <li class="cat-img"><img src="img/children.jpg" alt="work-image"><p class="work-p">Children Book</p></li>
                <li class="cat-img"><img src="img/fiction.jpg" alt="work-image"><p class="work-p">Fiction</p></li>
              </ul>

            </div>
          </div>
          <!-- /work-container -->
          <div class="service-container inner-index-div">
            <h3><span>BOOK NAME</span></h3>
            <div class="display-service">
              <div class="service-item">
                <img src="BookImages/1719730340computer.jpg" width="225px" height="200px" alt="service">              
                 <h5 class="service-title">COMPUTER AND INTERNET</h5>
                 <P class="service-text">Vestassapede et donec ut est libe ros sus et eget sed eget quisq ueta habitur augue
                  Vestassapede et donec ut est libe ros sus et eget sed eget quisq ueta habitur augue
                 </P>
              </div>
              <div class="service-item">
              <img src="BookImages/1719731755children.jpg" width="225px" height="200px" alt="service">              
              <h5 class="service-title">SAY MY NAME CHILDERN BOOK</h5>
                 <P class="service-text">Vestassapede et donec ut est libe ros sus et eget sed eget quisq ueta habitur augue</P>
              </div>
              <div class="service-item">
              <img src="BookImages/1719731605cooking.jpg" width="225px" height="200px" alt="service">              
              <h5 class="service-title">ROALD DAHL'S COOKBOOK</h5>
                 <P class="service-text">Vestassapede et donec ut est libe ros sus et eget sed eget quisq ueta habitur augue</P>
              </div>
              <div class="service-item">
              <img src="BookImages/1719731171education.jpg" width="225px" height="200px" alt="service">              
              <h5 class="service-title">PERSPECITVE IN EDUCATION</h5>
                 <P class="service-text">Vestassapede et donec ut est libe ros sus et eget sed eget quisq ueta habitur augue</P>
              </div>
            </div>
          </div>
         </div>
         <!-- /content -->
         <!-- footer -->
        <footer>
          <div class="footer">
            <div class="location-info">
              <h2>BookHeaven</h2>
              <h3><i class="fa-solid fa-phone"></i> Contact : +959776762559</h3>
              <h3><i class="fa-solid fa-envelope"></i> Email : bookheaven.gmail.com</h3>
              <h3><i class="fa-brands fa-facebook"></i> Facebook : https://www.facebook.com/bookheavenonlinebooksales</h3>
              <h3><i class="fa-solid fa-location-dot"></i> Location : Kyauk Myaung Street,Tamwe Township,Yangon</h3>
            </div>
          </div>
          <div class="location-map">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d5139.762724409611!2d96.17463782474205!3d16.803543929911534!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30c1ecc8f3749e61%3A0x9e8be4b57c0f92d1!2sTamwe%20Township%2C%20Yangon!5e0!3m2!1sen!2smm!4v1719507155869!5m2!1sen!2smm" width="500" height="250" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
          </div>
          <div class="copyright">
            <p>Copyright &copy; 2024 BookHeaven - All Right Reserved</p>
          </div>
        </footer>
        <!-- /footer -->
    </div>
    <!-- /container -->
    <script src="js/jquery-3.7.1.min.js"></script>
    <script src="js/jquery.heightLine.js"></script>
    <script src="js/slick.min.js"></script>
    <script src="js/style.js"></script>
</body>
</html>