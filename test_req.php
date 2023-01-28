<?php
include('security.php');
$connection = mysqli_connect("localhost","root","","bloodline");
if(isset($_POST['update']))
{
    $id = $_POST['edit_id'];
    $username = $_POST['edit_username'];
	$address = $_POST['edit_address'];
    $number = $_POST['edit_number'];
	$bloodGroup = $_POST['edit_bloodGroup'];
	$status = $_POST['edit_status'];
    $query = "UPDATE requests SET username='$username',   address='$address',  number='$number', bloodGroup='$bloodGroup',status='$status' WHERE id='$id' ";
    
	$query_run = mysqli_query($connection, $query);

    if($query_run)
    {
        $_SESSION['success'] = "Your Data is Updated";
        header('Location: request.php'); 
    }
    else
    {
        $_SESSION['status'] = "Your Data is NOT Updated";
        header('Location: request.php'); 
    }
}

?>