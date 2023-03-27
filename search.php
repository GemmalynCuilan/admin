<?php  
 $connection = mysqli_connect("localhost", "root", "", "bloodlinenew");  
 if(isset($_POST["query"]))  
 {  
      $output = '';  
      $query = "SELECT * FROM donor WHERE lastname LIKE '%".$_POST["query"]."%'";  
      $result = mysqli_query($connection, $query);  
      $output = '<ul class="list-unstyled">';  
      if(mysqli_num_rows($result) > 0)  
      {  
           while($row = mysqli_fetch_array($result))  
           {  
                $output .= '<li data-id="'.$row["id"].'">'.$row["lastname"].','.$row["firstname"].'</li>';  
           }  
      }  
      else  
      {  
           $output .= '<li>Donor Not Found</li>';  
      }  
      $output .= '</ul>';  
      echo $output;  
 }  
 ?> 