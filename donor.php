<?php
include('includes/header.php'); 
include('includes/navbar.php'); 
include('security.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> Bloodline </title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css">
</head>
<body>
<div class="container-fluid">

    <div class="card shadow mb-4">
        <div class="card-header py-3">
           
        <h6 class="m-0 font-weight-bold text-primary">Donor Registration list</h6>
            <span class="float:right"><a class="btn btn-primary btn-block btn-sm col-sm-2 float-right" href="javascript:void(0)" id="new_request">
					<i class="fa fa-plus"></i> New Entry
				</a></span>
        
          </div>
        <div class="card-body">
            <div class="table-responsive">
            <?php
                $query = "SELECT * FROM donor";
                $query_run = mysqli_query($connection, $query);
            ?>
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
                                    <button class="btn btn-sm btn-outline-success updatebtn" type="button" data-id="<?php echo $row['id'] ?>">UPDATE</button>
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
                    <!-- EDIT Modal -->
                <div class="modal fade" id="updatemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Notification</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="donor.php" method="POST">

                        <div class="modal-body">
                        <form>
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Recipient:</label>
                                <input type="text" class="form-control" id="recipient-name">
                            </div>
                            <div class="form-group">
                                <label for="message-text" class="col-form-label">Message:</label>
                                <textarea class="form-control" id="message-text"></textarea>
                            </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Send message</button>
                            </div>
                        </div>
                    </div>
                </div>
                 <!-- DELETE POP UP FORM  -->
            <div class="modal fade" id="deletemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel"> Delete </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <form action="delete.php" method="POST">

                            <div class="modal-body">

                                <input type="hidden" name="delete_id" id="delete_id">

                                <h4> Do you want to delete this data?</h4>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal"> NO </button>
                                <button type="submit" name="deletebtn" class="btn btn-success"> YES </button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>

            </div>
        </div>
    </div>

</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>
<script>
    $(document).ready( function(){
        $('.updatebtn').on('click',function(){
            $('#updatemodal').modal('show');
        });
    });
</script>

<script>
        $(document).ready(function () {

            $('.deletebtn').on('click', function () {

                $('#deletemodal').modal('show');

                $tr = $(this).closest('tr');

                var data = $tr.children("td").map(function () {
                    return $(this).text();
                }).get();

                console.log(data);

                $('#delete_id').val(data[0]);

            });
        });
    </script>
<?php
include('includes/scripts.php');
include('includes/footer.php');
?>