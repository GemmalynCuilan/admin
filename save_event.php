<?php                
require 'config.php'; 
$event_name = $_POST['event_name'];
$event_description = $_POST['event_description'];
$event_venue = $_POST['event_venue'];
$event_start_date = date("y-m-d", strtotime($_POST['event_start_date'])); 
$event_end_date = date("y-m-d", strtotime($_POST['event_end_date']));
$event_time = date("h:i a", strtotime($_POST['event_time']));
			
$insert_query = "insert into `event`(`event_name`,`event_description`,`event_venue`,`event_start_date`,`event_end_date`,`event_time`) values ('".$event_name."','".$event_description."','".$event_venue."','".$event_start_date."','".$event_end_date."','".$event_time."')";             
if(mysqli_query($con, $insert_query))
{
	$data = array(
                'status' => true,
                'msg' => 'Event added successfully!'
            );
}
else
{
	$data = array(
                'status' => false,
                'msg' => 'Sorry, Event not added.'				
            );
}
echo json_encode($data);	
?>
