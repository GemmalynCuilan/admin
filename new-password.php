<?php


if(!empty($_POST['email']) && !empty($_POST['otp']) && !empty($_POST['new-password'])){
    $email = $_POST['email'];
    $otp = $_POST['otp'];
    $new_password = $_POST['new-password'];
    $connection = mysqli_connect("localhost", "root", "", "bloodlinenew");
    if($connection){

        $sql = "UPDATE donor set password = '".$new_password."', reset_password_otp = '', 
        reset_password_created_at ='' where email = '"
        .$email."' and reset_password_otp = '".$otp."'";
        if(mysqli_query($connection, $sql)){
            if(mysqli_affected_rows($connection)){
              echo "success";
            }
            else echo "Reset Password Failed";
        }
        else echo "Reset Password Failed";
    }else echo "Database connection failed";

}else echo "All field are required"; 


?>