<?php 
include_once 'controller/CategoryController.php';
$cat_controller=new CategoryController();
$id=$_GET['id'];
 $cat = $cat_controller->editCat($id);

 $name = $cat['name'] ?? ''; 
 $description = $cat['description'] ?? '';

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
        $decsription_error="Please enter category decsription";
    }
    // echo $error;
    if(!$error){
        $status = $cat_controller->updateCat($id, $name, $description);
        if($status){
            header('Location: categories_list.php?status=updatesuccess');
            exit(); // Ensure script stops after redirection
        }
    }
 }
 include_once 'layout/adminheader.php';
?>
<div class="container mt-5">
<form action="" method="post" class="col-md-10 m-auto">
            <h2  style="background-color:#01031f;color:#f4f4f4;padding:5px;">Edit Category</h2>
            <div class="row d-flex mt-5">
                <div class="col-2">
                    <label for="" class="form-label px-2">Name</label>
                </div>
                <div class="col-8">
                    <input type="text" name="name" class="form-control" 
                    value="<?php echo $cat['name'];?>">
                    <?php
                        if(isset($_POST['submit']) && !(empty($name_error))){
                            echo "<span class='text-danger'>".$name_error."</span>";
                        }
                    ?>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col-2 ">
                    <label for="" class="form-label px-2">Description</label>
                </div>
                <div class="col-8">
                    <input type="text" name="description" class="form-control"
                    value="<?php echo $cat['description']; ?>">
                    <?php
                        if(isset($_POST['submit']) && !(empty($decsription_error))){
                            echo "<span class='text-danger'>".$decsription_error."</span>";
                        }
                    ?>
                </div>
            </div>
            <div class="row mt-5 mb-5">
            <div class="col-5"></div>
           <div class="col-3"> <button class="btn text-center" style="background-color:#01031f;color:#f4f4f4;" name="submit">Edit Category</button></div>

           
            </div>
        </form>
</div>
<?php 
include_once 'layout/adminfooter.php';
?>