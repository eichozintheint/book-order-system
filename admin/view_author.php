<?php 
include_once 'layout/adminheader.php';
include_once 'controller/AuthorController.php';
$author_controller = new AuthorController();
    $id=$_GET['id'];
$author=$author_controller->viewAuthor($id);
$image=$author['image'];

?>
<div class="container">
    <div class="row mt-5">
    <div class="row row-cols-1 row-cols-md-3 g-4">
        <div class="col-md-8 m-auto">
            <div class="card">
            <img src="../AuthorImages/<?php echo htmlspecialchars($image); ?>" width="100px" height="150px" alt="Author Image">
            <div class="card-body">
                <div class="row d-fle">
                    <div class="col-3">
                        <div class="form-label ">Author Name:</div>
                    </div>
                    <div class="col-4">
                        <label for="" class="form-label"><?php echo $author['name'];?></label>
                    </div>
                </div>
                <div class="row d-fle">
                    <div class="col-3">
                        <div class="form-label">Author Email:</div>
                    </div>
                    <div class="col-4">
                        <label for="" class="form-label"><?php echo $author['email'];?></label>
                    </div>
                </div>
                <div class="row d-fle">
                    <div class="col-3">
                        <div class="form-label">Author Phone:</div>
                    </div>
                    <div class="col-4">
                        <label for="" class="form-label"><?php echo $author['phone'];?></label>
                    </div>
                </div>
                <div class="row d-fle">
                    <div class="col-3">
                        <div class="form-label">Author Address:</div>
                    </div>
                    <div class="col-4">
                        <label for="" class="form-label"><?php echo $author['address'];?></label>
                    </div>
                </div>
            </div>
            </div>
        </div>
    </div>
</div>
<?php
include_once 'layout/adminfooter.php';
?>
