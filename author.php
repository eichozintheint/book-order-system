<?php
include_once 'layout/header.php';
include_once 'controller/AuthorController.php';
include_once 'controller/BookController.php';

session_start();

$author_controller=new Author();
$authors=$author_controller->getAuthors();

$book_controller=new BookController();
$books=$book_controller->getBooks();

?>

<div class="main">
        <aside class="sidebar">
            <h2 class="text-dark">Authors</h2>

            <?php
                foreach($authors as $author)
                {
                    echo "<a href='booksByAuthor.php?id=".$author['id']."'>".$author['name']."</a><hr/>";
                }
            ?>
        </aside>
        <main class="sidebar-content">
            <h2>All Books</h2>
            <div class="d-flex flex-wrap">
                <?php
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
                                <!-- <h5>Book ID : <?php echo $book['id'] ?></h5> -->
                                <h5><?php echo $book['title'] ?></h5><br/>
                                <img src="BookImages/<?php echo $book['image'] ?>" width='100px' height='100px' alt=""><br/>
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


<!-- <div class="main">
        <aside class="sidebar">
            <h2 class="text-dark">Authors</h2>

            <?php
                foreach($authors as $author)
                {
                    echo "<a href='booksByAuthor.php?id=".$author['id']."'>".$author['name']."</a><hr/>";
                }
            ?>

            
            
        </aside>
        <main class="sidebar-content">
            <h2> James</h2>
            <div class="d-flex flex-wrap">
                <div class="card m-3" style="width: 18rem;">
                 
                  <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                  </div>
                </div>
                <div class="card m-3" style="width: 18rem;">
                
                  <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                  </div>
                </div>
                <div class="card m-3" style="width: 18rem;">
                  
                  <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                  </div>
                </div>
                <div class="card m-3" style="width: 18rem;">
                  
                  <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                  </div>
                </div>
                <div class="card m-3" style="width: 18rem;">
                  
                  <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                  </div>
                </div>
                <div class="card m-3" style="width: 18rem;">
                 
                  <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                  </div>
                </div>
                <div class="card m-3" style="width: 18rem;">
                  
                  <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                  </div>
                </div>
            </div>
            
        </main>
</div> -->
<?php
include_once 'layout/footer.php';
?>