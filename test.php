<?php
session_start();
$connection = mysqli_connect("localhost","root","","bloodlinenew");
//$connection = mysqli_connect("localhost", "id20168730_admin", "\I(FZ8NgE)awoyvQ", "id20168730_bloodline");
if(isset($_POST['updatebtn']))
{
    $id = $_POST['edit_id'];
    $lastname = $_POST['edit_lastname'];
    $firstname = $_POST['edit_firstname'];
    $middlename = $_POST['edit_middlename'];
	$birthdate = $_POST['edit_birthdate'];
    $age = $_POST['edit_age'];
	$sex = $_POST['edit_sex'];
    $bloodGroup = $_POST['edit_bloodGroup'];
    $identifyno = $_POST['edit_identifyno'];
    $street = $_POST['edit_street'];
	$barangay = $_POST['edit_barangay'];
    $tm = $_POST['edit_tm'];
    $city = $_POST['edit_city'];
    $code = $_POST['edit_code'];
    $mobileNumber = $_POST['edit_mobileNumber'];
    $email = $_POST['edit_email'];
    $idno = $_POST['edit_idno'];
    $status = $_POST['edit_status'];

    $previous = $_POST['edit_previous'];
    $group1 = $_POST['edit_group1'];
    $group2 = $_POST['edit_group2'];
    $group3 = $_POST['edit_group3'];
    $group4 = $_POST['edit_group4'];
    $group5 = $_POST['edit_group5'];
    $group6 = $_POST['edit_group6'];
    $group7 = $_POST['edit_group7'];
    $numtimes = $_POST['edit_numtimes'];
    $lastdate = $_POST['edit_lastdate'];
    $place = $_POST['edit_place'];
    $query = "UPDATE donor SET lastname='$lastname', firstname='$firstname', middlename='$middlename',  birthdate='$birthdate',  age='$age', sex='$sex',  bloodGroup='$bloodGroup', 
      identifyno='$identifyno',  street='$street', barangay='$barangay', tm='$tm', city='$city', code='$code', mobileNumber='$mobileNumber', 
      email='$email', idno='$idno', status='$status', previous='$previous', group1='$group1', group2='$group2', group3='$group3', group4='$group4', group5='$group5', group6='$group6', group7='$group7' WHERE id='$id' ";
    
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
        $connection = mysqli_connect("localhost","root","","bloodlinenew");
        //$connection = mysqli_connect("localhost", "id20168730_admin", "\I(FZ8NgE)awoyvQ", "id20168730_bloodline");
        if(isset($_POST['eventbtn']))
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
        $db = mysqli_select_db($connection, 'bloodlinenew');

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

