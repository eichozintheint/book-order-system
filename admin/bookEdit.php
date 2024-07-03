<?php

include_once 'controller/CategoryController.php';
include_once 'controller/StatusController.php';
include_once 'controller/AuthorController.php';
include_once 'controller/PublisherController.php';
include_once 'controller/BookController.php';

$bookId=$_GET['id'];

$category_controller=new CategoryController();
$categories=$category_controller->getCategories();

$status_controller=new StatusController();
$statusData=$status_controller->getStatus();

$author_controller=new AuthorController();
$authors=$author_controller->getAuthors();

$publisher_controller=new PublisherController();
$publishers=$publisher_controller->getPublishers();

$book_controller=new BookController();
$book=$book_controller->getBook($bookId);

if(isset($_POST['updateBookBtn'])){
    $error=false;

    if(!empty($_POST['title'])){
        $title=$_POST['title'];
    }else{
        $error=true;
        $title_err="Please enter book title";
    }

    $category=$_POST['category'];

    if(!empty($_POST['price'])){
        $price=$_POST['price'];
    }else{
        $error=true;
        $price_err="Please enter book price";
    }

    if(!empty($_POST['stock'])){
        $stock=$_POST['stock'];
    }else{
        $error=true;
        $stock_err="Please enter book stock";
    }

    $status=$_POST['status'];
    $author=$_POST['author'];
    $publisher=$_POST['publisher'];

    if(!empty($_POST['description'])){
        $description=$_POST['description'];
    }else{
        $error=true;
        $description_err="Please enter book description";
    }

    if(!empty($_POST['edition'])){
        $edition=$_POST['edition'];
    }else{
        $error=true;
        $edition_err="Please enter book edition";
    }

    if(!empty($_POST['pages'])){
        $pages=$_POST['pages'];
    }else{
        $error=true;
        $pages_err="Please enter book pages";
    }

    if(!empty($_POST['rating'])){
        $rating=$_POST['rating'];
    }else{
        $error=true;
        $rating_err="Please enter book rating";
    }

    if(!empty($_POST['published_date'])){
        $published_date=$_POST['published_date'];
    }else{
        $error=true;
        $published_date_err="Please enter book published_date";
    }

    if(!empty($_POST['discount'])){
        $discount=$_POST['discount'];
    }else{
        $discount=null;
    }

    error_reporting(E_ALL);
    ini_set('display_errors', 1);

        $filename=$_FILES['book_img']['name'];
        $tmp_name=$_FILES['book_img']['tmp_name'];
    
        $filetype=explode('.',$filename);
        $fileExtension=end($filetype);
        $filesize=$_FILES['book_img']['size'];
        $allowedFileTypes=['jpg','jpeg','png'];

        $uploads_dir = realpath(__DIR__ . '/../BookImages');
    
        $f_name=time().$filename;
        if (!move_uploaded_file($tmp_name, "$uploads_dir/$f_name")) {
            $error = true;
            echo "<script>alert('Error in uploading file')</script>";
        }
    
        // Update book in database
        if (!$error) {
            $updateBookResult = $book_controller->updateBook($bookId, $title, $f_name, $category, $price, $stock, $status, $author, $publisher, $description, $edition, $pages, $rating, $published_date, $discount);
            if ($updateBookResult) {
                // header('Location: books.php');
                echo "<script>alert('Book updated successfully')</script>";
            } else {
                echo "<script>alert('Error updating book')</script>";
            }
        }
}

include_once 'layout/adminheader.php';
?>
<main>
    <div class="container-fluid px-4">
        <div class="col-8"></div>
        <div class="col-4">
            <a href="books.php" class="btn btn-secondary">Back</a>
            <h1>Book Edit Form</h1>
            <form action="" method="post" enctype="multipart/form-data">
                <div class="form-group mb-3">
                    <label for="">Title</label>
                    <input type="text" name="title" id="" class="form-control" value="<?php echo $book['title']; ?>">
                    <?php
                        if(isset($_POST['updateBookBtn']) && !(empty($title_err))){
                            echo "<span class='text-danger'>".$title_err."</span>";
                        }
                    ?>
                </div>
                <div class="form-group mb-3">
                    <label for="">Image</label>
                    <input type="file" name="book_img" class="form-control" >
                    <?php
                        if(isset($_POST['updateBookBtn']) && !(empty($file_err))){
                            echo "<span class='text-danger'>".$file_err."</span>";
                        }
                    ?>
                </div>
                <div class="form-group mb-3">
                    <label for="">Category</label>
                    <select name="category" id="" class="form-control">
                        <option value="" selected disabled><?php echo $book['category'] ?></option>
                        <?php
                            foreach($categories as $category){
                                echo "<option value='".$category['id']."'>".$category['name']."</option>";
                            }
                        ?>
                    </select>
                </div>
                <div class="form-group mb-3">
                    <label for="">Price</label>
                    <input type="number" name="price" id="" class="form-control" value="<?php echo $book['price'] ?>">
                    <?php
                        if(isset($_POST['updateBookBtn']) && !(empty($price_err))){
                            echo "<span class='text-danger'>".$price_err."</span>";
                        }
                    ?>
                </div>
                <div class="form-group mb-3">
                    <label for="">Stock</label>
                    <input type="number" name="stock" id="" class="form-control" value="<?php echo $book['stock']; ?>">
                    <?php
                        if(isset($_POST['updateBookBtn']) && !(empty($stock_err))){
                            echo "<span class='text-danger'>".$stock_err."</span>";
                        }
                    ?>
                </div>
                <div class="form-group mb-3">
                    <label for="">Status</label>
                    <select name="status" id="" class="form-control" value="<?php if(!empty($status)) echo $status; ?>">
                        <option value="" selected disabled><?php echo $book['status'];?></option>
                        <?php
                            foreach($statusData as $statusOne){
                                echo "<option value='".$statusOne['id']."'>".$statusOne['name']."</option>";
                            }
                        ?>
                    </select>
                </div>
                <div class="form-group mb-3">
                    <label for="">Author</label>
                    <select name="author" id="" class="form-control" value="<?php if(!empty($author)) echo $author; ?>">
                        <option value="" selected disabled><?php echo $book['author'];?></option>
                        <?php
                            foreach($authors as $author){
                                echo "<option value='".$author['id']."'>".$author['name']."</option>";
                            }
                        ?>
                    </select>
                </div>
                <div class="form-group mb-3">
                    <label for="">Publisher</label>
                    <select name="publisher" id="" class="form-control" value="<?php if(!empty($publisher)) echo $publisher; ?>">
                        <option value="" selected disabled><?php echo $book['publisher'];?></option>
                        <?php
                            foreach($publishers as $publisher){
                                echo "<option value='".$publisher['id']."'>".$publisher['name']."</option>";
                            }
                        ?>
                    </select>
                </div>
                <div class="form-group mb-3">
                    <label for="">Description</label>
                    <textarea name="description" id="" class="form-control" value="<?php echo $book['description']; ?>"></textarea>
                    <?php
                        if(isset($_POST['updateBookBtn']) && !(empty($description_err))){
                            echo "<span class='text-danger'>".$description_err."</span>";
                        }
                    ?>
                </div>
                <div class="form-group mb-3">
                    <label for="">Edition</label>
                    <input type="number" name="edition" id="" class="form-control" value="<?php echo $book['edition']; ?>">
                    <?php
                        if(isset($_POST['updateBookBtn']) && !(empty($edition_err))){
                            echo "<span class='text-danger'>".$edition_err."</span>";
                        }
                    ?>
                </div>
                <div class="form-group mb-3">
                    <label for="">Pages</label>
                    <input type="number" name="pages" id="" class="form-control" value="<?php echo $book['pages']; ?>">
                    <?php
                        if(isset($_POST['updateBookBtn']) && !(empty($pages_err))){
                            echo "<span class='text-danger'>".$pages_err."</span>";
                        }
                    ?>
                </div>
                <div class="form-group mb-3">
                    <label for="">Rating</label>
                    <input type="number" name="rating" id="" class="form-control" value="<?php echo $book['rating']; ?>">
                    <?php
                        if(isset($_POST['updateBookBtn']) && !(empty($rating_err))){
                            echo "<span class='text-danger'>".$rating_err."</span>";
                        }
                    ?>
                </div>
                <div class="form-group mb-3">
                    <label for="">Published Date</label>
                    <input type="date" name="published_date" id="" class="form-control" value="<?php echo $book['publish_date']; ?>">
                    <?php
                        if(isset($_POST['updateBookBtn']) && !(empty($published_date_err))){
                            echo "<span class='text-danger'>".$published_date_err."</span>";
                        }
                    ?>
                </div>
                <div class="form-group mb-3">
                    <label for="">Discount</label>
                    <input type="number" name="discount" id="" class="form-control" value="<?php echo $book['discount']; ?>">
                </div>
                <div>
                    <button class="btn btn-dark" name="updateBookBtn">Update Book</button>
                </div>
            </form>
        </div>
    </div>
</main>
<?php
include_once 'layout/adminfooter.php';
?>