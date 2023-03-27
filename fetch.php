<?php
sleep(1);
include("dbconfig.php");
if(isset($_POST['request'])){
    $request = $_POST['request'];
    $query ="SELECT * FROM requests where status = '$request'";
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
                            <th style="display:none;"> Request Form</th>
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
                    while($row = mysqli_fetch_assoc($result)){
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
                                <td style="display:none;"><?php echo '<img src="Images/'.$row['reqimg'].'" width="100px;" height="100px;" alt="Image">'?></td>
                            
                           
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
                                    <button type = "submit" name="edit_btn" class ="btn btn-warning btn-sm"> <i class="fa fa-pencil-square-o"></i>&nbsp;</button>
                                    </form>
                                    <form action = "message.php" method="post">
                                    <input type="hidden" name="msg_id" value="<?php echo $row['id']; ?>">
                                    <button type = "submit" name="msg_btn" class ="btn btn-info btn-sm"> <i class="fa fa-commenting"></i>&nbsp;</button>
                                    </form>
                                    <form action = "delete.php" method="post">
                                    <input type="hidden" name="deleteid" value="<?php echo $row['id']; ?>">
                                    <button type = "submit" name="delete_btn" class ="btn btn-danger btn-sm"> <i class="fa fa-archive"></i>&nbsp;</button>
                                    </form>
                                    <form action = "dl1.php" method="post">
                                    <input type="hidden" name="dlid" value="<?php echo $row['id']; ?>">
                                    <button type = "submit" name="dlbtn" class ="btn btn-primary btn-sm"> <i class="fa fa-download"></i>&nbsp;</button>
                                    </form>
                                    </td>
                                    </div>
                                    <?php
                                    }
                                    ?>
                                    </tbody>
                                </table>
    <?php
    
                                }
                                ?>
                                