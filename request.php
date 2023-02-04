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
    <script>$(document).ready(function () {
        $('#example').DataTable();
    });
    </script>
    </head>
    <body>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-danger">List of Blood Requests</h6>
            
        </div>
       <?php
                $query = "SELECT * FROM requests";
                $query_run = mysqli_query($connection, $query);
            ?>
               
                    <table id="example" class="display" width="100%" cellspacing="0">
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
    
                                     <button class="btn btn-sm btn-outline-success updatebtn" type="button" data-id="<?php echo $row['id'] ?>">SEND</button>
                                     <button class="btn btn-sm btn-outline-danger delete_btn" type="button" data-id="<?php echo $row['id'] ?>">DELETE</button>						
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
                         <!-- Modal -->
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
            <div class="modal fade" id="deletesmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
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

                                <input type="hidden" name="deleteid" id="deleteid">

                                <h4> Do you want to delete this data?</h4>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal"> NO </button>
                                <button type="submit" name="delete_btn" class="btn btn-success"> YES </button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>

    </table>
</body>
</html>
<!-- /.container-fluid -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
  
<script>
    $(document).ready( function () {
    $('.table').DataTable();
} );
</script>
    <script>
    $(document).ready( function(){
        $('.updatebtn').on('click',function(){
            $('#updatemodal').modal('show');
        });
    });
</script>

<script>
        $(document).ready(function () {

            $('.delete_btn').on('click', function () {

                $('#deletesmodal').modal('show');

                $tr = $(this).closest('tr');

                var data = $tr.children("td").map(function () {
                    return $(this).text();
                }).get();

                console.log(data);

                $('#deleteid').val(data[0]);

            });
        });
    </script>
