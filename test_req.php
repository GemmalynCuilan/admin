<?php
session_start();
include('security.php');
$connection = mysqli_connect("localhost","root","","bloodlinenew");
//$connection = mysqli_connect("localhost", "id20168730_admin", "\I(FZ8NgE)awoyvQ", "id20168730_bloodline");
if(isset($_POST['update']))
{
    $id = $_POST['edit_id'];
    $lastname = $_POST['edit_lastname'];
    $firstname = $_POST['edit_firstname'];
    $sex = $_POST['edit_sex'];
	$street = $_POST['edit_street'];
	$barangay = $_POST['edit_barangay'];
    $tm = $_POST['edit_tm'];
    $city = $_POST['edit_city'];
    $unit = $_POST['edit_unit'];
    $relative = $_POST['edit_relative'];
    $renum = $_POST['edit_renum'];
	$bloodGroup = $_POST['edit_bloodGroup'];
    $ccname = $_POST['edit_ccname'];
    $hospital = $_POST['edit_hospital'];
	$status = $_POST['edit_status'];
    $query = "UPDATE requests SET lastname='$lastname', firstname='$firstname',sex='$sex',street='$street', barangay='$barangay', tm='$tm', city='$city', unit='$unit', relative='$relative', 
      renum='$renum', bloodGroup='$bloodGroup', ccname='$ccname', hospital='$hospital', status='$status' WHERE id='$id' ";

	$query_run = mysqli_query($connection, $query);

    if($query_run)
    {
        $_SESSION['status'] = "User Data is Updated";
        $_SESSION['status_code'] = "success";
        header('Location: request.php'); 
    }
    else
    {
        $_SESSION['status'] = "User Data is Not Updated";
        $_SESSION['status_code'] = "error";
        header('Location: request.php'); 
    }
}

?>