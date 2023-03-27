<?php
@session_start();
include('includes/header.php'); 
include('includes/navbar.php'); 
include('security.php');

?>

<div class="container-fluid">

   
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h3 class="m-0 font-weight-bold text-primary"> EDIT DONOR'S PROFILE </h3>
        </div>
        <div class="card-body">
    
        <?php
            $connection = mysqli_connect("localhost","root","","bloodlinenew");
            // $connection = mysqli_connect("localhost", "id20168730_admin", "\I(FZ8NgE)awoyvQ", "id20168730_bloodline");

        
            if(isset($_POST['edit_btn']))
            {
                $id = $_POST['edit_id'];
                
                $query = "SELECT * FROM donor WHERE id='$id' ";
                $query_run = mysqli_query($connection, $query);

                foreach($query_run as $row){
                     ?>
        <div style="height: 400px; overflow-y: auto;">
			<table id="example" class="table table-striped table-bordered">
                        <form action="test.php" method="POST">
                            <input type="hidden" name="edit_id" value="<?php echo $row['id'] ?>">
                            <div class="form-group">
                                <label> Last Name </label>
                                <input type="text" name="edit_lastname" value="<?php echo $row['lastname'] ?>" class="form-control"
                                    placeholder="Enter Last Name"required>
                            </div>
                            <div class="form-group">
                                <label> First Name </label>
                                <input type="text" name="edit_firstname" value="<?php echo $row['firstname'] ?>" class="form-control"
                                    placeholder="Enter First Name"required>
                            </div>
                            <div class="form-group">
                                <label> Middle Name </label>
                                <input type="text" name="edit_middlename" value="<?php echo $row['middlename'] ?>" class="form-control"
                                    placeholder="Enter Middle Name"required>
                            </div>
                            <div class="form-group">
                                <label> Birth Date </label>
                                <input type="date" name="edit_birthdate" value="<?php echo $row['birthdate'] ?>" class="form-control"
                                    placeholder="Enter Birth Date"required>
                            </div>
                            <div class="form-group">
                                <label> Age </label>
                                <input type="text" name="edit_age" value="<?php echo $row['age'] ?>" class="form-control"
                                    placeholder="Enter Age"required>
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
                            <label for="" class="control-label">Indentification</label>
                            <select name="edit_identifyno" id="" class="custom-select select2" required>
                                <option value =" <?php echo $row['identifyno'] ?>"><?php echo $row['identifyno'] ?></option>
                                <option value = "School">School</option>
                                <option value = "Company">Company</option>
                                <option value = "PRC">PRC</option>
                                <option value = "Drivers">Drivers</option>
                                <option value = "SSS">SSS</option>
                                <option value = "Others">Others</option>
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
                                <label>Province/City</label>
                                <input type="text" name="edit_city" value="<?php echo $row['city'] ?>" class="form-control"
                                    placeholder="Enter City"required>
                            </div>
                            <div class="form-group">
                                <label>Zip code</label>
                                <input type="text" name="edit_code" value="<?php echo $row['code'] ?>" class="form-control"
                                    placeholder="Enter Zip code"required>
                            </div>
                            <div class="form-group">
                                <label>Mobile number</label>
                                <input type="text" name="edit_mobileNumber" value="<?php echo $row['mobileNumber'] ?>" class="form-control"
                                    placeholder="Enter Mobile number"required>

                            </div>
                            <div class="form-group">
                                <label>Email Address</label>
                                <input type="text" name="edit_email" value="<?php echo $row['email'] ?>" class="form-control"
                                    placeholder="Enter Email Address"required>
                            </div>
                          
                            <div class="form-group">
                                <label>Identification No.</label>
                                <input type="text" name="edit_idno" value="<?php echo $row['idno'] ?>" class="form-control"
                                    placeholder="Enter Indentification No."required>
                            </div>
                             <div class="form-group">
                            <label for="" class="control-label">Status</label>
                            <select name="edit_status" id="" class="custom-select select2" required>
                                <option value ="<?php echo $row['status'] ?>"><?php echo $row['status'] ?></option>
                                <option value="active"> Active </option>
                                <option value="inactive"> Inactive </option>
                                </select>
                             </div>
                             <label>Medical History</label>
                             <div class="form-group">
                            <label for="" class="control-label">History of previous donation?</label>
                            <select name="edit_previous" id="" class="custom-select select2" required>
                                <option value ="<?php echo $row['previous'] ?>"><?php echo $row['previous'] ?></option>
                                <option value="Yes"> Yes </option>
                                <option value="No"> No </option>
                                </select>
                             </div>
                        <div class="form-group">
                                <label>No. of times:</label>
                                <input type="text" name="edit_numtimes" value="<?php echo $row['numtimes'] ?>" class="form-control"
                                    placeholder="Enter No. of times"required>
                            </div>
                            <div class="form-group">
                                <label> Date of last donation </label>
                                <input type="date" name="edit_lastdate" value="<?php echo $row['lastdate'] ?>" class="form-control"
                                    placeholder="Enter date of last donation"required>
                            </div>
                        <div class="form-group">
                                <label>Place of last donation</label>
                                <input type="text" name="edit_place" value="<?php echo $row['place'] ?>" class="form-control"
                                    placeholder="Enter place of last donation"required>
                            </div>
                        <div class="form-group">
                            <label for="" class="control-label">Cancer, blood disease or bleeding, disorder(haemophilia)?</label>
                            <select name="edit_group1" id="" class="custom-select select2" required>
                                <option value ="<?php echo $row['group1'] ?>"><?php echo $row['group1'] ?></option>
                                <option value="Yes"> Yes </option>
                                <option value="No"> No </option>
                                </select>
                             </div>
                        <div class="form-group">
                            <label for="" class="control-label">Heart disease/surgery, rheumatic fever or chest pains?</label>
                            <select name="edit_group2" id="" class="custom-select select2" required>
                                <option value ="<?php echo $row['group2'] ?>"><?php echo $row['group2'] ?></option>
                                <option value="Yes"> Yes </option>
                                <option value="No"> No </option>
                                </select>
                             </div>
                        <div class="form-group">
                            <label for="" class="control-label">Lung disease, tuberculosis, or asthma?</label>
                            <select name="edit_group3" id="" class="custom-select select2" required>
                                <option value ="<?php echo $row['group3'] ?>"><?php echo $row['group3'] ?></option>
                                <option value="Yes"> Yes </option>
                                <option value="No"> No </option>
                                </select>
                             </div>
                        <div class="form-group">
                            <label for="" class="control-label">Kidney disease, thyroid disease, diabetes, epilepsy?</label>
                            <select name="edit_group4" id="" class="custom-select select2" required>
                                <option value ="<?php echo $row['group4'] ?>"><?php echo $row['group4'] ?></option>
                                <option value="Yes"> Yes </option>
                                <option value="No"> No </option>
                                </select>
                             </div>
                             <div class="form-group">
                            <label for="" class="control-label">Chicken pox and/or cold sores?</label>
                            <select name="edit_group5" id="" class="custom-select select2" required>
                                <option value ="<?php echo $row['group5'] ?>"><?php echo $row['group5'] ?></option>
                                <option value="Yes"> Yes </option>
                                <option value="No"> No </option>
                                </select>
                             </div>
                             <div class="form-group">
                            <label for="" class="control-label">Had a positive test for the HIV virus, Hepatitis virus, Syphilis or Malaria?</label>
                            <select name="edit_group6" id="" class="custom-select select2" required>
                                <option value ="<?php echo $row['group6'] ?>"><?php echo $row['group6'] ?></option>
                                <option value="Yes"> Yes </option>
                                <option value="No"> No </option>
                                </select>
                             </div>
                             <div class="form-group">
                            <label for="" class="control-label">Have Malaria or Hepatitis in the past?</label>
                            <select name="edit_group7" id="" class="custom-select select2" required>
                                <option value ="<?php echo $row['group7'] ?>"><?php echo $row['group7'] ?></option>
                                <option value="Yes"> Yes </option>
                                <option value="No"> No </option>
                                </select>
                             </div>
                             <td align="right">
                            <a href="donor.php" class="btn btn-secondary"> CANCEL </a>
                            <button type="submit" name="updatebtn" class="btn btn-primary"> UPDATE </button>
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