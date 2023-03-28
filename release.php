<?php
@session_start();
include('includes/header.php'); 
include('includes/navbar.php'); 
include('security.php');
include('includes/scripts.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
form {
  display:inline-block;
  margin: 0 0 5px;

}
</style>
    <script>$(document).ready(function () {
        $('#example').DataTable();
    });
    </script>
    <!-- DataTales Example 
<div class="modal fade" id="form_modal" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
      <form method="POST" action="save_user.php">

        <div class="modal-body">
    
            <div class="form-group">
                <label> Lastname </label>
                <input type="text" name="lastname" class="form-control" placeholder="Enter Lastname"required>
            </div>
            <div class="form-group">
                <label>Firstname</label>
                <input type="text" name="firstname" class="form-control" placeholder="Enter Firstname"required>
            </div>
            
            <div class="form-group">
                <label>Location</label>
                <input type="text" name="location" class="form-control" placeholder="Enter location"required>
            </div>

            
     <div class="form-group">
                <label> Date </label>
                <input type="date" name="date" class="form-control" placeholder="Enter Date"required>
            </div>
            <div class="form-group">
            <label for="message-text" class="col-form-label">Comment:</label>
            <textarea class="form-control" id="" name="comment"required></textarea>
          </div>
        </div>
        <div class="modal-footer">
        <button class="btn btn-secondary" type="button" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Close</button>
         <button name="insert" class="btn btn-primary"><span class="glyphicon glyphicon-save"></span> Save</button>
        </div>
      </form>

    </div>
  </div>
</div>

-->
<div class="container-fluid">

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h2 class="m-0 font-weight-bold text-danger">Released Out</h2>
  </div>
  <?php
                $query = "SELECT task.id as id, task.comment as comment, task.sernum as sernum, task.bcomponent as bcomponent, task.patientname as patientname, task.exdate as exdate, task.expdate as expdate, task.commentrel as commentrel, donor.lastname as lname, donor.firstname as fname, donor.bloodGroup as bgroup,task.created_at as created_at, task.comment as comment, task.status as status from task JOIN donor ON donor.id = task.donor_id WHERE task.status = 'ONGOING' ORDER by id DESC;";
                $query_run = mysqli_query($connection, $query);
            ?>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
          <td style="display:none;"> ID </th>
          <th> Serial Number </th>
          <th> Name of patient </th>
          <th> Comment </th>
          <th> Action </th>
          </tr>
          </thead>
          <tbody>
          <?php
            if(mysqli_num_rows($query_run) > 0)        
                        {
                            while($row = mysqli_fetch_assoc($query_run))
                            {
                        ?>
                        <tr>
                            <td style="display:none;"><?php  echo $row['id']; ?></td>
                                <td><?php  echo $row['sernum']; ?></td>
                                <td><?php  echo $row['patientname']; ?></td>
                                  <td><?php  echo $row['commentrel']; ?></td>
                                    <div class="container my-3 bg-light">
                                   <td style="text-align">
                                   <button class="btn btn-danger btn-sm" data-toggle="modal" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete" type="button" data-target="#delmodal<?php echo $row['id']?>"><i class="fa fa-archive"></i>&nbsp;</button> 
                                    </div>
                               
                            </tr>
                        <?php
                       include 'release_modal.php';
                       include 'delete_modal.php';
                            } 
                        }
                        else {
                            echo "No Record Found";
                        }
                        ?>
        </tbody>
      </table>

    </div>
  </div>
</div>

</div>
<!-- /.container-fluid -->
<!-- /.container-fluid -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
  
<script>
    $(document).ready( function () {
    $('.table').DataTable();
} );
</script>
<script>
        $(document).ready(function () {

            $('.updatedata').on('click', function () {

                $('#editmodal').modal('show');

                $tr = $(this).closest('tr');

                var data = $tr.children("td").map(function () {
                    return $(this).text();
                }).get();

                console.log(data);

                $('#update_id').val(data[0]);
                $('#lastname').val(data[1]);
                $('#firstname').val(data[2]);
                $('#date').val(data[3]);
                $('#task').val(data[4]);
                $('#comment').val(data[4]);
            });
        });
    </script>

