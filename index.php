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
                $connection = mysqli_connect("localhost","root","","bloodlinenew");
                if(isset($_POST['submit'])){

                  $username = $_POST['username'];
                  $password = $_POST['password'];
                  $select = " SELECT * FROM admin WHERE username = '$username' && password = '$password' ";

                  $result = mysqli_query($connection, $select);

                  if(mysqli_num_rows($result) > 0){
                      $error[] = 'user already exist!';
                      
                  }else{

                        $insert = "INSERT INTO admin(username, password) VALUES('$username','$password')";
                        mysqli_query($connection, $insert);
                        header('location:loginAdmin.php');
                  }
                };
                ?>
              </div>
              
               <div class="form-container">

                <form action="" method="post">
                    <?php
                    if(isset($error)){
                      foreach($error as $error){
                          echo '<span class="error-msg">'.$error.'</span>';
                      };
                    };
                    ?>
                    </div>
                <form class="user" action="" method="POST">

                    <div class="form-group">
                    <input type="text" name="username" class="form-control form-control-user" required placeholder="Enter your Username">
                    </div>
                    <div class="form-group">
                    <input type="password" name="password" class="form-control form-control-user" required placeholder="Enter your Password">
                    </div>
            
                    <button type="submit" name="submit" class="btn btn-primary btn-user btn-block"> Register </button>
                    <hr>
                    <p>Already have an account? <a href="loginAdmin.php">login now</a></p>
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