<?php
include('includes/header.php'); 
include('includes/navbar.php'); 
include('security.php');
?>


<div class="container-fluid">


    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">List of Blood Requests</h6>
            <span class="float:right"><a class="btn btn-primary btn-block btn-sm col-sm-2 float-right" href="javascript:void(0)" id="new_request">
					<i class="fa fa-plus"></i> New Entry
				</a></span>
        </div>
        <div class="card-body">
            <div class="table-responsive">
            <?php
                $query = "SELECT * FROM requests";
                $query_run = mysqli_query($connection, $query);
            ?>
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th> ID </th>
                            <th> Date</th>
                            <th> Patient name </th>
                            <th> Address </th>
                            <th> Mobile number </th>
                            <th> Need a Blood group</th>
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
                                <td><?php  echo $row['date']; ?></td>
                                <td><?php  echo $row['username']; ?></td>
                                <td><?php  echo $row['address']; ?></td>
                                <td><?php  echo $row['number']; ?></td>
                                <td><?php  echo $row['bloodGroup']; ?></td>
                                <td class=" text-center">
										<?php if($row['status'] == 0){
                                            echo '<span class="badge badge-primary">Pending</span>';
                                        }else if ($row['status'] == 1){
                                            echo '<span class="badge badge-success">Approved</span>';
                                        }
                                        ?>	
									</td>
                                    <td class="text-center">
                                    <form action = "edit_request.php" method="post">
                                    <input type="hidden" name="edit_id" value="<?php echo $row['id']; ?>">
                                    <button type = "submit" name="edit_btn" class ="btn btn-sm btn-outline-primary">EDIT</button>
    
                                     <button class="btn btn-sm btn-outline-success" type="button" data-id="<?php echo $row['id'] ?>">Update</button>
                                     <button class="btn btn-sm btn-outline-danger delete_request" type="button" data-id="<?php echo $row['id'] ?>">Delete</button>						
                                     </form>
                                    </td>
                                    
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