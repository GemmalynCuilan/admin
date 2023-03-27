<?php
if(!empty($_POST['numtimes']) && !empty($_POST['lastdate']) && !empty($_POST['place']) && !empty($_POST['previous']) && !empty($_POST['group1']) && !empty($_POST['group2']) && !empty($_POST['group3']) && !empty($_POST['group4'])&& !empty($_POST['group5'])
&& !empty($_POST['group6'])&& !empty($_POST['group7'])){

    $con = mysqli_connect("localhost", "root", "", "bloodlinenew");
 
    $numtimes = $_POST['numtimes'];
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
    
  
  
    if($con){
        $sql = "insert into history (numtimes, lastdate, place, previous, group1, group2, group3, group4,group5,group6,group7) values 
        ('".$numtimes."', '".$lastdate."', '".$place."', '".$previous."', '".$group1."', '".$group2."', '".$group3."', '".$group4."', '".$group5."', '".$group6."', '".$group7."')";
        if (mysqli_query($con, $sql)) {
            echo "success";
        }else echo "Registration failed";
        
        }else echo "Database connection failed";
    }else echo "All fields are required"

?>
