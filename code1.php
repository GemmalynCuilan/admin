<?php

$conn = mysqli_connect("localhost","root","","bloodlinenew");

if(isset($_POST['save_donor']))
{
    $lastname = $_POST['lastname'];
    $firstname = $_POST['firstname'];
    $date = $_POST['date'];
    $task= $_POST['task'];
    $comment = $_POST['comment'];
    $location = $_POST['location'];

    $query = "INSERT INTO ongoing(`lastname`,`firstname`,`date`,`task`,`comment`,'location') VALUES ('$lastname','$firstname','$date','$task','$comment','$location')";
    $query_run = mysqli_query($connection, $query);

    if($query_run)
    {
        echo $return  = "Successfully Stored";
    }
    else
    {
        echo $return  = "Something Went Wrong.!";
    }
}

?>