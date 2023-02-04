<?php
include('includes/header.php'); 
include('includes/navbar.php'); 
?>


<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
  </div>

  <!-- Content Row -->
  <div class="row">

    <!-- Total registered donor -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Registered Donor</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">
              <?php
                require 'dbconfig.php';
                $query = "SELECT id FROM donor ORDER BY id";  
                $query_run = mysqli_query($connection, $query);
                $row = mysqli_num_rows($query_run);
                echo '<h4> Total Donor: '.$row.'</h4>';
            ?>
              </div>
            </div>
            <div class="col-auto">
            <i class="fas fa-calendar fa-2x text-red-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Requests -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Pending requests</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">
              <?php
                require 'dbconfig.php';
                $query = "SELECT id FROM requests ORDER BY id";  
                $query_run = mysqli_query($connection, $query);
                $row = mysqli_num_rows($query_run);
                echo '<h5> Total Requests: '.$row.'</h5>';
            ?>
              </div>
            </div>
            <div class="col-auto">
              <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Upcoming Events -->
 <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-warning shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Upcoming events</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">
              <?php
                require 'dbconfig.php';
                $query = "SELECT id FROM event ORDER BY id";  
                $query_run = mysqli_query($connection, $query);
                $row = mysqli_num_rows($query_run);
                echo '<h4>'.$row.'</h4>';
            ?>
              </div>
            </div>
            <div class="col-auto">
              <i class="fas fa-comments fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Announcement Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-danger shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Announcement</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">
              <?php
                require 'dbconfig.php';
                $query = "SELECT id FROM event ORDER BY id";  
                $query_run = mysqli_query($connection, $query);
                $row = mysqli_num_rows($query_run);
                echo '<h4>'.$row.'</h4>';
            ?>
              </div>
            </div>
            <div class="col-auto">
              <i class="fas fa-comments fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Content Row -->
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="css/style.css">
<div class="container">
    <div class="row">
        <div class="col-lg-3 col-sm-6">
            <div class="card-box bg-blue">
                <div class="inner">
                    <h1> A+ </h1>
                    <?php
                require 'dbconfig.php';
                $query = "SELECT bloodGroup FROM donor where bloodGroup like 'A+' Order by bloodGroup ";  
                $query_run = mysqli_query($connection, $query);
                $row = mysqli_num_rows($query_run);
                echo '<h4> '.'Blood Group: '.$row.'</h4>';
                ?>
                </div>
                <div class="icon">
                    <i class="fa fa-tint" aria-hidden="true"></i>
                </div>
                <a href="A+.php" class="card-box-footer">View More <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>

        <div class="col-lg-3 col-sm-6">
            <div class="card-box bg-green">
                <div class="inner">
                    <h1> A- </h1>
                    <?php
                require 'dbconfig.php';
                $query = "SELECT bloodGroup FROM donor where bloodGroup like 'A-' Order by bloodGroup ";  
                $query_run = mysqli_query($connection, $query);
                $row = mysqli_num_rows($query_run);
                echo '<h4> '.'Blood Group: '.$row.'</h4>';
            ?>
                </div>
                <div class="icon">
                    <i class="fa fa-tint" aria-hidden="true"></i>
                </div>
                <a href="a-.php" class="card-box-footer">View More <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6">
            <div class="card-box bg-orange">
                <div class="inner">
                <h1> B+ </h1>
                    <?php
                require 'dbconfig.php';
                $query = "SELECT bloodGroup FROM donor where bloodGroup like 'B+' Order by bloodGroup ";  
                $query_run = mysqli_query($connection, $query);
                $row = mysqli_num_rows($query_run);
                echo '<h4> '.'Blood Group: '.$row.'</h4>';
                ?>
                </div>
                <div class="icon">
                    <i class="fa fa-tint" aria-hidden="true"></i>
                </div>
                <a href="b+.php" class="card-box-footer">View More <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6">
            <div class="card-box bg-red">
                <div class="inner">
                <h1> B- </h1>
                    <?php
                require 'dbconfig.php';
                $query = "SELECT bloodGroup FROM donor where bloodGroup like 'B-' Order by bloodGroup ";  
                $query_run = mysqli_query($connection, $query);
                $row = mysqli_num_rows($query_run);
                echo '<h4> '.'Blood Group: '.$row.'</h4>';
                ?>
                </div>
                <div class="icon">
                    <i class="fa fa-tint" aria-hidden="true"></i>
                </div>
                <a href="b-.php" class="card-box-footer">View More <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
    </div>
    
</div>

<div class="container">
    <div class="row">
        <div class="col-lg-3 col-sm-6">
            <div class="card-box bg-blue">
                <div class="inner">
                    <h1> AB+ </h1>
                    <?php
                require 'dbconfig.php';
                $query = "SELECT bloodGroup FROM donor where bloodGroup like 'AB+' Order by bloodGroup ";  
                $query_run = mysqli_query($connection, $query);
                $row = mysqli_num_rows($query_run);
                echo '<h4> '.'Blood Group: '.$row.'</h4>';
            ?>
                </div>
                <div class="icon">
                    <i class="fa fa-tint" aria-hidden="true"></i>
                </div>
                <a href="ab+.php" class="card-box-footer">View More <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>

        <div class="col-lg-3 col-sm-6">
            <div class="card-box bg-green">
                <div class="inner">
                    <h1> AB- </h1>
                    <?php
                require 'dbconfig.php';
                $query = "SELECT bloodGroup FROM donor where bloodGroup like 'AB-' Order by bloodGroup ";  
                $query_run = mysqli_query($connection, $query);
                $row = mysqli_num_rows($query_run);
                echo '<h4> '.'Blood Group: '.$row.'</h4>';
            ?>
                </div>
                <div class="icon">
                    <i class="fa fa-tint" aria-hidden="true"></i>
                </div>
                <a href="ab-.php" class="card-box-footer">View More <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6">
            <div class="card-box bg-orange">
                <div class="inner">
                <h1> O+ </h1>
                    <?php
                require 'dbconfig.php';
                $query = "SELECT bloodGroup FROM donor where bloodGroup like 'O+' Order by bloodGroup ";  
                $query_run = mysqli_query($connection, $query);
                $row = mysqli_num_rows($query_run);
                echo '<h4> '.'Blood Group: '.$row.'</h4>';
                ?>
                </div>
                <div class="icon">
                    <i class="fa fa-tint" aria-hidden="true"></i>
                </div>
                <a href="o+.php" class="card-box-footer">View More <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6">
            <div class="card-box bg-red">
                <div class="inner">
                <h1> O- </h1>
                    <?php
                require 'dbconfig.php';
                $query = "SELECT bloodGroup FROM donor where bloodGroup like 'O-' Order by bloodGroup ";  
                $query_run = mysqli_query($connection, $query);
                $row = mysqli_num_rows($query_run);
                echo '<h4> '.'Blood Group: '.$row.'</h4>';
                ?>
                </div>
                <div class="icon">
                    <i class="fa fa-tint" aria-hidden="true"></i>
                </div>
                <a href="o-.php" class="card-box-footer">View More <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
    </div>
    
</div>






  <?php
include('includes/scripts.php');
include('includes/footer.php');
?>