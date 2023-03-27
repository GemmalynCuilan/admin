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
    <div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-danger">Blood Group AB+</h6>
           
        </div>
            <?php
                $query = "SELECT * FROM donor where bloodGroup like 'AB+'";
                $query_run = mysqli_query($connection, $query);
            ?>
               
            <div class="container">

            <div class="table-responsive">

            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                     <tr>
                        <th style="display:none;"> Indentification No.</th>
                        <th style="display:none;"> ID </th>
                            <th> Lastname</th>
                            <th> Firstname</th>
                            <th style="display:none;"> Middlename</th>
                            <th style="display:none;"> Password</th>
                            <th style="display:none;"> Birthdate </th>
                            <th style="display:none;"> Age </th>
                            <th style="display:none;"> Sex</th>
                            <th style="display:none;"> Identification</th>
                            <th style="display:none;"> Street</th>
                            <th style="display:none;"> Barangay</th>
                            <th style="display:none;"> Town/Municipality</th>
                            <th style="display:none;"> City</th>
                            <th style="display:none;"> Zip Code</th>
                            <th> Mobile Number</th>
                            <th> Email Address</th>
                            <th style="display:none;"> Identification ID</th>
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
                            <td style="display:none;"><?php  echo $row['idno']; ?></td>
                            <td style="display:none;"><?php  echo $row['id']; ?></td>
                                <td><?php  echo $row['lastname']; ?></td>
                                <td><?php  echo $row['firstname']; ?></td>
                                <td style="display:none;"><?php  echo $row['middlename']; ?></td>
                                <td style="display:none;"><?php  echo $row['password']; ?></td>
                                <td style="display:none;"><?php  echo $row['birthdate']; ?></td>
                                <td style="display:none;"><?php  echo $row['age']; ?></td>
                                <td style="display:none;"><?php  echo $row['sex']; ?></td>
                                <td style="display:none;"><?php  echo $row['identifyno']; ?></td>
                                <td style="display:none;"><?php  echo $row['street']; ?></td>
                                <td style="display:none;"><?php  echo $row['barangay']; ?></td>
                                <td style="display:none;"><?php  echo $row['tm']; ?></td>
                                <td style="display:none;"><?php  echo $row['city']; ?></td>
                                <td style="display:none;"><?php  echo $row['code']; ?></td>
                                <td><?php  echo $row['mobileNumber']; ?></td>
                                <td><?php  echo $row['email']; ?></td>
                                <th style="display:none;"><?php echo '<img src="Images/'.$row['reqimg'].'" width="100px;" height="100px;" alt="Image">'?></td>
                            
                                <td class=" text-center">
                                        <?php if($row['status'] == "active"){
                                            echo '<span class="badge badge-primary">Active</span>';
                                        }else if ($row['status'] == "inactive"){
                                            echo '<span class="badge badge-success">Inactive</span>';
                                        }
                                        ?>	
									</td>
                                    <div class="container my-3 bg-light">
                                    <td style="text-align">
                                    <form action = "edit.php" method="post">
                                    <input type="hidden" name="edit_id" value="<?php echo $row['id']; ?>">
                                    <button type = "submit" name="edit_btn" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit" class ="btn btn-warning btn-sm"> <i class="fa fa-pencil-square-o"></i>&nbsp;</button>
                                    </form>
                                    <form action = "send.php" method="post">
                                    <input type="hidden" name="send_id" value="<?php echo $row['id']; ?>">
                                    <button type = "submit" name="send_btn" data-bs-toggle="tooltip" data-bs-placement="top" title="Message" class ="btn btn-info btn-sm"> <i class="fa fa-commenting"></i>&nbsp;</button>
                                    </form>
                                    <form action = "delete.php" method="post">
                                    <input type="hidden" name="deleteId" value="<?php echo $row['id']; ?>">
                                    <button type = "submit" name="deletebtn" data-bs-toggle="tooltip" data-bs-placement="top" title="Archive" class ="btn btn-danger btn-sm"> <i class="fa fa-archive"></i>&nbsp;</button>
                                    </form>
                                    <form action = "dl.php" method="post">
                                    <input type="hidden" name="dl_id" value="<?php echo $row['id']; ?>">
                                    <button type = "submit" name="dl_btn" data-bs-toggle="tooltip" data-bs-placement="top" title="Download" class ="btn btn-primary btn-sm"> <i class="fa fa-download"></i>&nbsp;</button>
                                    </form>
                                   </button>
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
                        
 

                    </table>
                <!-- DELETE POP UP FORM (Bootstrap MODAL) -->
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

                                <form action="delete.php" method="POST" id="form-delete">

                                    <div class="modal-body">

                                        <input type="hidden" name="id" id="id">

                                        <h4> Do you want to Delete this Data ??</h4>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal"> NO </button>
                                        <button type="submit" name="deletebtn" class="btn btn-primary"> Yes !! Delete it. </button>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
</body>
</html>
<!-- /.container-fluid -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
    <script src="https://ajx.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
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
    <script>
        function confirmDelete(self){
            var id = self.getAttribute("data-id");
            document.getElementById("form-delete").id.value=id;
            $("#deletemodal").modal("show");
        }
    </script>
    <script type="text/javascript">
        $(document).ready(function(){
            $("#fetchval").on('change',function(){
                var value = $(this).val();
                //alert(value);

                $.ajax({
                    url:"fetch1.php",
                    type:"POST",
                    data:'filter=' +value,
                    beforeSend:function(){
                        $(".container").html("<span>Working...</span>");
                    },
                    success:function(data){
                        $(".container").html(data);
                    }
                });
            });
        });
    </script>
