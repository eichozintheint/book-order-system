<?php 

include_once 'controller/PublisherController.php';
$pub_controller=new PublisherController();

if(isset($_POST['submit'])){
    $error=false;
    if(!empty($_POST['name'])){
        $name=$_POST['name'];

    }
    else{
        $error=true;
        $name_error="Please enter publisher name";
    }
    if(!empty($_POST['address'])){
        $address=$_POST['address'];

    }
    else{
        $error=true;
        $publisher_error="Please enter publisher address";
    }
    //echo $error;
    ob_start();
    if (!$error) {
        $status = $pub_controller->addPublisher($name, $address);
        if ($status) {
            header('Location: publishers.php?status=addcat');
            exit();
        } else {
            header('Location: publishers.php?status=existcat');
            exit();
        }
    }
    ob_end_flush();
}
include_once 'layout/adminheader.php';
?>
<div class="container mt-5">
        <form action="" method="post" class="col-md-10 m-auto">
            <h2 class="rext-primary">Add New Publisher</h2>
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
                    <label for="" class="form-label px-2">Address</label>
                </div>
                <div class="col-8">
                    <input type="text" name="address" class="form-control">
                </div>
            </div>
            <div class="row mt-5 mb-5">
            <div class="col-5"></div>
           <div class="col-3"> <button class="btn text-center" style="background-color:#01031f;color:#f4f4f4;" name="submit">Add Publisher</button></div>

           
            </div>
        </form>
</div>
<?php 
include_once 'layout/adminfooter.php';
?>