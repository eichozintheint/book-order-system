<?php 
include_once 'layout/header.php';
include_once 'controller/UserController.php';

$reset_email=$_GET['email'];

$user_controller=new UserController();

if(isset($_POST['reset_password'])){
    if(!empty($_POST['password']) || !empty($_POST['confirm_password'])){
        if($_POST['password']==$_POST['confirm_password']){
            $new_password=$_POST['password'];
            $reset_password_status=$user_controller->resetPassword($reset_email,$new_password);
            if($reset_password_status){
                header('location:login.php?reset_password_status=success');
                // echo "Your password has been updated successfully.<a href='login.php'>Click Here</a> to login!";
            }
        }else{
            $password_not_match_err="Passwords do not match";
        }
    }else{
        $password_err="Please enter new password";
    }
}
?>

<div class="login-container">
        <div class="row login-container-row">
            <div class="col-4"></div>
            <div class="col-4 password">
                <h3 style="margin-left:90px;">Forget Password</h3>
                <form action="" method="POST">
                <div class="form-group mb-3">
                    <label for="" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control">
                    <?php 
                        if(!empty($password_err)){
                            echo "<span class='text-danger'>$password_err</span>";
                        }
                    ?>
                </div>
                <div class="form-group mb-3">
                    <label for="" class="form-label">Confirm Password</label>
                    <input type="password" name="confirm_password" class="form-control">
                    <?php
                        if(!empty($password_not_match_err)){
                            echo "<span class='text-danger'>$password_not_match_err</span>";
                        }
                    ?>
                </div>
                <button class="btn btn-dark mb-3" name="reset_password">Reset Password</button>
            </form>
            </div>
        </div>
</div>

<!-- <div class="container">
    <div class="row">
        <div class="col-4"></div>
        <div class="col-4 border border-secondary">
            <h2>Reset Password</h2>
            <form action="" method="POST">
                <div class="form-group mb-3">
                    <label for="" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control">
                    <?php 
                        if(!empty($password_err)){
                            echo "<span class='text-danger'>$password_err</span>";
                        }
                    ?>
                </div>
                <div class="form-group mb-3">
                    <label for="" class="form-label">Confirm Password</label>
                    <input type="password" name="confirm_password" class="form-control">
                    <?php
                        if(!empty($password_not_match_err)){
                            echo "<span class='text-danger'>$password_not_match_err</span>";
                        }
                    ?>
                </div>
                <button class="btn btn-success mb-3" name="reset_password">Reset Password</button>
            </form>
        </div>
    </div>
</div> -->
<?php 
include_once 'layout/footer.php';
?>