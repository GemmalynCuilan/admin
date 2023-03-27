<?php
session_start();
include('includes/header.php'); 
include('includes/navbar.php'); 
include('security.php');
include('includes/scripts.php');
?>
<?php
include 'mail.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<title>Send Mail </title>
</head>
<body>
<div class="container-fluid">

		<!-- DataTales Example -->
		<div class="card shadow mb-4">
		<div class="card-header py-3">
			<h2 class="m-0 font-weight-bold text-danger">Send Email 
			</h2>
			<div class="card-body">
			<body class="body-wrapper">
				<section class="contact-page-wrap">
					<div class="container">
						<div class="row section-padding">
							<div class="col-12 col-lg-12">
								<div class="contact-form">
								<form method="POST" class="row" id="contact-form">
								<div class="col-md-8 col-12">
									<div class="single-personal-info">
										<label for="email">Email Address</label>
									<select name="email" class = "form-control multiple-select" multiple require>
									<option value="">--Select Email--</option>
									<?php
									 $connection = mysqli_connect("localhost","root","","bloodlinenew");
									 $query = "SELECT * FROM donor";
               						 $query_run = mysqli_query($connection, $query);
									 if(mysqli_num_rows($query_run)>0){
										foreach($query_run as $row){
											?>
											<option value="<?php echo $row['email'];?>"><?php echo $row['email'];?></option>
											<?php
										}
									 }
									 else{
										echo "No Record Found";
									 }
									 ?>
									 </select> 
             
                                </div>
								</div>		
							
				<div class="col-md-8 col-12">
					<div class="single-personal-info">
						<label for="subject">Subject</label>
						<input name="subject"type="text" class="form-control" required>
					</div>
				</div>
					<div class="col-md-8 col-12">
					<div class="single-personal-info">
					<label for="message" class="col-form-label">Message:</label>
					<textarea class="form-control" id="" name="message"required></textarea>
					</div>
				</div>
				<div class="col-md-12 my-2"><?php $alert; ?></div>
				<div class="col-md-12 col-12 text-left">
				
				<button type="submit" name="submit"class="btn btn-primary">Submit</button>
				
				</div>
			</div>
		</form>
	
	</div>
	</div>
		</div>

</section>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
	$(".multiple-select").select2({
  	//maximumSelectionLength: 2
	});
</script>
</body>
</html>

