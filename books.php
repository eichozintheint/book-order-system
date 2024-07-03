<?php
session_start();
include_once 'layout/header.php';
include_once 'controller/BookController.php';

$book_controller=new BookController();
$books=$book_controller->getBooks();
// var_dump($books);
?>

<div class="main">
<main class="sidebar-content">
            <h2>All Books</h2>
            <div class="d-flex flex-wrap">
                <?php
                foreach($books as $book)
                {
                    ?>
                        <div class="card mx-5 my-2 bg-light col-md-3" style="width: 23rem;">
                        <div class="card-body card" 
                            data-id="<?php echo $book['id'] ?>"
                            data-title="<?php echo $book['title'] ?>"
                            data-category="<?php echo $book['category'] ?>"
                            data-price="<?php echo $book['price'] ?>"
                        >
                                <!-- <h3>Book ID : <?php echo $book['id'] ?></h3> -->
                                <h5><?php echo $book['title'] ?></h5><br/>
                                <img src="BookImages/<?php echo htmlspecialchars($book['image']) ?>" width='100px' height='100px' alt=""><br/>
                                <p>Description : <?php echo $book['description'] ?></p>
                                <p>Category : <?php echo $book['category'] ?></p>
                                <p>Author : <b><?php echo $book['author'] ?></b></p>
                                <p>Publisher : <?php echo $book['publisher'] ?></p>
                                <p>Status : <?php echo $book['status'] ?></p>
                                <p>Price : <?php echo $book['price'] ?></p>
                                <p>Edition : <?php echo $book['edition'] ?></p>
                                <p>Pages : <?php echo $book['pages'] ?></p>
                                <p>Rating : <?php echo $book['rating'] ?></p>
                                <?php
                                    if(isset($_SESSION['user_id']))
                                    {
                                ?>
                                <form action="">
                                    <input type="hidden" id="currentPage" value="<?php echo $_SERVER['REQUSET_URI']; ?>">
                                    <button class="btn btn-dark mb-3 addToCart">Add to Cart</button>
                                </form>
                                <?php
                                    }else{
                                ?>
                                <form action="login.php">
                                    <button type="button" class="btn btn-dark mb-3" onclick="alert('Please log in to add items to your cart.'); window.location.href='login.php';">Add to Cart</button>
                                </form>
                                <?php
                                    }
                                ?>
                        </div>
                        </div>
                    <?php
                }
                    ?>
            </div>
            </div>
            
</main>
</div>

<!-- <div class="container">
        <h2>Books Page</h2>
        <div class="">
        
            <a href="cartList.php" class="btn btn-info">View Cart List</a>
            <span class="book-count"></span>
        </div>
        <div class="row m-3">
        <?php
                foreach($books as $book)
                {
                    ?>
                        <div class="col-md-3 bg-light" 
                            data-id="<?php echo $book['id'] ?>"
                            data-title="<?php echo $book['title'] ?>"
                            data-category="<?php echo $book['category'] ?>"
                            data-price="<?php echo $book['price'] ?>"
                        >
                            <h3>Book ID : <?php echo $book['id'] ?></h3>
                            <h3>Book Title : <?php echo $book['title'] ?></h3>
                            <p>Description : <?php echo $book['description'] ?></p>
                            <p>Category : <?php echo $book['category'] ?></p>
                            <p>Author : <b><?php echo $book['author'] ?></b></p>
                            <p>Publisher : <?php echo $book['publisher'] ?></p>
                            <p>Status : <?php echo $book['status'] ?></p>
                            <p>Price : <?php echo $book['price'] ?></p>
                            <p>Edition : <?php echo $book['edition'] ?></p>
                            <p>Pages : <?php echo $book['pages'] ?></p>
                            <p>Rating : <?php echo $book['rating'] ?></p>
                            <?php
                                if(isset($_SESSION['user_id']))
                                {
                            ?>
                            <form action="">
                                <button class="btn btn-dark mb-3 addToCart">Add to Cart</button>
                            </form>
                            <?php
                                }
                            ?>
                            
                        </div>
                    <?php
                }
            ?>
        </div>
</div> -->
<?php
include_once 'layout/footer.php';
?>