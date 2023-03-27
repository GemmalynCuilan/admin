<?php
session_start();
$connection = mysqli_connect("localhost","root","","bloodlinenew");

if(isset($_POST['viewbtn']))
{
    $id = $_POST['id'];
    // echo $return = $s_id;

    $query = "SELECT * FROM donor WHERE id='$id' ";
    $query_run = mysqli_query($connection, $query);

    if(mysqli_num_rows($query_run) > 0)
    {
        foreach($query_run as $row)
        {
            echo $return = '
                <h5> History of previous donation? '.$row['previous'].'</h5>
                <h5> No. of times '.$row['numtimes'].'</h5>
                <h5> Date of last donation : '.$row['lname'].'</h5>
                <h5> Place of last donation : '.$row['class'].'</h5>
                <h5> Cancer, blood disease or bleeding disorder(haemophilia)? : '.$row['group1'].'</h5>
            ';
        }
    }
    else
    {
        echo $return = "<h5>No Record Found</h5>";
    }

}
?>