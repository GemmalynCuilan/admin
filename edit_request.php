<?php
include('includes/header.php'); 
include('includes/navbar.php'); 
include('security.php');
?>

<div class="container-fluid">

  
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"> EDIT PROFILE </h6>
        </div>
        <div class="card-body">
        <?php
            $connection = mysqli_connect("localhost","root","","bloodline");
            if(isset($_POST['edit_btn']))
            {
                $id = $_POST['edit_id'];
                
                $query = "SELECT * FROM requests WHERE id='$id' ";
                $query_run = mysqli_query($connection, $query);

                foreach($query_run as $row){
                     ?>
                        <form action="test_req.php" method="POST">
                            <input type="text" name="edit_id" value="<?php echo $row['id'] ?>">
                            <div class="form-group">
                                <label> Patient Name </label>
                                <input type="text" name="edit_username" value="<?php echo $row['username'] ?>" class="form-control"
                                    placeholder="Enter Username">
                            </div>

                            <div class="form-group">
                                <label>Address</label>
                                <input type="text" name="edit_address" value="<?php echo $row['address'] ?>" class="form-control"
                                    placeholder="Enter Address">
                            </div>

                            <div class="form-group">
                                <label>Mobile number</label>
                                <input type="text" name="edit_number" value="<?php echo $row['number'] ?>" class="form-control"
                                    placeholder="Enter Mobile number">

                            </div>

                            <div class="form-group">
                            <label for="" class="control-label">Blood Group</label>
                            <select name="edit_bloodGroup" id="" class="custom-select select2" required>
                                <option value ="<?php echo $row['bloodGroup'] ?>"> Select blood group</option>
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
                        <label for="">Status</label>
                        <select name="edit_status">
                            <option value=""> Select Status </option>
                            <option value="0"> pending </option>
                            <option value="1"> approved </option>
                        </select>
                        </div>
                            <a href="request.php" class="btn btn-danger"> CANCEL </a>
                            <button type="submit" name="update" class="btn btn-primary"> UPDATE </button>
                        </form>
                 <?php
                }
            }
        ?>
        </div>
    </div>
</div>

</div>