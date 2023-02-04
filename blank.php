<?php
include('includes/header.php'); 
include('includes/navbar.php'); 
include('security.php');
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
                <h6 class="m-0 font-weight-bold text-primary">Manage Announcements
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addadminprofile">
                        Add New Announcements
                        </button>
                </h6>
            </div>

            </script>
<div class="modal fade" id="addadminprofile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add New Announcement</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      
      <form action="test.php" method="POST">
        <div class="modal-body">

            <div class="form-group">
                <label> Event Name</label>
                <input type="text" name="title" class="form-control" placeholder="Enter Event Name">
            </div>
        
            <div class="form-group">
                <label>Event Date & Time</label>
                <input type="datetime-local" name="dtevent" class="form-control" placeholder="Enter Starting time">
            </div>
            <div class="form-group">
                <label>Location</label>
                <input type="text" name="name" class="form-control" placeholder="Enter Location">
            </div>
            <div class="form-group">
            <label for="message-text" class="col-form-label">Description:</label>
            <textarea class="form-control" name="description" id="message-text"></textarea>
          </div>
        
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" name="eventBtn" class="btn btn-primary">Save</button>
        </div>
      </form>

    </div>
  </div>
</div>
            <?php
                            $query = "SELECT * FROM event";
                            $query_run = mysqli_query($connection, $query);
                        ?>
               
                    <table id="example" class="display" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                            <th> ID </th>
                            <th> Event Name </th>
                            <th> Event Date & Time  </th>
                            <th> Location </th>
                            <th> Description </th>
                            <th> Status</th>
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
                            <td><?php  echo $row['id']; ?></td>
                                <td><?php  echo $row['title']; ?></td>
                                <td><?php  echo $row['dtevent']; ?></td>
                                <td><?php  echo $row['name']; ?></td>
                                <td><?php  echo $row['description']; ?></td>
                                <td class=" text-center">
										<?php if($row['status'] == 0){
                                            echo '<span class="badge badge-primary">Pending</span>';
                                        }else if ($row['status'] == 1){
                                            echo '<span class="badge badge-success">Posted</span>';
                                        }
                                        ?>	
									</td>
							</td>  
                                <td class="text-center">
                                    <form action = "edit_an.php" method="post">
                                    <input type="hidden" name="edit_id" value="<?php echo $row['id']; ?>">
                                    <button type = "submit" name="editbtn" class ="btn btn-sm btn-outline-primary">EDIT</button>

                                     <button class="btn btn-sm btn-outline-success" type="button" data-id="<?php echo $row['id'] ?>">POST</button>
                                     <button class="btn btn-sm btn-outline-danger deletedbtn" type="button" data-id="<?php echo $row['id'] ?>">DELETE</button>						
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
                <div class="modal fade" id="deletedmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
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

                                <input type="hidden" name="deletedid" id="deletedid">

                                <h4> Do you want to delete this data?</h4>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal"> NO </button>
                                <button type="submit" name="deletedbtn" class="btn btn-success"> YES </button>
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
        $('.updatebtn').on('click',function(){
            $('#updatemodal').modal('show');
        });
    });
</script>

<script>
        $(document).ready(function () {

            $('.deletedbtn').on('click', function () {

                $('#deletedmodal').modal('show');

                $tr = $(this).closest('tr');

                var data = $tr.children("td").map(function () {
                    return $(this).text();
                }).get();

                console.log(data);

                $('#deletedid').val(data[0]);

            });
        });
    </script>
