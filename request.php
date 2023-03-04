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
               
        <div style="height: 450px; overflow-y: auto;">
        <table id="example" class="table table-hover table-light">
                    <thead>
                        <tr>
                        <td style="display:none;"> ID </th>
                            <th> Date of requested</th>
                            <th> Lastname </th>
                            <th> Firstname </th>
                            <th style="display:none;"> Sex </th>
                            <th style="display:none;"> Street </th>
                            <th style="display:none;"> Barangay </th>
                            <th style="display:none;"> Town/Municipality </th>
                            <th style="display:none;">  City </th>
                            <th> Number of Units </th>
                            <th style="display:none;">  Name of relative/guardian </th>
                            <th style="display:none;">  Number of relative/guardian </th>
                            <th> Request Blood group</th>
                            <th> Components </th>
                            <th style="display:none;"> Hospital </th>
                            <th> Request Form</th>
                            <th> Status</th>
                            <th> Action</th>
                           
                        </tr>
                    </thead>
                    <?php
                        $sql = "Select date from requests";
                        $results = mysqli_query($connection,$sql);
                        $returnedDates = mysqli_num_rows($results);
                        if($returnedDates > 0){
                            while($row = mysqli_fetch_array($results)){
                                $date = $row['date'];
                            }
                        }
                        
                    ?>
                    <?php
                        if(mysqli_num_rows($query_run) > 0)        
                        {
                            while($row = mysqli_fetch_assoc($query_run))
                            
                
                            {
                        ?>
                            <tr>
                            <td style="display:none;"><?php  echo $row['id']; ?></td>
                                <td><?php  echo date('M d, Y', strtotime($date)); ?></td>
                                <td><?php  echo $row['lastname']; ?></td>
                                <td><?php  echo $row['firstname']; ?></td>
                                <td style="display:none;"><?php  echo $row['sex']; ?></td>
                                <td style="display:none;"> <?php  echo $row['street']; ?></td>
                                <td style="display:none;"><?php  echo $row['barangay']; ?></td>
                                <td style="display:none;"><?php  echo $row['tm']; ?></td>
                                <td style="display:none;"><?php  echo $row['city']; ?></td>
                                <td><?php  echo $row['unit']; ?></td>
                                <td style="display:none;"><?php  echo $row['relative']; ?></td>
                                <td style="display:none;"><?php  echo $row['renum']; ?></td>
                                <td><?php  echo $row['bloodGroup']; ?></td>
                                <td><?php  echo $row['ccname']; ?></td>
                                <td style="display:none;"><?php  echo $row['hospital']; ?></td>
                                <td><?php echo '<img src="Images/'.$row['reqimg'].'" width="100px;" height="100px;" alt="Image">'?></td>
                            
                           
                                <td class=" text-center">
										<?php if($row['status'] == "pending"){
                                            echo '<span class="badge badge-primary">Pending</span>';
                                        }else if ($row['status'] == "accepted"){
                                            echo '<span class="badge badge-success">Accepted</span>';
                                        }
                                        ?>	
									</td>
                                    <div class="container my-3 bg-light">
                                    <td style="text-align">
                                    <form action = "edit_request.php" method="post">
                                    <input type="hidden" name="edit_id" value="<?php echo $row['id']; ?>">
                                    <button type = "submit" name="edit_btn" class ="btn btn-warning btn-m"> <i class="fa fa-pencil-square-o"></i>&nbsp;</button>
                                    </form>
                                    <form action = "message.php" method="post">
                                    <input type="hidden" name="msg_id" value="<?php echo $row['id']; ?>">
                                    <button type = "submit" name="msg_btn" class ="btn btn-info btn-m"> <i class="fa fa-commenting"></i>&nbsp;</button>
                                    </form>
                                    <form action = "delete.php" method="post">
                                    <input type="hidden" name="deleteid" value="<?php echo $row['id']; ?>">
                                    <button type = "submit" name="delete_btn" class ="btn btn-danger btn-m"> <i class="fa fa-archive"></i>&nbsp;</button>
                                    </form>
                                    <form action = "dl1.php" method="post">
                                    <input type="hidden" name="dlid" value="<?php echo $row['id']; ?>">
                                    <button type = "submit" name="dlbtn" class ="btn btn-primary btn-m"> <i class="fa fa-download"></i>&nbsp;</button>
                                    </form>
                                    </td>
                                    </div>
                               
                            </tr>
                        <?php
                            } 
                        }
                        else {
                            echo "No Record Found";
                        }
                        ?>
                        </tbody>
                        
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
8
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
