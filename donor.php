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
        <h6 class="m-0 font-weight-bold text-danger">Donor Registration list</h6>
            
        </div>
      <?php
          $query = "SELECT * FROM donor";
          $query_run = mysqli_query($connection, $query);
            ?>
               
                    <table id="example" class="display" width="100%" cellspacing="0">
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

                        <?php
                    if(isset($_POST['save'])){
           // Authorisation details.
           $username = "gemmalyncuilan@gmail.com";
           $hash = "9181408c71a82c797c00ac4e32c863ad595f0aa45953504f98a745d9c0e0d2f9";

           // Config variables. Consult http://api.txtlocal.com/docs for more info.
           $test = "0";

           // Data for text message. This is the text message data.
           $sender = $_POST['sender']; // This is who the message appears to be from.
           $numbers = $_POST['number'];// A single number or a comma-seperated list of numbers
           $message = $_POST['message'];
           // 612 chars or less
           // A single number or a comma-seperated list of numbers
           $message = urlencode($message);
           $data = "username=".$username."&hash=".$hash."&message=".$message."&sender=".$sender."&numbers=".$numbers."&test=".$test;
           $ch = curl_init('https://api.txtlocal.com/send/?');
           curl_setopt($ch, CURLOPT_POST, true);
           curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
           curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
           $result = curl_exec($ch); // This is the result from the API
           curl_close($ch);
           echo($result);
            }
         
                ?>
                   <div class="modal fade" id="sendmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Send Message</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="donor.php" method="POST">

                        <div class="modal-body">
                        <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Sender:</label>
                                <input type="text" class="form-control" name="sender">
                            </div>
                        <form>
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Recipient:</label>
                                <input type="text" class="form-control" name="number">
                            </div>
                            <div class="form-group">
                                <label for="message-text" class="col-form-label">Message:</label>
                                <textarea class="form-control" name="message"></textarea>
                            </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary" name = "save" >Send message</button>
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
    </table>
</body>
</html>
<!-- /.container-fluid -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
  
    <script>
    $(document).ready( function(){
        $('.sendbtn').on('click',function(){
            $('#sendmodal').modal('show');
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
