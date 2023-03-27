<?php
sleep(1);
include("dbconfig.php");
if(isset($_POST['filter'])){
    $filter = $_POST['filter'];
    $query ="SELECT * FROM donor where status = '$filter'";
    $result = mysqli_query($connection,$query);
    $count = mysqli_num_rows($result);


?>
<div class="table-responsive">

<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
  <thead>
    <?php
    if($count){
        ?>
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
                            <th> Blood Group</th>
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
                   
                    <?php
                    }else{
                        echo"Sorry! no record found";
                    }
                    ?>
                    
                </thead>
                <tbody>
     
                    <?php
                    while($row = mysqli_fetch_assoc($result)){
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
                                <td><?php  echo $row['bloodGroup']; ?></td>
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
                                    <button type = "submit" name="edit_btn" class ="btn btn-warning btn-sm"> <i class="fa fa-pencil-square-o"></i>&nbsp;</button>
                                    </form>
                                    <form action = "send.php" method="post">
                                    <input type="hidden" name="send_id" value="<?php echo $row['id']; ?>">
                                    <button type = "submit" name="send_btn" class ="btn btn-info btn-sm"> <i class="fa fa-commenting"></i>&nbsp;</button>
                                    </form>
                                    <form action = "delete.php" method="post">
                                    <input type="hidden" name="deleteId" value="<?php echo $row['id']; ?>">
                                    <button type = "submit" name="deletebtn" class ="btn btn-danger btn-sm"> <i class="fa fa-archive"></i>&nbsp;</button>
                                    </form>
                                    <form action = "dl.php" method="post">
                                    <input type="hidden" name="dl_id" value="<?php echo $row['id']; ?>">
                                    <button type = "submit" name="dl_btn" class ="btn btn-primary btn-sm"> <i class="fa fa-download"></i>&nbsp;</button>
                                    </form>
                                   
                                    </div>
                                    <?php
                                    }
                                    ?>
                                    </tbody>
                                </table>
                                 <?php
    
                                }
                                ?>
                                <!-- /.container-fluid -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
    <script src="https://ajx.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
                                