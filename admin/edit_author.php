<?php 

include_once 'controller/AuthorController.php';
$author_controller = new AuthorController();
    $id=$_GET['id'];
    $author=$author_controller->viewAuthor($id);
if(isset($_POST['submit'])){
    $error=false;
    if(!empty($_POST['author_name'])){
        $name=$_POST['author_name'];
    }
    else{
        $error=true;
        $name_error="Please Enter Name";
    }
    if(!empty($_POST['email'])){
        $email=$_POST['email'];
    }
    else{
        $error=true;
        $email_error="Please Enter Email";
    }
    if(!empty($_POST['phone'])){
        $phone=$_POST['phone'];
    }
    else{
        $error=true;
        $phone_error="Please Enter Phone";
    }
    if(!empty($_POST['address'])){
        $address=$_POST['address'];
    }
    else{
        $error=true;
        $address_error="Please Enter Address";
    }
    
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
        $status=$author_controller->updateAuthor($id,$name,$f_name,$email,$phone,$address);
        if($status){
            header('location:author_list.php');
        }
       
    }
}
include_once 'layout/adminheader.php';
?>
<div class="container">
    <div class="row m-5">
        <div class="col-md-10">
            <a href="author_list.php" class="btn btn-primary">back</a>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-md-10 m-auto">
            <form action="" method="post" enctype="multipart/form-data">
                <div class="d-flex mt-3">
                   <div class="col-2"> <label for="" class="form-label">Name:</label></div>
                    <div class="col-8"><input type="text" name="author_name" class="form-control"
                     value="<?php echo $author['name']?>"></div>
                </div>
                <div class="d-flex mt-3">
                   <div class="col-2"> <label for="" class="form-label">Email:</label></div>
                    <div class="col-8"><input type="email" name="email" class="form-control" 
                    value="<?php echo $author['email']?>"></div>
                </div>
                <div class="d-flex mt-3">
                   <div class="col-2"> <label for="" class="form-label">Phone :</label></div>
                    <div class="col-8"><input type="text" name="phone" class="form-control"
                    value="<?php echo $author['phone']?>"></div>
                </div>
                <div class="d-flex mt-3">
                   <div class="col-2"> <label for="" class="form-label">Address :</label></div>
                    <div class="col-8"><input type="text" name="address" class="form-control"
                    value="<?php echo $author['address']?>"></div>
                </div>
                <div class="d-flex mt-3">
                   <div class="col-2"> <label for="" class="form-label">Author's Image :</label></div>
                    <div class="col-8"><input type="file" name="author_image" class="form-control"
                    value="<?php echo $author['image']?>"></div>
                </div>
                <div>
                    <div class="col-md-10">
                    <button type="submit" name="submit" class="btn btn-primary float-end mt-3">Save New Author</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<?php include_once 'layout/adminfooter.php'; ?>