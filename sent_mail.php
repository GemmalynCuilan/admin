<?php
//session_start();
	require_once 'dbconfig.php';
	
	if(ISSET($_POST['submit'])){
		
		$email = $_POST['email'];
        $subject = $_POST['subject'];
		$message = $_POST['message'];
        
		
			$query = "INSERT INTO email(`email`,`subject`,`message`) VALUES ('$email','$subject','$message')";
			$query_run = mysqli_query($connection, $query);
		
		
	
		if($query_run)
		{
			$_SESSION['status'] = "Sent successfully!";
			$_SESSION['status_code'] = "success";
			header('Location: send.php'); 
		}
		else
		{
			$_SESSION['status'] = "Error!";
			$_SESSION['status_code'] = "error";
			header('Location: send.php'); 
		}
	}
?>
