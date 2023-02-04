<?php
@session_start();
$connection = mysqli_connect("localhost","root","");
//$connection = mysqli_connect("localhost", "id20168730_admin", "\I(FZ8NgE)awoyvQ", "id20168730_bloodline");
$db = mysqli_select_db($connection, 'bloodline');

if(isset($_POST['deletebtn']))
{
    $id = $_POST['delete_id'];

    $query = "DELETE FROM donor WHERE id='$id'";
    $query_run = mysqli_query($connection, $query);

    if($query_run)
    {
        $_SESSION['status'] = "User Data is Deleted";
        $_SESSION['status_code'] = "success";
        header('Location: donor.php'); 
    }
    else
    {
        $_SESSION['status'] = "User Data is Not Deleted";
        $_SESSION['status_code'] = "error";
        header('Location: donor.php'); 
    }
}

?>
<?php
@session_start();
$connection = mysqli_connect("localhost","root","");
//$connection = mysqli_connect("localhost", "id20168730_admin", "\I(FZ8NgE)awoyvQ", "id20168730_bloodline");
$db = mysqli_select_db($connection, 'bloodline');

if(isset($_POST['delete_btn']))
{
    $id = $_POST['deleteid'];

    $query = "DELETE FROM requests WHERE id='$id'";
    $query_run = mysqli_query($connection, $query);

    if($query_run)
    {
        $_SESSION['status'] = "User Data is Deleted";
        $_SESSION['status_code'] = "success";
        header('Location: request.php'); 
    }
    else
    {
        $_SESSION['status'] = "User Data is Not Deleted";
        $_SESSION['status_code'] = "error";
        header('Location: request.php'); 
    }
}
?>
<?php
@session_start();
$connection = mysqli_connect("localhost","root","");
//$connection = mysqli_connect("localhost", "id20168730_admin", "\I(FZ8NgE)awoyvQ", "id20168730_bloodline");
$db = mysqli_select_db($connection, 'bloodline');

if(isset($_POST['deletedbtn']))
{
    $id = $_POST['deletedid'];

    $query = "DELETE FROM event WHERE id='$id'";
    $query_run = mysqli_query($connection, $query);

    if($query_run)
    {
        $_SESSION['status'] = "User Data is Deleted";
        $_SESSION['status_code'] = "success";
        header('Location: announcement.php'); 
    }
    else
    {
        $_SESSION['status'] = "User Data is Not Deleted";
        $_SESSION['status_code'] = "error";
        header('Location: announcement.php'); 
    }

}

?>