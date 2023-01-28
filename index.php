<?php
session_start();
include('includes/header.php'); 
?>

<div class="container">

<!-- Outer Row -->
<div class="row justify-content-center">

  <div class="col-xl-6 col-lg-6 col-md-6">

    <div class="card o-hidden border-0 shadow-lg my-5">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          <div class="col-lg-12">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Register Here!</h1>
                <?php
                include_once 'dbconfig.php';
                if(isset($_POST['submit']))
                {	 
                    $username = $_POST['username'];
                    $password = $_POST['password'];
                
                    $sql = "INSERT INTO admin (username,password)
                    VALUES ('$username','$password')";
                    if (mysqli_query($connection, $sql)) {
                        echo "New record created successfully !";
                    } else {
                        echo "Error: " . $sql . "
                " . mysqli_error($connection);
                    }
                    mysqli_close($connection);
                }
                ?>
              </div>

                <form class="user" action="login.php" method="POST">

                    <div class="form-group">
                    <input type="username" name="username" class="form-control form-control-user" placeholder="Enter username...">
                    </div>
                    <div class="form-group">
                    <input type="password" name="password" class="form-control form-control-user" placeholder="Password">
                    </div>
            
                    <button type="submit" name="submit" class="btn btn-primary btn-user btn-block"> Register </button>
                    <hr>
                    <p>Already have an account? <a href="login.php">login now</a></p>
                </form>


            </div>
          </div>
        </div>
      </div>
    </div>

  </div>

</div>

</div>


<?php
include('includes/scripts.php'); 
?>