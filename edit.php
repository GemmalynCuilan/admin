<?php
@session_start();
include('includes/header.php'); 
include('includes/navbar.php'); 
include('security.php');

?>

<div class="container-fluid">

   
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"> EDIT Profile </h6>
        </div>
        <div class="card-body">
    
        <?php
            $connection = mysqli_connect("localhost","root","","bloodline");
            // $connection = mysqli_connect("localhost", "id20168730_admin", "\I(FZ8NgE)awoyvQ", "id20168730_bloodline");

        
            if(isset($_POST['edit_btn']))
            {
                $id = $_POST['edit_id'];
                
                $query = "SELECT * FROM donor WHERE id='$id' ";
                $query_run = mysqli_query($connection, $query);

                foreach($query_run as $row){
                     ?>
                        <form action="test.php" method="POST">
                            <input type="text" name="edit_id" value="<?php echo $row['id'] ?>">
                            <div class="form-group">
                                <label> Username </label>
                                <input type="text" name="edit_username" value="<?php echo $row['username'] ?>" class="form-control"
                                    placeholder="Enter Username">
                            </div>
                            <div class="form-group">
                            <label for="" class="control-label">Gender</label>
                            <select name="edit_gender" id="" class="custom-select select2" required>
                                <option value ="<?php echo $row['gender'] ?>"> <?php echo $row['gender'] ?></option>
                                <option value = "Female"> Female </option>
                                <option value = "Male"> Male </option>
                            </select>
                            </div>
                            <div class="form-group">
                                <label>Age</label>
                                <input type="text" name="edit_age" value="<?php echo $row['age'] ?>" class="form-control"
                                    placeholder="Enter Age">
                            </div>
                            <div class="form-group">
                                <label>Address</label>
                                <input type="text" name="edit_address" value="<?php echo $row['address'] ?>" class="form-control"
                                    placeholder="Enter Address">
                            </div>
                            <div class="form-group">
                                <label>Mobile number</label>
                                <input type="text" name="edit_mobileNumber" value="<?php echo $row['mobileNumber'] ?>" class="form-control"
                                    placeholder="Enter Mobile number">

                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="text" name="edit_password" value="<?php echo $row['password'] ?>" class="form-control"
                                    placeholder="Enter Password">

                            </div>
                            <div class="form-group">
                            <label for="" class="control-label">Blood Group</label>
                            <select name="edit_bloodGroup" id="" class="custom-select select2" required>
                                <option value =" <?php echo $row['bloodGroup'] ?>"><?php echo $row['bloodGroup'] ?></option>
                                <option value = "A+">A+</option>
                                <option value = "A-">A-</option>
                                <option value = "B+">B+</option>
                                <option value = "B-">B-</option>
                                <option value = "AB+">AB+</option>
                                <option value = "AB-">AB-</option>
                                <option value = "O+">O+</option>
                                <option value = "O-">O-</option>
                            </select>
                             </div>

                             <div class="form-group">
                            <label for="" class="control-label">Status</label>
                            <select name="edit_status" id="" class="custom-select select2" required>
                                <option value ="<?php echo $row['status'] ?>"><?php echo $row['status'] ?></option>
                                <option value="0"> pending </option>
                                <option value="1"> testing </option>
                                <option value="2"> storage </option>
                                <option value="3"> distribution </option>
                                <option value="4"> transfusion </option>
                                </select>
                             </div>
                   
                             
                            <a href="donor.php" class="btn btn-danger"> CANCEL </a>
                            <button type="submit" name="updatebtn" class="btn btn-primary"> UPDATE </button>
                        </form>
            <?php
                }
            }
        ?>
        </div>
    </div>
</div>

</div>