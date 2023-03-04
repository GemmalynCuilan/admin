<?php
session_start();
include('includes/header.php'); 
include('includes/navbar.php'); 
include('security.php');
?>

<div class="container-fluid">

  
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"> EDIT </h6>
        </div>
        <div class="card-body">
        <?php
            $connection = mysqli_connect("localhost","root","","bloodlinenew");
            //$connection = mysqli_connect("localhost", "id20168730_admin", "\I(FZ8NgE)awoyvQ", "id20168730_bloodline");
            if(isset($_POST['edit_btn']))
            {
                $id = $_POST['edit_id'];
                
                $query = "SELECT * FROM event WHERE event_id='$event_id' ";
                $query_run = mysqli_query($connection, $query);

                foreach($query_run as $row){
                     ?>
                   
        <div style="height: 400px; overflow-y: auto;">
			<table id="example" class="table table-striped table-bordered">
                        <form action="test_an.php" method="POST">
                            <input type="hidden" name="edit_id" value="<?php echo $row['event_id'] ?>">
                            <div class="form-group">
                                <label> Event name</label>
                                <input type="text" name="edit_name" value="<?php echo $row['event_name'] ?>" class="form-control"
                                    placeholder="Enter Event Name" required>
                            </div>
                            <div class="form-group">
                                <label> Event description</label>
                                <input type="text" name="edit_description" value="<?php echo $row['event_description'] ?>" class="form-control"
                                    placeholder="Enter Event Description" required>
                            </div>
                            <div class="form-group">
                                <label> Event venue</label>
                                <input type="text" name="edit_venue" value="<?php echo $row['event_venue'] ?>" class="form-control"
                                    placeholder="Enter Event venue" required>
                            </div>
                            <div class="form-group">
                                <label>Event Start Date</label>
                                <input type="date" name="edit_start_date" value="<?php echo $row['event_start_date'] ?>" class="form-control"
                                    placeholder="Enter Event Start Date"  required>
                            </div>
                            <div class="form-group">
                                <label>Event End Date</label>
                                <input type="date" name="edit_end_date" value="<?php echo $row['event_end_date'] ?>" class="form-control"
                                    placeholder="Enter Event End Date"  required>
                            </div>
                            <div class="form-group">
                                <label>Time</label>
                                <input type="time" name="edit_time" value="<?php echo $row['event_time'] ?>" class="form-control"
                                    placeholder="Enter time"  required>
                            </div>
                            <td align="right">
                            <a href="announcement.php" class="btn btn-danger"> CANCEL </a>
                            <button type="submit" name="eventbtn" class="btn btn-primary"> UPDATE </button>
                              </td>
                        </form>
                 <?php
                }
            }
        ?>
        </div>
    </div>
</div>

</div>
</div>       
    </table>