<?php
$connection = mysqli_connect("localhost","root","","bloodlinenew");
$output = '';
if(isset($_POST["export_excel"])){
    $sql = "SELECT * FROM requests order by id DESC";
    $result = mysqli_query($connection, $sql);
    if(mysqli_num_rows($result)>0){
        $output .= '
          <table class="table" bordered="1">
          <tr>
          <th>Id</th>
          <th>Date of requested</th>
          <th>Lastname </th>
          <th>Firstname </th>
          <th>Email </th>
          <th>Sex </th>
          <th>Street </th>
          <th>Barangay </th>
          <th>Town/Municipality </th>
          <th>City </th>
          <th>Number of Units </th>
          <th>Name of relative/guardian </th>
          <th>Number of relative/guardian </th>
          <th>Request Blood group</th>
          <th>Reason</th>
          <th>Components </th>
          <th>Hospital </th>
          <th>Status</th>
          </tr>
        ';
        while($row = mysqli_fetch_array($result)){
            $output.='
            <tr>
            <td>'.$row['id'].'</td>
            <td>'.$row['date'].'</td>
            <td>'.$row['lastname'].'</td>
            <td>'.$row['firstname'].'</td>
            <td>'.$row['email'].'</td>
            <td>'.$row['sex'].'</td>
            <td>'.$row['street'].'</td>
            <td>'.$row['barangay'].'</td>
            <td>'.$row['tm'].'</td>
            <td>'.$row['city'].'</td>
            <td>'.$row['unit'].'</td>
            <td>'.$row['relative'].'</td>
            <td>'.$row['renum'].'</td>
            <td>'.$row['bloodGroup'].'</td>
            <td>'.$row['reason'].'</td>
            <td>'.$row['ccname'].'</td>
            <td>'.$row['hospital'].'</td>
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