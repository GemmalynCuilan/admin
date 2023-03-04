<?php
@session_start();
include('includes/header.php'); 
include('includes/navbar.php'); 
include('security.php');

?>
<div class="container-fluid">

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h2 class="m-0 font-weight-bold text-primary">Send Email 
    </h2>
  </div>
  <?php
                $query = "SELECT * FROM requests";
                $query_run = mysqli_query($connection, $query);
            ?>
			  <?php
                        if(mysqli_num_rows($query_run) > 0)        
                        {
                            while($row = mysqli_fetch_assoc($query_run))
                            {
                        ?>
  <div class="card-body">
<form>
  <div class="form-group">
    <label for="email">Email address</label>
    <input type="email" class="form-control" id="exampleInputEmail1"  placeholder="Enter email"required>
  </div>
 		 <div class="form-group">
                <label for="subject"> Subject </label>
                <input type="text" name="subject" class="form-control" placeholder="Enter Subject"required>
            </div>
			<div class="form-group">
            <label for="message" class="col-form-label">Message:</label>
            <textarea class="form-control" id="" name="message"required></textarea>
          </div>
  		<button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>
<?php
                 
                            } 
                        }
                        else {
                            echo "No Record Found";
                        }
                        ?>