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
    
    <!-- Registered donor -->
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
              <i class="fas fa-calendar fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Pending requests -->
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
                echo '<h4> Total Requests: '.$row.'</h4>';
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

    <!-- Task -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-info shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Tasks</div>
              <div class="row no-gutters align-items-center">
                <div class="col-auto">
                  <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">50%</div>
                </div>
                <div class="col">
                  <div class="progress progress-sm mr-2">
                    <div class="progress-bar bg-info" role="progressbar" style="width: 50%" aria-valuenow="50"
                      aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-auto">
              <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Pending Requests -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-warning shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Events</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">0</div>
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
  <div class="row">

    <!-- Registered A+ -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-danger shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xl font-weight-bold text-danger text-uppercase mb-1">Blood Group A+</div>
              <div class="h2 mb-0 font-weight-bold text-gray-800">

              <?php
                require 'dbconfig.php';
                $query = "SELECT bloodGroup FROM donor where bloodGroup like 'A+' Order by bloodGroup ";  
                $query_run = mysqli_query($connection, $query);
                $row = mysqli_num_rows($query_run);
                echo '<h4> '.$row.'</h4>';
            ?>
              </div>
            </div>
            <div class="col-auto">
              <i class="fas fa-tint fa-2x text-gray-900"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

        <!-- Registered A- -->
        <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-danger shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xl font-weight-bold text-danger text-uppercase mb-1">Blood Group A-</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">

              <?php
                require 'dbconfig.php';
                $query = "SELECT bloodGroup FROM donor where bloodGroup like 'A-' Order by bloodGroup ";  
                $query_run = mysqli_query($connection, $query);
                $row = mysqli_num_rows($query_run);
                echo '<h4> '.$row.'</h4>';
            ?>
              </div>
            </div>
            <div class="col-auto">
            <i class="fas fa-tint fa-2x text-gray-900"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

        <!-- Registered B+ -->
        <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-danger shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xl font-weight-bold text-danger text-uppercase mb-1">Blood Group B+</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">

              <?php
                require 'dbconfig.php';
                $query = "SELECT bloodGroup FROM donor where bloodGroup like 'B+' Order by bloodGroup ";  
                $query_run = mysqli_query($connection, $query);
                $row = mysqli_num_rows($query_run);
                echo '<h4> '.$row.'</h4>';
            ?>
              </div>
            </div>
            <div class="col-auto">
            <i class="fas fa-tint fa-2x text-gray-900"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
        <!-- Registered B- -->
        <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-danger shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xl font-weight-bold text-danger text-uppercase mb-1">Blood Group B-</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">

              <?php
                require 'dbconfig.php';
                $query = "SELECT bloodGroup FROM donor where bloodGroup like 'B-' Order by bloodGroup ";  
                $query_run = mysqli_query($connection, $query);
                $row = mysqli_num_rows($query_run);
                echo '<h4> '.$row.'</h4>';
            ?>
              </div>
            </div>
            <div class="col-auto">
            <i class="fas fa-tint fa-2x text-gray-900"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
       <!-- Registered AB+ -->
       <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-danger shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xl font-weight-bold text-danger text-uppercase mb-1">Blood Group AB+</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">

              <?php
                require 'dbconfig.php';
                $query = "SELECT bloodGroup FROM donor where bloodGroup like 'AB+' Order by bloodGroup ";  
                $query_run = mysqli_query($connection, $query);
                $row = mysqli_num_rows($query_run);
                echo '<h4> '.$row.'</h4>';
            ?>
              </div>
            </div>
            <div class="col-auto">
            <i class="fas fa-tint fa-2x text-gray-900"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
        <!-- Registered AB- -->
        <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-danger shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xl font-weight-bold text-danger text-uppercase mb-1">Blood Group AB-</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">

              <?php
                require 'dbconfig.php';
                $query = "SELECT bloodGroup FROM donor where bloodGroup like 'AB-' Order by bloodGroup ";  
                $query_run = mysqli_query($connection, $query);
                $row = mysqli_num_rows($query_run);
                echo '<h4> '.$row.'</h4>';
            ?>
              </div>
            </div>
            <div class="col-auto">
            <i class="fas fa-tint fa-2x text-gray-900"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
        <!-- Registered O+ -->
        <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-danger shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xl font-weight-bold text-danger text-uppercase mb-1">Blood Group O+</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">

              <?php
                require 'dbconfig.php';
                $query = "SELECT bloodGroup FROM donor where bloodGroup like 'O+' Order by bloodGroup ";  
                $query_run = mysqli_query($connection, $query);
                $row = mysqli_num_rows($query_run);
                echo '<h4> '.$row.'</h4>';
            ?>
              </div>
            </div>
            <div class="col-auto">
            <i class="fas fa-tint fa-2x text-gray-900"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

        <!-- Registered O- -->
        <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-danger shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xl font-weight-bold text-danger text-uppercase mb-1">Blood Group O-</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">

              <?php
                require 'dbconfig.php';
                $query = "SELECT bloodGroup FROM donor where bloodGroup like 'O-' Order by bloodGroup ";  
                $query_run = mysqli_query($connection, $query);
                $row = mysqli_num_rows($query_run);
                echo '<h4> '.$row.'</h4>';
            ?>
              </div>
            </div>
            <div class="col-auto">
            <i class="fas fa-tint fa-2x text-gray-900"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

   
  </div>

  <?php
include('includes/scripts.php');
include('includes/footer.php');
?>