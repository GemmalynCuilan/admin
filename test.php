<?php
include('security.php');
$connection = mysqli_connect("localhost","root","","bloodline");
if(isset($_POST['updatebtn']))
{
    $id = $_POST['edit_id'];
    $username = $_POST['edit_username'];
    $gender = $_POST['edit_gender'];
	$age = $_POST['edit_age'];
	$address = $_POST['edit_address'];
    $mobileNumber = $_POST['edit_mobileNumber'];
	$bloodGroup = $_POST['edit_bloodGroup'];
    $password = $_POST['edit_password'];
	$status = $_POST['edit_status'];
    $query = "UPDATE donor SET username='$username', gender='$gender', age='$age',  address='$address',  mobileNumber='$mobileNumber', bloodGroup='$bloodGroup', password='$password',status='$status' WHERE id='$id' ";
    
	$query_run = mysqli_query($connection, $query);

    if($query_run)
    {
        $_SESSION['success'] = "Your Data is Updated";
        header('Location: donor.php'); 
    }
    else
    {
        $_SESSION['status'] = "Your Data is NOT Updated";
        header('Location: donor.php'); 
    }
}

?>