<?php
if (!empty($_POST['mobileNumber']) && !empty($_POST['password'])){

	$mobileNumber = $_POST['mobileNumber'];
	$password = $_POST['password'];
	$result = array();
    $con = mysqli_connect("localhost", "root", "", "bloodlinenew");
	$sql = "select * from donor where mobileNumber ='$mobileNumber' and password='" .$password. "'";
	$result = $con->query($sql);
	if($result->num_rows > 0){
		echo "success";
	}else{
		echo "failed";
	}
}
?>
