<?php
include('includes/header.php'); 
include('includes/navbar.php'); 
include('security.php');
?>
<div class="container-fluid">

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Blood Donor B+
          
    </h6>
  </div>
  <?php
          $query = "SELECT * FROM donor WHERE bloodGroup = 'B+'"; 
          $query_run = mysqli_query($connection, $query);
            ?>
<div class="card-body">

<div class="table-responsive">

  <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
    <thead>
      <tr>
      <th> ID </th>
       <th> Username </th>
       <th> Gender </th>
        <th> Age </th>
        <th> Address </th>
        <th> Mobile number </th>
        <th> Blood group</th>
        <th> Status</th>
        <th> Action</th>
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
                            <td><?php  echo $row['id']; ?></td>
                                <td><?php  echo $row['username']; ?></td>
                                <td><?php  echo $row['gender']; ?></td>
                                <td><?php  echo $row['age']; ?></td>
                                <td><?php  echo $row['address']; ?></td>
                                <td><?php  echo $row['mobileNumber']; ?></td>
                                <td><?php  echo $row['bloodGroup']; ?></td>
                                <td class=" text-center">
										<?php if($row['status'] == 0){
                                            echo '<span class="badge badge-primary">Pending</span>';
                                        }else if ($row['status'] == 1){
                                            echo '<span class="badge badge-danger">Testing</span>';
                                        }else if ($row['status'] == 2){
                                            echo '<span class="badge badge-warning">Storage</span>';
                                        }else if ($row['status'] == 3){
                                            echo '<span class="badge badge-info">Distribution</span>';
                                        }else if ($row['status'] == 4){
                                            echo '<span class="badge badge-success">Transfusion</span>';
                                        }
                                        ?>	
									</td>
                                <td class="text-center">
                                    <form action = "edit.php" method="post">
                                    <input type="hidden" name="edit_id" value="<?php echo $row['id']; ?>">
                                    <button type = "submit" name="edit_btn" class ="btn btn-sm btn-outline-primary">EDIT</button>
                                    <button class="btn btn-sm btn-outline-success sendbtn" type="button" data-id="<?php echo $row['id'] ?>">SEND</button>
                                    <button class="btn btn-sm btn-outline-danger deletebtn" type="button" data-id="<?php echo $row['id'] ?>">DELETE</button>
									</td>
                                    </form>
                                    </tr>
                                <?php
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

<?php
include('includes/scripts.php');
include('includes/footer.php');
?>