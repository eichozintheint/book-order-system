<?php
session_start();
include_once 'layout/header.php';
include_once 'controller/BookController.php';
include_once 'controller/CategoryController.php';

$category_id=$_GET['id'];

$category_controller=new CategoryController();
$categories=$category_controller->getCategories();

$book_controller=new BookController();
$books=$book_controller->getBooksByCategory($category_id);
// var_dump($books);

?> 

<div class="main">
        <aside class="sidebar">
            <h2 class="text-dark">Categories</h2>

            <?php
                foreach($categories as $category)
                {
                    echo "<a href='booksByCategory.php?id=".$category['id']."'>".$category['name']."</a><hr/>";
                }
            ?>

            
            
        </aside>
        <main class="sidebar-content">
        <?php
            // if (isset($books[$category_id]['category'])) {
            //     echo "<h2>{$books[$category_id]['category']}</h2>";
            // } else {
            //     echo "<h2>Category not found.</h2>";
            // }
            
        ?>
            <div class="d-flex flex-wrap">
                
                <?php
                if(empty($books)){
                    echo "<div>No books for this category!</div>";
                }
                foreach($books as $book)
                {
                    ?>
                    <div class="card m-3 bg-light col-md-3" style="width: 23rem;">
                        <div class="card-body card" 
                            data-id="<?php echo $book['id'] ?>"
                            data-title="<?php echo $book['title'] ?>"
                            data-category="<?php echo $book['category'] ?>"
                            data-price="<?php echo $book['price'] ?>"
                        >
                                <!-- <h3>Book ID : <?php echo $book['id'] ?></h3> -->
                                <h5><?php echo $book['title'] ?></h5><br/>
                                <img src="BookImages/<?php echo $book['image'] ?>" width='100px' height='100px' alt=""><br/>
                                <p>Description : <?php echo $book['description'] ?></p>
                                <p class="text-danger">Category : <?php echo $book['category'] ?></p>
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
    
<?php
include_once 'layout/footer.php';
?>
