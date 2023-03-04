<?php
require_once 'dbconfig.php';
$con = mysqli_connect("localhost", "root", "", "bloodlinenew");
$oldpass = $_POST['oldpass'];
$newpass = $_POST['newpass'];
$conpass = $_POST['conpass'];
$username = $_POST['username'];

$sql = "SELECT * FROM donor WHERE password = '$oldpass' and username = '$username'";

$query = mysqli_query($con, $sql);
if ($newpass == $conpass){
    if(!mysqli_num_rows($query)>0){
        echo "Old Passowrd Did Not Match";
    }else{
        $update = "UPDATE donor SET password  ='$newpass' WHERE username = '$username'";
        $res = mysqli_query($con,$update);
        if($res){
            echo "Password Are Successfully change";
        }else{
            echo "Error:";
        }

    }
}else{
    echo "Password are not match";
}
?>