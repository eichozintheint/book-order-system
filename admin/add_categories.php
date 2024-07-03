<?php 

include_once 'controller/CategoryController.php';
$cat_controller=new CategoryController();

if(isset($_POST['submit'])){
    $error=false;
    if(!empty($_POST['name'])){
        $name=$_POST['name'];

    }
    else{
        $error=true;
        $name_error="Please enter category name";
    }
    if(!empty($_POST['description'])){
        $description=$_POST['description'];

    }
    else{
        $error=true;
        $des_error="Please enter category description";
    }
    //echo $error;
    ob_start();
    if (!$error) {
        $status = $cat_controller->addCate($name, $description);
        if ($status) {
            header('Location: categories_list.php?status=addcat');
            exit();
        } else {
            header('Location: categories_list.php?status=existcat');
            exit();
        }
    }
    ob_end_flush();
}
include_once 'layout/adminheader.php';
?>
<div class="container mt-5">

        <form action="" method="post" class="col-md-10 m-auto border border-primary">
            <h2 class="bg-primary">Add New Category</h2>
            <div class="row d-flex mt-5">
                <div class="col-2">
                    <label for="" class="form-label px-2">Name</label>
                </div>
                <div class="col-8">
                    <input type="text" name="name" class="form-control">
                </div>
            </div>
            <div class="row mt-5">
                <div class="col-2 ">
                    <label for="" class="form-label px-2">Description</label>
                </div>
                <div class="col-8">
                    <input type="text" name="description" class="form-control">
                </div>
            </div>
            <div class="row mt-5 mb-5">
            <div class="col-5"></div>
           <div class="col-3"> <button class="btn btn-primary text-center" name="submit">Add Category</button></div>

           
            </div>
        </form>
</div>
<?php 
include_once 'layout/adminfooter.php';
?>