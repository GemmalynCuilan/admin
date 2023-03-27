<?php

use PHPMailer\PHPMailer\PHPMailer;

require_once 'PHPMailer/src/Exception.php';
require_once 'PHPMailer/src/PHPMailer.php';
require_once 'PHPMailer/src/SMTP.php';


if(!empty($_POST['email'])){
    $email = $_POST['email'];
    $connection = mysqli_connect("localhost", "root", "", "bloodlinenew");
    if($connection){
        try{
            $otp = random_int(100000, 999999);

        }catch(Exception $e){
            $otp = rand(100000, 999999);
        }
        $sql = "UPDATE donor set reset_password_otp = '".$otp."',reset_password_created_at ='"
        .date('Y-m-d H:i:s')."' where email = '".$email."'";
        if(mysqli_query($connection, $sql)){
            if(mysqli_affected_rows($connection)){
                $mail = new PHPMailer(true);
                try {
                 
                    $mail->isSMTP();
                    $mail->Host = 'smtp.gmail.com';
                    $mail->SMTPAuth = 'true';
                    $mail->Username="gemmalyncuilan@gmail.com";
                    $mail->Password = 'zpsjaczzryaxorpo';
                    $mail->SMTPSecure = 'tls';
                    $mail->Port = '587';                               //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
                
                    //Recipients
                    $mail->setFrom('gemmalyncuilan@gmail.com');
                    $mail->addAddress($email);

                
                    //Content
                    $mail->isHTML(true);                                  //Set email format to HTML
                    $mail->Subject = 'Reset Password - Bloodline';
                    $mail->Body    = 'Your OTP to reset password is [' . $otp . '].';
                    $mail->AltBody = 'Reset Password to access Bloodline application';
                
                    if($mail->send())
                        echo 'success';
                    else 
                         echo 'Failed to send OTP through email';

                } catch (Exception $e) {
                    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                }
            }
            else echo "Reset Password Failed";
        }
        else echo "Reset Password Failed";
    }else echo "Database connection failed";

}else echo "All field are required"; 


?>