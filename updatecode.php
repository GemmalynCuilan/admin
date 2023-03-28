<?php
$connection = mysqli_connect("localhost","root","");
$db = mysqli_select_db($connection, 'bloodlinenew');

    if(isset($_POST['update']))
    {   
        $id = $_POST['id'];
        $comment = $_POST['comment'];

        $query = "UPDATE task SET comment='$comment' WHERE id='$id'  ";
        $query_run = mysqli_query($connection, $query);

        if($query_run)
        {
            echo '<script> alert("Data Updated"); </script>';
            header("Location:task.php");
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
    
        $sernum = $_POST['sernum'];
        $bcomponent = $_POST['bcomponent'];
		$patientname = $_POST['patientname'];
		$exdate = $_POST['exdate'];
		$expdate = $_POST['expdate'];
		$commentrel = $_POST['commentrel'];
        $bloodGroup = $_POST['bloodGroup'];

        $query = "UPDATE task SET sernum='$sernum', bcomponent='$bcomponent', patientname='$patientname', exdate='$exdate', expdate='$expdate', bloodGroup='$bloodGroup', commentrel= '$commentrel' WHERE id='$id'";
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