<?php require_once("dbconfig.php");
   
$id = $_GET['id'];
$stmt=mysqli_query($connection,"SELECT reqimg from requests WHERE id=$id");
$count=mysqli_num_rows($stmt);
if($count==1) {
    $row=mysqli_fetch_array($stmt);
     $image=$row['reqimg'];
$file='Images/'.$image;
if (headers_sent()) {
    echo 'HTTP header already sent';
} else {
        ob_end_clean();
        header("Content-Type: application/image");
        header("Content-Disposition: attachment; filename=\"".basename($file)."\"");
        readfile($file);
        exit;  
}
echo "<script>window.close();</script>";
}
else 
{
    echo 'File not found '; 
} 
      
?>