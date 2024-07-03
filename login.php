<?php
session_start();
include_once 'layout/header.php';
include_once 'controller/UserController.php';

$user_controller=new UserController();

if(isset($_GET['reset_password_status'])){
    if($_GET['reset_password_status']=='success'){
        echo "<script>alert('Your password has been updated successfully')</script>";
    }
}

if(isset($_POST['login']))
{
    $error=false;
    if(!empty($_POST['email']))
    {
        $email=$_POST['email'];
    }
    else{
        $error=true;
        $email_err="Please enter email";
    }

    if(!empty($_POST['password']))
    {
        $password=$_POST['password'];
    }
    else{
        $error=true;
        $password_err="Please enter password";
    }

    if(!$error)
    {
        $result=$user_controller->getUser($email,$password);
    
        if($result && count($result) > 0)
        {
            $_SESSION['user_id']=$result['id'];

            if(!empty($_POST['remember_me'])){
                setcookie('email',$email,time()+3600);
                setcookie('password',$password,time()+3600);
            }else{
                setcookie('email',$email,30);
                setcookie('password',$password,30);
            }

            header('location:index.php');
            exit;
        }else {
            $user_not_match_err = "Incorrect Username or Password Credentials";
        }
    }

}

?>
<div class="login-container"> //container my-5
    <div class="row login-container-row">
        <div class="col-4"></div>
        <div class="col-4 login-form-box">
            <h3 style="margin-left:130px;">Login Form</h3>
            <form action="" method="post">
                <div class="form-group mt-3">
                    <label for="" class="form-label"><i class="fa-solid fa-envelope fa-lg"></i></label>
                    <input type="text" name="email" id="" class="form-control" value="<?php if(isset($_COOKIE['email'])) echo $_COOKIE['email']; if(isset($_POST['login']) && isset($email)) echo $email; ?>">
                    <span style="color:red;">
                        <?php
                            if(isset($_POST['login']) && !empty($email_err))
                                echo $email_err;
                        ?>
                    </span>
                </div>
                <div class="form-group mt-3">
                    <label for="" class="form-label"><i class="fa-solid fa-lock fa-lg"></i></label>
                    <input type="password" name="password" id="" class="form-control" value="<?php if(isset($_COOKIE['password'])) echo $_COOKIE['password']; ?>">
                    <span style="color:red;">
                        <?php
                            if(isset($_POST['login']) && !empty($password_err))
                                echo $password_err;
                        ?>
                    </span>
                    <?php 
                        if(isset($user_not_match_err) && !empty($user_not_match_err)) {
                            echo "<span class='text-danger'>$user_not_match_err</span>";
                        }
                    ?>
                </div>
                <div class="d-flex align-items-center mt-3">
                    <input type="checkbox" name="remember_me" class="form-check-input">
                    <span class="mx-2"> Remember Me</span>
                    <a href="forgetPassword.php" class="f-password">Forget Password?</a>
                </div>
                <div class="mt-3">
                    
                </div>
                <div>
                    <button name="login" class="btn btn-dark login-btn my-4">Login</button>
                </div> 
                <span>Don't have an account? | <a href="register.php">Register Now</a></span>
            </form>
        </div>
    </div>
</div>
<?php
include_once 'layout/footer.php';
?>