<?php

include_once 'controller/CategoryController.php';
include_once 'controller/StatusController.php';
include_once 'controller/AuthorController.php';
include_once 'controller/PublisherController.php';
include_once 'controller/BookController.php';

$category_controller=new CategoryController();
$categories=$category_controller->getCategories();

$status_controller=new StatusController();
$statusData=$status_controller->getStatus();

$author_controller=new AuthorController();
$authors=$author_controller->getAuthors();

$publisher_controller=new PublisherController();
$publishers=$publisher_controller->getPublishers();

$book_controller=new BookController();

if(isset($_POST['addBookBtn'])){
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

    $filename=$_FILES['book_img']['name'];
    $tmp_name=$_FILES['book_img']['tmp_name'];

    $filetype=explode('.',$filename);
    $fileExtension=end($filetype);
    $filesize=$_FILES['book_img']['size'];
    $allowedFileTypes=['jpg','jpeg','png','heic'];

    // $tmp_name,'../BookImages/'.$f_name
    $uploads_dir = realpath(__DIR__ . '/../BookImages');

    $f_name=time().$filename;
    
    if($_FILES['book_img']['error']==0){
        if(in_array($fileExtension,$allowedFileTypes)){
            if($filesize<10000000){
                if(move_uploaded_file($tmp_name, "$uploads_dir/$f_name")){
                    echo "<alert>Image is uploaded successfully</alert>";
                }
            }else{
                $error=true;
                echo "File type is exceed 10MB";
            }
        }else{
            $error=true;
            echo "File Type is not allowed";
        }
    }else{
        $error=true;
        echo "Error in image uploading";
    }

    if(!$error){
        
        $addBookResult=$book_controller->addBook($title,$f_name,$category,$price,$stock,$status,$author,$publisher,$description,$edition,$pages,$rating,$published_date,$discount);
        if($addBookResult){
            echo "<script>alert('New book is added successfully')</script>";
            header('location:books.php');
        }else{
            echo "error";
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
            <h1>Book Create Form</h1>
            <form action="" method="post" enctype="multipart/form-data">
                <div class="form-group mb-3">
                    <label for="">Title</label>
                    <input type="text" name="title" id="" class="form-control" value="<?php if(!empty($title)) echo $title; ?>">
                    <?php
                        if(isset($_POST['addBookBtn']) && !(empty($title_err))){
                            echo "<span class='text-danger'>".$title_err."</span>";
                        }
                    ?>
                </div>
                <div class="form-group mb-3">
                    <label for="">Image</label>
                    <input type="file" name="book_img" class="form-control">
                </div>
                <div class="form-group mb-3">
                    <label for="">Category</label>
                    <select name="category" id="" class="form-control" value="<?php if(!empty($category)) echo $category; ?>">
                        <option value="" selected disabled>-- Select Category --</option>
                        <?php
                            foreach($categories as $category){
                                echo "<option value='".$category['id']."'>".$category['name']."</option>";
                            }
                        ?>
                    </select>
                </div>
                <div class="form-group mb-3">
                    <label for="">Price</label>
                    <input type="number" name="price" id="" class="form-control" value="<?php if(!empty($price)) echo $price; ?>">
                    <?php
                        if(isset($_POST['addBookBtn']) && !(empty($price_err))){
                            echo "<span class='text-danger'>".$price_err."</span>";
                        }
                    ?>
                </div>
                <div class="form-group mb-3">
                    <label for="">Stock</label>
                    <input type="number" name="stock" id="" class="form-control" value="<?php if(!empty($stock)) echo $stock; ?>">
                    <?php
                        if(isset($_POST['addBookBtn']) && !(empty($stock_err))){
                            echo "<span class='text-danger'>".$stock_err."</span>";
                        }
                    ?>
                </div>
                <div class="form-group mb-3">
                    <label for="">Status</label>
                    <select name="status" id="" class="form-control" value="<?php if(!empty($status)) echo $status; ?>">
                        <option value="" selected disabled>-- Select Status --</option>
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
                        <option value="" selected disabled>-- Select Author --</option>
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
                        <option value="" selected disabled>-- Select Publisher --</option>
                        <?php
                            foreach($publishers as $publisher){
                                echo "<option value='".$publisher['id']."'>".$publisher['name']."</option>";
                            }
                        ?>
                    </select>
                </div>
                <div class="form-group mb-3">
                    <label for="">Description</label>
                    <textarea name="description" id="" class="form-control" value="<?php if(!empty($description)) echo $description; ?>"></textarea>
                    <?php
                        if(isset($_POST['addBookBtn']) && !(empty($description_err))){
                            echo "<span class='text-danger'>".$description_err."</span>";
                        }
                    ?>
                </div>
                <div class="form-group mb-3">
                    <label for="">Edition</label>
                    <input type="number" name="edition" id="" class="form-control" value="<?php if(!empty($edition)) echo $edition; ?>">
                    <?php
                        if(isset($_POST['addBookBtn']) && !(empty($edition_err))){
                            echo "<span class='text-danger'>".$edition_err."</span>";
                        }
                    ?>
                </div>
                <div class="form-group mb-3">
                    <label for="">Pages</label>
                    <input type="number" name="pages" id="" class="form-control" value="<?php if(!empty($pages)) echo $pages; ?>">
                    <?php
                        if(isset($_POST['addBookBtn']) && !(empty($pages_err))){
                            echo "<span class='text-danger'>".$pages_err."</span>";
                        }
                    ?>
                </div>
                <div class="form-group mb-3">
                    <label for="">Rating</label>
                    <input type="number" name="rating" id="" class="form-control" value="<?php if(!empty($rating)) echo $rating; ?>">
                    <?php
                        if(isset($_POST['addBookBtn']) && !(empty($rating_err))){
                            echo "<span class='text-danger'>".$rating_err."</span>";
                        }
                    ?>
                </div>
                <div class="form-group mb-3">
                    <label for="">Published Date</label>
                    <input type="date" name="published_date" id="" class="form-control" value="<?php if(!empty($published_date)) echo $published_date; ?>">
                    <?php
                        if(isset($_POST['addBookBtn']) && !(empty($published_date_err))){
                            echo "<span class='text-danger'>".$published_date_err."</span>";
                        }
                    ?>
                </div>
                <div class="form-group mb-3">
                    <label for="">Discount</label>
                    <input type="number" name="discount" id="" class="form-control" value="<?php if(!empty($discount)) echo $discount; ?>">
                </div>
                <div>
                    <button class="btn btn-dark" name="addBookBtn">Add Book</button>
                </div>
            </form>
        </div>
    </div>
</main>
<?php
include_once 'layout/adminfooter.php';
?>