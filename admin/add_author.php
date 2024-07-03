<?php 

include_once 'controller/AuthorController.php';
$auth_controller=new AuthorController();

if(isset($_POST['submit'])){
    $error=false;
    if(!empty($_POST['author_name'])){
        $name=$_POST['author_name'];
    }
    else{
        $error=true;
        $name_error="Please Enter Author Name";
    }
    if(!empty($_POST['email'])){
        $email=$_POST['email'];
    }
    else{
        $error=true;
        $email_error="Please Enter Author Email";
    }
    if(!empty($_POST['phone'])){
        $phone=$_POST['phone'];
    }
    else{
        $error=true;
        $phone_error="Please Enter Author Phone";
    }
    if(!empty($_POST['address'])){
        $address=$_POST['address'];
    }
    else{
        $error=true;
        $address_error="Please Enter Author Address";
    }
    
//    if(!empty($_POST['author_image'])){
//     $image=$_POST['author_image'];
//    }
//    else{
//     $error=true;
//     $image_error="Please Enter Author Image";
// }

$filename=$_FILES['author_image']['name'];
$tmp_name=$_FILES['author_image']['tmp_name'];

$filetype=explode('.',$filename);
$fileExtension=end($filetype);
$filesize=$_FILES['author_image']['size'];
$allowedFileTypes=['jpg','jpeg','png','heic'];


$uploads_dir = realpath(__DIR__ . '/../AuthorImages');

$f_name=time().$filename;

if($_FILES['author_image']['error']==0){
    if(in_array($fileExtension,$allowedFileTypes)){
        if($filesize<10000000){
            if(move_uploaded_file($tmp_name, "$uploads_dir/$f_name")){
                echo "<script>alert('Image is uploaded successfully')</script>";
            }
        }else{
            $error=true;
            echo "<script>alert('File size exceeds 10MB');</script>";
        }
    }else{
        $error=true;
        echo "<script>alert('File type is not allowed');</script>";
    }
}else{
    $error=true;
    echo "<script>alert('Error in image uploading');</script>";
}
    
    if(!$error){
        $status=$auth_controller->addAuthors($name,$f_name,$email,$phone,$address);
        if ($status) {
            header('location:author_list.php');
        } else {
            echo "Error in adding author.";
        }
    }
    
   
}
include_once 'layout/adminheader.php';
?>
<div class="container">
    <div class="row m-5">
        <div class="col-md-10">
            <a href="author_list.php" class="btn" style="background-color:#01031f;color:#f4f4f4;">back</a>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-md-10 m-auto">
            <form action="" method="post" enctype="multipart/form-data">
                <div class="d-flex mt-3">
                   <div class="col-2"> <label for="" class="form-label">Name:</label></div>
                    <div class="col-8"><input type="text" name="author_name" class="form-control">
                    <?php
                        if(isset($_POST['submit']) && !(empty($name_error))){
                            echo "<span class='text-danger'>".$name_error."</span>";
                        }
                    ?></div>
                </div>
                <div class="d-flex mt-3">
                   <div class="col-2"> <label for="" class="form-label">Email:</label></div>
                    <div class="col-8"><input type="email" name="email" class="form-control">
                    <?php
                        if(isset($_POST['submit']) && !(empty($email_error))){
                            echo "<span class='text-danger'>".$email_error."</span>";
                        }
                    ?>
                    </div>
                </div>
                <div class="d-flex mt-3">
                   <div class="col-2"> <label for="" class="form-label">Phone :</label></div>
                    <div class="col-8"><input type="text" name="phone" class="form-control">
                    <?php
                        if(isset($_POST['submit']) && !(empty($phone_error))){
                            echo "<span class='text-danger'>".$phone_error."</span>";
                        }
                    ?>
                    </div>
                </div>
                <div class="d-flex mt-3">
                   <div class="col-2"> <label for="" class="form-label">Address :</label></div>
                    <div class="col-8"><input type="text" name="address" class="form-control">
                    <?php
                        if(isset($_POST['submit']) && !(empty($address_error))){
                            echo "<span class='text-danger'>".$address_error."</span>";
                        }
                    ?>
                    </div>
                </div>
                <div class="d-flex mt-3">
                   <div class="col-2"> <label for="" class="form-label">Author's Image :</label></div>
                    <div class="col-8"><input type="file" name="author_image" class="form-control"></div>
                </div>
                <div>
                    <div class="col-md-10">
                    <button type="submit" name="submit" class="btn float-end mt-3" style="background-color:#01031f;color:#f4f4f4;">Save New Author</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<?php 
include_once 'layout/adminfooter.php';

?>