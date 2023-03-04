<?php
session_start();
include('includes/header.php'); 
include('includes/navbar.php'); 

?>

<div class="container-fluid">

  
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"> EDIT PROFILE </h6>
        </div>
        <div class="card-body">
        <?php
            $connection = mysqli_connect("localhost","root","","bloodlinenew");
            //$connection = mysqli_connect("localhost", "id20168730_admin", "\I(FZ8NgE)awoyvQ", "id20168730_bloodline");
            if(isset($_POST['edit_btn']))
            {
                $id = $_POST['edit_id'];
                
                $query = "SELECT * FROM requests WHERE id='$id' ";
                $query_run = mysqli_query($connection, $query);

                foreach($query_run as $row){
                     ?>
        <div style="height: 400px; overflow-y: auto;">
			<table id="example" class="table table-striped table-bordered">
                        <form action="test_req.php" method="POST">
                            <input type="hidden" name="edit_id" value="<?php echo $row['id'] ?>">
                            <div class="form-group">
                                <label> Lastname </label>
                                <input type="text" name="edit_lastname" value="<?php echo $row['lastname'] ?>" class="form-control"
                                    placeholder="Enter Lastname"required>
                            </div>
                            <div class="form-group">
                                <label> Firstname </label>
                                <input type="text" name="edit_firstname" value="<?php echo $row['firstname'] ?>" class="form-control"
                                    placeholder="Enter Firstname"required>
                            </div>
                            <div class="form-group">
                            <label for="" class="control-label">Select sex</label>
                            <select name="edit_sex" id="" class="custom-select select2" required>
                                <option value ="<?php echo $row['sex'] ?>"> <?php echo $row['sex'] ?></option>
                                <option value = "Female"> Female </option>
                                <option value = "Male"> Male </option>
                            </select>
                            </div>
                            <div class="form-group">
                                <label>Street</label>
                                <input type="text" name="edit_street" value="<?php echo $row['street'] ?>" class="form-control"
                                    placeholder="Enter Street"required>
                            </div>
                            <div class="form-group">
                                <label>Barangay</label>
                                <input type="text" name="edit_barangay" value="<?php echo $row['barangay'] ?>" class="form-control"
                                    placeholder="Enter Barangay"required>
                            </div>
                            <div class="form-group">
                                <label>Town/Municipality</label>
                                <input type="text" name="edit_tm" value="<?php echo $row['tm'] ?>" class="form-control"
                                    placeholder="Enter Town/Municipality"required>
                            </div>
                            <div class="form-group">
                                <label>City</label>
                                <input type="text" name="edit_city" value="<?php echo $row['city'] ?>" class="form-control"
                                    placeholder="Enter City"required>
                            </div>
                            <div class="form-group">
                                <label>Number of Units</label>
                                <input type="text" name="edit_unit" value="<?php echo $row['unit'] ?>" class="form-control"
                                    placeholder="Enter nummber of units" required>
                            </div>
                            <div class="form-group">
                                <label>Name of relative/guardian</label>
                                <input type="text" name="edit_relative" value="<?php echo $row['relative'] ?>" class="form-control"
                                    placeholder="Enter name of relative/guardian" required>
                            </div>
                            <div class="form-group">
                                <label>Number of relative/guardian</label>
                                <input type="text" name="edit_renum" value="<?php echo $row['renum'] ?>" class="form-control"
                                    placeholder="Enter number of relative/guardian" required>
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
                                <label>Components</label>
                                <input type="text" name="edit_ccname" value="<?php echo $row['ccname'] ?>" class="form-control"
                                    placeholder="Enter Components" required>
                            </div>
                            <div class="form-group">
                                <label>Hospital</label>
                                <input type="text" name="edit_hospital" value="<?php echo $row['hospital'] ?>" class="form-control"
                                    placeholder="Enter Designated Hospital" required>
                            </div>
                        <div class="form-group">
                            <label for="" class="control-label">Status</label>
                            <select name="edit_status" id="" class="custom-select select2" required>
                                <option value ="<?php echo $row['status'] ?>"> <?php echo $row['status'] ?></option>
                                <option value="pending"> pending </option>
                                <option value="accepted"> accepted </option>
                            </select>
                        </div>
                        <td align="right">
                            <a href="request.php" class="btn btn-danger"> CANCEL </a>
                            <button type="submit" name="update" class="btn btn-primary"> UPDATE </button>
                        </td>
                        </form>
                 <?php
                }
            }
        ?>
        </div>
    </div>
</div>

</div>
</div>       
    </table>