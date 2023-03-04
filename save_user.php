<?php
	require_once 'dbconfig.php';
	
	if(ISSET($_POST['save'])){
		
		$lastname = $_POST['lastname'];
        $firstname = $_POST['firstname'];
		$date = $_POST['date'];
        $task = $_POST['task'];
        $comment = $_POST['comment'];
		
		$query = "INSERT INTO ongoing(`lastname`,`firstname`,`date`,`task`,`comment`) VALUES ('$lastname','$firstname','$date','$task','$comment')";
        $query_run = mysqli_query($connection, $query);
		
		header("location: ongoing.php");
	}
?>

<?php
	require_once 'dbconfig.php';
	
	if(ISSET($_POST['insert'])){
		
		$lastname = $_POST['lastname'];
        $firstname = $_POST['firstname'];
		$date = $_POST['date'];
        $location = $_POST['location'];
        $task = $_POST['task'];
        $comment = $_POST['comment'];
		
		$query = "INSERT INTO released(`lastname`,`firstname`,`date`,`task`,`comment`,`location`) VALUES ('$lastname','$firstname','$date','$task','$comment','$location')";
        $query_run = mysqli_query($connection, $query);
		
		header("location: release.php");
	}
?>