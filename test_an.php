
           
 <?php
        session_start();
        $connection = mysqli_connect("localhost","root","","bloodlinenew");
        //$connection = mysqli_connect("localhost", "id20168730_admin", "\I(FZ8NgE)awoyvQ", "id20168730_bloodline");
        $db = mysqli_select_db($connection, 'bloodlinenew');

        if(isset($_POST['eventbtn']))
        {
            $id = $_POST['edit_id'];
            $title = $_POST['edit_title'];
            $dtevent = $_POST['edit_dtevent'];
            $name = $_POST['edit_name'];
            $description = $_POST['edit_description'];

            $query = "UPDATE event SET title='$title', dtevent='$dtevent', name='$name' , description='$description' WHERE event_id='$event_id' ";
            $query_run = mysqli_query($connection, $query);

            if($query_run)
            {
                $_SESSION['status'] = "Data is Updated Successfully";
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

