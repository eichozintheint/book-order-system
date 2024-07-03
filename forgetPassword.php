<?php
include_once 'layout/header.php';
include_once 'controller/UserController.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/Exception.php';
require 'PHPMailer/SMTP.php';

$user_controller=new UserController();
$emails=$user_controller->getEmail();

if(isset($_POST['passwordResetBtn'])){
    $error=false;
    if(!empty($_POST['email'])){
        $reset_email=$_POST['email'];

        foreach($emails as $email){
            if($email['email']==$reset_email){
                $mail=new PHPMailer;

                $mail->isSMTP();
                $mail->Host='smtp.gmail.com';
                $mail->SMTPAuth=true;
                $mail->Username='eichozintheint2559@gmail.com';
                $mail->Password='gsih bheq fybg hvyz';
                $mail->SMTPSecure='ssl';
                $mail->Port=465;

                $mail->setFrom('eichozintheint2559@gmail.com','BookHeaven');

                $mail->addAddress($reset_email);

                $mail->Subject='Password Reset Link';
                $mail->isHTML(true);
                $mailContent="<h3>We have sent this email to you because you requested to reset your password.</h3>
                            <p>Please click the button below to reset your password.</p>
                            <a class='btn btn-success' href='http://localhost/book-order-php/resetPassword.php?email=".$reset_email."'>Reset Password</a>";

                $mail->Body=$mailContent;
                
                if($mail->send()){
                    echo "<script>alert('Reset Mail has been sent to your email.Please Check your email')</script>";
                }else{
                    echo "<script>alert('Error in sending mail')</script>";
                }
            }else{
                // $user_not_find_err='We can\'t find a user with that email address';
            }
        }

        
    }else{
        $error=true;
        $email_err="Please enter email to reset your password";
    }


}

?>


<div class="login-container">
        <div class="row login-container-row">
            <div class="col-4"></div>
            <div class="col-4 password">
                <h3 style="margin-left:90px;">Forget Password</h3>
                <form action="" method="post">
                <div class="form-group mb-3">
                    <label for="" class="form-label">Email Address</label>
                    <input type="text" name="email" id="email" placeholder="Enter email" class="form-control">
                    <?php 
                        if(isset($_POST['passwordResetBtn']) && !empty($user_not_find_err)) {
                            echo "<span class='text-danger'>$user_not_find_err</span>";
                        }elseif(isset($_POST['passwordResetBtn']) && !empty($email_err)){
                            echo "<span class='text-danger'>$email_err</span>";
                        }
                    ?>
                </div>
                <button class="btn btn-dark passwordResetBtn" name="passwordResetBtn">Send Password Reset Link</button>
            </form>
            </div>
        </div>
</div>



<!-- <div class="forget-password-container">
    <div class="row　forget-password-container-row">
        <div class="col-4"></div>
        <div class="col-4 border border-3 p-4　forget-password-form-box">
            <h2>Forget Password</h2>
            <form action="" method="post">
                <div class="form-group mb-3">
                    <label for="" class="form-label">Email Address</label>
                    <input type="text" name="email" id="email" placeholder="Enter email" class="form-control">
                    <?php 
                        if(isset($_POST['passwordResetBtn']) && !empty($user_not_find_err)) {
                            echo "<span class='text-danger'>$user_not_find_err</span>";
                        }elseif(isset($_POST['passwordResetBtn']) && !empty($email_err)){
                            echo "<span class='text-danger'>$email_err</span>";
                        }
                    ?>
                </div>
                <button class="btn btn-info passwordResetBtn" name="passwordResetBtn">Send Password Reset Link</button>
            </form>
        </div>
    </div>
</div> -->
<?php 
include_once 'layout/footer.php';
?>