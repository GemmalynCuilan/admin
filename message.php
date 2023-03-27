<?php
@session_start();
include('includes/header.php'); 
include('includes/navbar.php'); 
include('security.php');

?>
<?php
include 'mail.php'
?>
<div class="container-fluid">

		<!-- DataTales Example -->
		<div class="card shadow mb-4">
		<div class="card-header py-3">
			<h2 class="m-0 font-weight-bold text-danger">Send Email 
			</h2>
			<div class="card-body">
			<?php
            $connection = mysqli_connect("localhost","root","","bloodlinenew");
            // $connection = mysqli_connect("localhost", "id20168730_admin", "\I(FZ8NgE)awoyvQ", "id20168730_bloodline");

        
            if(isset($_POST['msg_btn']))
            {
                $id = $_POST['msg_id'];
                
                $query = "SELECT * FROM requests WHERE id='$id' ";
                $query_run = mysqli_query($connection, $query);

                foreach($query_run as $row){
                     ?>
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
										<input name="email"type="text" value="<?php echo $row['email'] ?>"class="form-control" placeholder="Enter email">
									</div>
								</div>
			
							<div class="col-md-8 col-12">
							<div class="single-personal-info">
								<label for="subject">Subject</label>
								<input name="subject"type="text" class="form-control" placeholder="Enter subject">
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
				<?php
                }
				}
        ?>
			</div>
			</div>
				</div>
		
		</section>
	</body>