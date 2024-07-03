<?php 
include_once 'layout/adminheader.php';
include_once 'controller/CategoryController.php';
$cat_categories=new CategoryController();
$id=$_GET['id'];
$categories=$cat_categories->viewCat($id);
?>
<div class="container">
    <div class="row mt-5">
        <div class="row row-cols-1 row-cols-md-3 g-4">
            <div class="col-md-8 m-auto">
                <div class="card">
                    <!-- <img src="..." class="card-img-top" alt="..."> -->
                    <div class="card-body">
                        <div class="row d-fle">
                            <div class="col-3">
                                <div class="form-label ">Category Name:</div>
                            </div>
                            <div class="col-8">
                                <label for="" class="form-label" style="color:#01031f;font-size:24px;" ><?php echo $categories['name'];?></label>
                            </div>
                        </div>
                        <div class="row d-fle">
                            <div class="col-3">
                                <div class="form-label">Description:</div>
                            </div>
                            <div class="col-4">
                                <label for="" class="form-label"><?php echo $categories['description'];?></label>
                            </div>
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