<?php
session_start();
	require_once 'dbconfig.php';
	
	if(ISSET($_POST['save'])){
	
        $donor_id = $_POST['donor_id'];
        $comment = $_POST['comment'];
		
			$query = "INSERT INTO task(`donor_id`,`status`,`comment`) VALUES ('$donor_id','ONGOING','$comment')";
			$query_run = mysqli_query($connection, $query);
		
	
		if($query_run)
		{
			$_SESSION['status'] = "Add data successfully!";
			$_SESSION['status_code'] = "success";
			header('Location: task.php'); 
		}
		else
		{
			$_SESSION['status'] = "Error!";
			$_SESSION['status_code'] = "error";
			header('Location: task.php'); 
		}
	}
?>

<?php

	require_once 'dbconfig.php';
	
	if(ISSET($_POST['insert'])){
		$donor_id = $_POST['donor_id'];
		$sernum = $_POST['sernum'];
        $bcomponent = $_POST['bcomponent'];
		$patientname = $_POST['patientname'];
		$exdate = $_POST['exdate'];
		$expdate = $_POST['expdate'];
		$commentrel = $_POST['commentrel'];
        
		
			$query = "INSERT INTO task(donor_id, sernum, bcomponent, patientname,exdate, expdate, commentrel) values 
			('".$donor_id."','".$sernum."', '".$bcomponent."', '".$patientname ."', '".$exdate."', '".$expdate."','".$commentrel."')";
			$query_run = mysqli_query($connection, $query);
		
	
		if($query_run)
		{
			$_SESSION['status'] = "Add data successfully!";
			$_SESSION['status_code'] = "success";
			header('Location: release.php'); 
		}
		else
		{
			$_SESSION['status'] = "Error!";
			$_SESSION['status_code'] = "error";
			header('Location: release.php'); 
		}
	}
?>
