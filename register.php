<?php 
session_start();
include_once 'layout/header.php';
include_once 'controller/UserController.php';

$user_controller=new UserController();

if(isset($_POST['register']))
{
    $error=false;
    if(!empty($_POST['username']))
    {
        $username=$_POST['username'];
    }
    else
    {
        $error=true;
        $username_err="Please enter username";
    }

    if(!empty($_POST['email']))
    {
        $email=$_POST['email'];
    }
    else
    {
        $error=true;
        $email_err="Please enter email";
    }

    if(!empty($_POST['phone']))
    {
        $phone=$_POST['phone'];
    }
    else
    {
        $error=true;
        $phone_err="Please enter phone";
    }

    if(!empty($_POST['password']) && !empty($_POST['confirm_password']))
    {
        if($_POST['password'] == $_POST['confirm_password'])
        {
            $password=$_POST['password'];
        }else{
            $error=true;
            $password_err2="Password doesn't match";
        }
    }else{
        $error=true;
        $password_err1="Please enter password";
    }
    

    if(!$error)
    {
        $status=$user_controller->addUser($username,$email,$phone,$password);
        if($status)
        {
            $user=$user_controller->getUser($email,$password);
            $id=$user['id'];
            $_SESSION['user_id']=$id;
            header('location:index.php');
        }
    }
}

?>

    
    <div class="login-container">
        <div class="row login-container-row">
            <div class="col-4"></div>
            <div class="col-4 login-form-box">
                <h3 style="margin-left:90px;">Registration Form</h3>
                <form action="" method="post">
                    <div class="mt-3">
                        <label for="" class="form-label">Username</label>
                        <input type="text" name="username" id="" class="form-control" value="<?php if(isset($username)) echo $username; ?>">
                        <span style="color:red;">
                            <?php
                                if(isset($_POST['register']) && !empty($username_err))
                                    echo $username_err;
                            ?>
                        </span>
                    </div>
                    <div class="mt-3">
                        <label for="" class="form-label">Email</label>
                        <input type="text" name="email" id="" class="form-control" value="<?php if(isset($email)) echo $email; ?>">
                        <span style="color:red;">
                            <?php
                                if(isset($_POST['register']) && !empty($email_err))
                                    echo $email_err;
                            ?>
                        </span>
                    </div>
                    <div class="mt-3">
                        <label for="" class="form-label">Phone</label>
                        <input type="text" name="phone" id="" class="form-control" value="<?php if(isset($phone)) echo $phone; ?>">
                        <span style="color:red;">
                            <?php
                                if(isset($_POST['register']) && !empty($phone_err))
                                    echo $phone_err;
                            ?>
                        </span>
                    </div>
                    <div class="mt-3">
                        <label for="" class="form-label">Password</label>
                        <input type="password" name="password" id="" class="form-control" value="<?php if(isset($password)) echo $password; ?>">
                        <span style="color:red;">
                            <?php
                                if(isset($_POST['register']) && !empty($password_err1))
                                    echo $password_err1;
                            ?>
                        </span>
                    </div>
                    <div class="mt-3">
                        <label for="" class="form-label">Confirm Password</label>
                        <input type="password" name="confirm_password" id="" class="form-control">
                        <span style="color:red;">
                            <?php
                                if(isset($_POST['register']) && !empty($password_err2))
                                    echo $password_err2;
                            ?>
                        </span>
                    </div>
                    <div>
                        <button name="register" class="btn btn-dark login-btn mt-4">Register</button>
                    </div>
                    <!-- <a href="login.php">Login</a> -->
                </form>
            </div>
        </div>
    </div>
<?php
include_once 'layout/footer.php';
?>