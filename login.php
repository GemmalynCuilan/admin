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
                <h1 class="h4 text-gray-900 mb-4">Login Here!</h1>
                <?php
                include_once 'dbconfig.php';
                if(isset($_POST['login_btn']))
                {	 
                    $username = $_POST['username'];
                    $password = $_POST['password'];
                
                    $sql = "SELECT * from admin where username ='$username' and password='" .$password. "'";
                    $result = mysqli_query($conn, $select);

                  if(mysqli_num_rows($result) > 0){

                      $row = mysqli_fetch_array($result);

                  }else{
                      $error[] = 'incorrect username or password!';
                  }
                }
                ?>
              </div>

                <form class="user" action="home.php" method="POST">

                    <div class="form-group">
                    <input type="username" name="username" class="form-control form-control-user" placeholder="Enter username">
                    </div>
                    <div class="form-group">
                    <input type="password" name="password" class="form-control form-control-user" placeholder="Password">
                    </div>
            
                    <button type="submit" name="login_btn" class="btn btn-primary btn-user btn-block"> Login </button>
                    <hr>
                    <p>Don't have an account? <a href="index.php">Register now</a></p>
                
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