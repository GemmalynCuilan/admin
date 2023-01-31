<?php
$connection = mysqli_connect("localhost","root","");
$db = mysqli_select_db($connection, 'bloodline');

if(isset($_POST['deletebtn']))
{
    $id = $_POST['delete_id'];

    $query = "DELETE FROM donor WHERE id='$id'";
    $query_run = mysqli_query($connection, $query);

    if($query_run)
    {
        echo '<script> alert("Data Deleted"); </script>';
        header("Location:donor.php");
    }
    else
    {
        echo '<script> alert("Data Not Deleted"); </script>';
    }
}

?>
<?php
$connection = mysqli_connect("localhost","root","");
$db = mysqli_select_db($connection, 'bloodline');

if(isset($_POST['delete_btn']))
{
    $id = $_POST['deleteid'];

    $query = "DELETE FROM requests WHERE id='$id'";
    $query_run = mysqli_query($connection, $query);

    if($query_run)
    {
        echo '<script> alert("Data Deleted"); </script>';
        header("Location:request.php");
    }
    else
    {
        echo '<script> alert("Data Not Deleted"); </script>';
    }
}

?>
<?php
$connection = mysqli_connect("localhost","root","");
$db = mysqli_select_db($connection, 'bloodline');

if(isset($_POST['deletedbtn']))
{
    $id = $_POST['deletedid'];

    $query = "DELETE FROM event WHERE id='$id'";
    $query_run = mysqli_query($connection, $query);

    if($query_run)
    {
        echo '<script> alert("Data Deleted"); </script>';
        header('Location: announcement.php');
    }
    else
    {
        echo '<script> alert("Data Not Deleted"); </script>';
    }
}

?>