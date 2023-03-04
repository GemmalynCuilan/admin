<?php
$connection = mysqli_connect("localhost","root","");
$db = mysqli_select_db($connection, 'bloodlinenew');

    if(isset($_POST['update']))
    {   
        $id = $_POST['id'];
        
        $lastname = $_POST['lastname'];
        $firstname = $_POST['firstname'];
        $date = $_POST['date'];
        $task = $_POST['task'];
        $comment = $_POST['comment'];

        $query = "UPDATE ongoing SET lastname='$lastname', firstname='$firstname', date='$date', task='$task', comment='$comment' WHERE id='$id'  ";
        $query_run = mysqli_query($connection, $query);

        if($query_run)
        {
            echo '<script> alert("Data Updated"); </script>';
            header("Location:ongoing.php");
        }
        else
        {
            echo '<script> alert("Data Not Updated"); </script>';
        }
    }
?>
<?php
$connection = mysqli_connect("localhost","root","");
$db = mysqli_select_db($connection, 'bloodlinenew');

    if(isset($_POST['updatebtn']))
    {   
        $id = $_POST['id'];
        
        $lastname = $_POST['lastname'];
        $firstname = $_POST['firstname'];
        $date = $_POST['date'];
        $task = $_POST['task'];
        $location = $_POST['location'];
        $comment = $_POST['comment'];

        $query = "UPDATE released SET lastname='$lastname', firstname='$firstname', date='$date', task='$task', comment='$comment', location='$location' WHERE id='$id'  ";
        $query_run = mysqli_query($connection, $query);

        if($query_run)
        {
            echo '<script> alert("Data Updated"); </script>';
            header("Location:release.php");
        }
        else
        {
            echo '<script> alert("Data Not Updated"); </script>';
        }
    }
?>