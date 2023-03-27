<?php
if (!empty($_POST['email']) && !empty($_POST['password'])){

	$email = $_POST['email'];
	$password = $_POST['password'];
	$result = array();
    $con = mysqli_connect("localhost", "root", "", "bloodlinenew");
	$sql = "select * from donor where email ='$email' and password='" .$password. "'";
	$result = $con->query($sql);
	if($result->num_rows > 0){
		echo "success";
	}else{
		echo "failed";
	}
}
?>
