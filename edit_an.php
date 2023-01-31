<?php
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
            $connection = mysqli_connect("localhost","root","","bloodline");
            if(isset($_POST['editbtn']))
            {
                $id = $_POST['edit_id'];
                
                $query = "SELECT * FROM event WHERE id='$id' ";
                $query_run = mysqli_query($connection, $query);

                foreach($query_run as $row){
                     ?>
                        <form action="test.php" method="POST">
                            <input type="text" name="edit_id" value="<?php echo $row['id'] ?>">
                            <div class="form-group">
                                <label> Event Name </label>
                                <input type="text" name="edit_title" value="<?php echo $row['title'] ?>" class="form-control"
                                    placeholder="Enter Event Name">
                            </div>

                            <div class="form-group">
                                <label>Event Date & Time</label>
                                <input type="datetime-local" name="edit_dtevent" value="<?php echo $row['dtevent'] ?>" class="form-control"
                                    placeholder="Enter Event Date & Time">
                            </div>

                            <div class="form-group">
                                <label>Location</label>
                                <input type="text" name="edit_name" value="<?php echo $row['name'] ?>" class="form-control"
                                    placeholder="Enter Location">
                            </div>

                            <div class="form-group">
                                <label>Description</label>
                                <input type="text" name="edit_description" value="<?php echo $row['description'] ?>" class="form-control"
                                    placeholder="Enter Description">
                            </div>

                        <div class="form-group">
                        <label for="">Status</label>
                        <select name="edit_status">
                            <option value=""> Select Status </option>
                            <option value="0"> pending </option>
                            <option value="1"> posted </option>
                        </select>
                        </div>
                            <a href="announcement.php" class="btn btn-danger"> CANCEL </a>
                            <button type="submit" name="editbtn" class="btn btn-primary"> UPDATE </button>
                        </form>
                 <?php
                }
            }
        ?>
        </div>
    </div>
</div>

</div>