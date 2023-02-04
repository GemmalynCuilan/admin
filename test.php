<?php
session_start();
$connection = mysqli_connect("localhost","root","","bloodline");
//$connection = mysqli_connect("localhost", "id20168730_admin", "\I(FZ8NgE)awoyvQ", "id20168730_bloodline");
if(isset($_POST['updatebtn']))
{
    $id = $_POST['edit_id'];
    $username = $_POST['edit_username'];
    $gender = $_POST['edit_gender'];
	$age = $_POST['edit_age'];
	$address = $_POST['edit_address'];
    $mobileNumber = $_POST['edit_mobileNumber'];
	$bloodGroup = $_POST['edit_bloodGroup'];
    $password = $_POST['edit_password'];
	$status = $_POST['edit_status'];
    $query = "UPDATE donor SET username='$username', gender='$gender', age='$age',  address='$address',  mobileNumber='$mobileNumber', bloodGroup='$bloodGroup', password='$password',status='$status' WHERE id='$id' ";
    
	$query_run = mysqli_query($connection, $query);

    if($query_run)
    {
        $_SESSION['status'] = "User Data is Updated";
        $_SESSION['status_code'] = "success";
        header('Location: donor.php'); 
    }
    else
    {
        $_SESSION['status'] = "User Data is Not Updated";
        $_SESSION['status_code'] = "error";
        header('Location: donor.php'); 
    }
}
?>
        <?php
        session_start();
        $connection = mysqli_connect("localhost","root","","bloodline");
        //$connection = mysqli_connect("localhost", "id20168730_admin", "\I(FZ8NgE)awoyvQ", "id20168730_bloodline");
        if(isset($_POST['editbtn']))
        {
            $id = $_POST['edit_id'];
            $title = $_POST['edit_title'];
            $dtevent = $_POST['edit_dtevent'];
            $name = $_POST['edit_name'];
            $description = $_POST['edit_description'];
            $status = $_POST['edit_status'];
            $query = "UPDATE event SET title='$title', dtevent='$dtevent', name='$name' , description='$description', status='$status' WHERE id='$id' ";
            
            if($query_run)
            {
                $_SESSION['status'] = "Data is Updated";
                $_SESSION['status_code'] = "success";
                header('Location: announcement.php'); 
            }
            else
            {
                $_SESSION['status'] = "Data is Not Updated";
                $_SESSION['status_code'] = "error";
                header('Location: announcement.php'); 
            }
        }
        ?>

           
        <?php
        session_start();
        $connection = mysqli_connect("localhost","root","");
        //$connection = mysqli_connect("localhost", "id20168730_admin", "\I(FZ8NgE)awoyvQ", "id20168730_bloodline");
        $db = mysqli_select_db($connection, 'bloodline');

        if(isset($_POST['eventBtn']))
        {
            $title = $_POST['title'];
            $dtevent = $_POST['dtevent'];
            $name = $_POST['name'];
            $description = $_POST['description'];

            $query = "INSERT INTO event (title,dtevent,name,description) VALUES ('$title','$dtevent','$name','$description')";
            $query_run = mysqli_query($connection, $query);

            if($query_run)
            {
                $_SESSION['status'] = "Data is Added";
                $_SESSION['status_code'] = "success";
                header('Location: announcement.php'); 
            }
            else
            {
                $_SESSION['status'] = "Data is Not Added";
                $_SESSION['status_code'] = "error";
                header('Location: announcement.php'); 
            }
        }

        ?>
       