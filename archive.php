<?php
	date_default_timezone_set("Etc/GMT+8");
	
	require_once 'dbconfig.php';
	
	$query = mysqli_query($connection, "SELECT * FROM `event`");
	$date = date("Y-m-d");
	while($fetch = mysqli_fetch_array($query)){
		if(strtotime($fetch['event_end_date']) < strtotime($date)){
			mysqli_query($connection, "INSERT INTO `archive_events` VALUES ('', '$fetch[event_id]', '$fetch[event_name]', '$fetch[event_description]', '$fetch[event_venue]', '$fetch[event_start_date]','$fetch[event_end_date]','$fetch[event_time]')") or die(mysqli_error($connection));
			mysqli_query($connection, "DELETE FROM `event` WHERE `event_id` = '$fetch[event_id]'") or die(mysqli_error($connection));
		}
	}
	
?>