<?php
$connection = mysqli_connect("localhost","root","","bloodlinenew");
$output = '';
if(isset($_POST["export_excel"])){
    $sql = "SELECT * FROM donor order by id DESC";
    $result = mysqli_query($connection, $sql);
    if(mysqli_num_rows($result)>0){
        $output .= '
          <table class="table" bordered="1">
          <tr>
          <th> Indentification No.</th>
          <th> ID </th>
              <th> Lastname</th>
              <th> Firstname</th>
              <th> Middlename</th>
              <th> Password</th>
              <th> Birthdate </th>
              <th> Age </th>
              <th> Sex </th>
              <th> Blood Group</th>
              <th> Identification</th>
              <th> Street</th>
              <th> Barangay</th>
              <th> Town/Municipality</th>
              <th> City</th>
              <th> Zip Code</th>
              <th> Mobile Number</th>
              <th> Email Address</th>
              <th> Status</th>
          </tr>
        ';
        while($row = mysqli_fetch_array($result)){
            $output.='
            <tr>
            <td>'.$row['idno'].'</td>
            <td>'.$row['id'].'</td>
            <td>'.$row['lastname'].'</td>
            <td>'.$row['firstname'].'</td>
            <td>'.$row['middlename'].'</td>
            <td>'.$row['password'].'</td>
            <td>'.$row['birthdate'].'</td>
            <td>'.$row['age'].'</td>
            <td>'.$row['sex'].'</td>
            <td>'.$row['bloodGroup'].'</td>
            <td>'.$row['identifyno'].'</td>
            <td>'.$row['street'].'</td>
            <td>'.$row['barangay'].'</td>
            <td>'.$row['tm'].'</td>
            <td>'.$row['city'].'</td>
            <td>'.$row['code'].'</td>
            <td>'.$row['mobileNumber'].'</td>
            <td>'.$row['email'].'</td>
            <td>'.$row['status'].'</td>
            </tr>
            ';
        }
        $output .= '</table>';
        header("Content-Type: applicaton/xls");
        header("Content-Disposition: attachment; filename=download.xls");
        echo $output;
    }
}
?>