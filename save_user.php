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
session_start();
	require_once 'dbconfig.php';
	
	if(ISSET($_POST['insert'])){
		$sernum = $_POST['sernum'];
        $bcomponent = $_POST['bcomponent'];
		$patient_name = $_POST['patient_name'];
		$ex_date = $_POST['ex_date'];
		$expdate = $_POST['expdate'];
		$comment_rel = $_POST['comment_rel'];
        
		
			$query = "INSERT INTO task(`sernum`,`bcomponent`,`patient_name`,`ex_date`,`expdate`,`comment_rel`) VALUES (`$sernum`,`$bcomponent`,`$patient_name`,`$ex_date`,`$expdate`,`$comment_rel`)";
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
