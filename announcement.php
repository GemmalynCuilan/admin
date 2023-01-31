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


            <div class="container-fluid">

            <!-- DataTales Example -->
            <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Manage Announcements
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addadminprofile">
                        Add New Announcements
                        </button>
                </h6>
            </div>

            <div class="card-body">

                <div class="table-responsive">
                <?php
                            $query = "SELECT * FROM event";
                            $query_run = mysqli_query($connection, $query);
                        ?>
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
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
<?php
include('includes/scripts.php');
include('includes/footer.php');
?>