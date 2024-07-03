<?php
include_once 'layout/adminheader.php';
include_once 'controller/BookController.php';
$bookId=$_GET['id'];

$book_controller=new BookController();
$book=$book_controller->getBook($bookId);




?>
<main>
    <div class="container-fluid px-4">
        <div class="col-8">
            <h3>Book Detail</h3>
            <p>Title : <?php echo $book['title'] ?></p>
            <img src="../BookImages/<?php echo $book['image']; ?>" width="90px" height="120px" alt="<?php echo htmlspecialchars($book['title']); ?> Image" />
            <p>Category : <?php echo $book['category'] ?></p>
        </div>
    </div>
</main>
<?php
include_once 'layout/adminfooter.php';
?>