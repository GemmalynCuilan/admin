<?php

include 'dbconfig.php';
if(!empty($_POST['lastname'])  && !empty($_POST['firstname']) && !empty($_POST['middlename']) && !empty($_POST['password']) && !empty($_POST['birthdate'])  && !empty($_POST['age']) && !empty($_POST['sex']) && !empty($_POST['bloodGroup'])  && !empty($_POST['identifyno']) 
&& !empty($_POST['street']) && !empty($_POST['barangay'])&& !empty($_POST['tm'])&& !empty($_POST['city']) && !empty($_POST['code'])  
&& !empty($_POST['mobileNumber']) && !empty($_POST['email']) && !empty($_POST['idno']) && !empty($_POST['reqimg']) && !empty($_POST['numtimes']) && !empty($_POST['lastdate']) && !empty($_POST['place']) && !empty($_POST['previous']) && !empty($_POST['group1']) && !empty($_POST['group2']) && !empty($_POST['group3']) && !empty($_POST['group4'])&& !empty($_POST['group5'])
&& !empty($_POST['group6'])&& !empty($_POST['group7'])){
$query = "SELECT * FROM donor where id";
$lastname = $_POST['lastname'];
$firstname = $_POST['firstname'];
$middlename = $_POST['middlename'];
$password = $_POST['password'];
$birthdate = $_POST['birthdate'];
$age= $_POST['age'];
$sex = $_POST['sex'];
$bloodGroup= $_POST['bloodGroup'];
$identifyno = $_POST['identifyno'];
$street = $_POST['street'];
$barangay = $_POST['barangay'];
$tm = $_POST['tm'];
$city = $_POST['city'];
$code = $_POST['code'];
$mobileNumber= $_POST['mobileNumber'];
$email= $_POST['email'];
$idno = $_POST['idno'];

$lastdate = $_POST['lastdate'];
$place = $_POST['place'];
$previous = $_POST['previous'];
$group1 = $_POST['group1'];
$group2 = $_POST['group2'];
$group3 = $_POST['group3'];
$group4= $_POST['group4'];
$group5 = $_POST['group5'];
$group6 = $_POST['group6'];
$group7 = $_POST['group7'];

$sql = "SELECT * FROM donor where lastname='$lastname', firstname='$firstname', middlename='$middlename', 
password='$password', birthdate='$birthdate', age='$age', sex='$sex', bloodGroup='$bloodGroup',
identifyno='$identifyno',street='$street',barangay='$barangay', tm='$tm', city='$city', mobileNumber='$mobileNumber', 
email='$email', idno='$idno', lastdate='$lastdate', place='$place', previous='$previous', group1='$group1', group2='$group2', 
group3='$group3', group4='$group4', group5='$group5', group6='$group6', group7='$group7'";
$result = array();
$result['data'] = array();
$responce = mysqli_query($connection, $sql);

if(mysqli_num_rows($responce) == 1){
    $row = mysqli_fetch_assoc($responce);
    $ds['lastname'] = $row['lastname'];
    $ds['firstname'] = $row['firstname'];
    $ds['middlename'] = $row['middlename'];
    $ds['password'] = $row['password'];
    $ds['birthdate'] = $row['birthdate'];
    $ds['age'] = $row['age'];
    $ds['sex'] = $row['sex'];
    $ds['bloodGroup'] = $row['bloodGroup'];
    $ds['identifyno'] = $row['identifyno'];
    $ds['street'] = $row['street'];
    $ds['barangay'] = $row['barangay'];
    $ds['tm'] = $row['tm'];
    $ds['city'] = $row['city'];
    $ds['mobileNumber'] = $row['mobileNumber'];
    $ds['email'] = $row['email'];
    $ds['idno'] = $row['idno'];
    
    $ds['lastdate'] = $row['lastdate'];
    $ds['place'] = $row['place'];
    $ds['previous'] = $row['previous'];
    $ds['group1'] = $row['group1'];
    $ds['group2'] = $row['group2'];
    $ds['group3'] = $row['group3'];
    $ds['group4'] = $row['group4'];
    $ds['group5'] = $row['group5'];
    $ds['group6'] = $row['group6'];
    $ds['group7'] = $row['group7'];

    array_push($result['data'], $ds);
    $result['status'] = 'success';
    echo json_encode($result);
    mysqli_close($connection);
}else{
    $result['status'] = 'error';
    echo json_encode($result);
    mysqli_close($connection);
}

}
?>