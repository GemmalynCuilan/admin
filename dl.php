<?php
@session_start();
include('includes/header.php'); 
include('includes/navbar.php'); 
include('security.php');
include('includes/scripts.php');
?>
<?php 
require_once("dbconfig.php");
        if(isset($_POST['dl_btn']))
        {
            $id = $_POST['dl_id'];
            
        $res=mysqli_query($connection,"SELECT* from donor ORDER by id DESC");
			while($row=mysqli_fetch_array($res)) 
			{
				echo '<tr> 
                  <td><img src="Images/'.$row['reqimg'].'" height="200"></td> 
                  <td><a href="download.php?id='.$row['id'].'"><button class="btn-primary download_btn">Download</button></a>
                  </td> 
				</tr>';
            }
} ?>