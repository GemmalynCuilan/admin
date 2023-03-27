<?php
if(!empty($_POST['lastname']) && !empty($_POST['firstname']) && !empty($_POST['email']) && !empty($_POST['sex']) && !empty($_POST['street']) && !empty($_POST['barangay']) && !empty($_POST['tm']) && !empty($_POST['city'])&& !empty($_POST['unit'])
&& !empty($_POST['relative'])&& !empty($_POST['renum'])&& !empty($_POST['bloodGroup']) && !empty($_POST['ccname']) && !empty($_POST['hospital'])&& !empty($_POST['reqimg'])&& !empty($_POST['reason'])){

    $con = mysqli_connect("localhost", "root", "", "bloodlinenew");
    $lastname = $_POST['lastname'];
    $firstname = $_POST['firstname'];
    $sex = $_POST['sex'];
    $street = $_POST['street'];
    $barangay = $_POST['barangay'];
    $tm = $_POST['tm'];
    $city = $_POST['city'];
    $unit = $_POST['unit'];
    $relative = $_POST['relative'];
    $email = $_POST['email'];
    $renum = $_POST['renum'];
    $bloodGroup= $_POST['bloodGroup'];
    $ccname = $_POST['ccname'];
    $hospital = $_POST['hospital'];
    $reason = $_POST['reason'];
    
    $target_dir = "Images/";
    $reqimg = $_POST['reqimg'];
    $imageStore = rand()."_".time().".jpeg";
    $target_dir = $target_dir."/".$imageStore;
    file_put_contents($target_dir, base64_decode($reqimg));
  
    if($con){
        $sql = "insert into requests (lastname, firstname, sex, street, barangay, tm, city, unit,relative,renum,bloodGroup,ccname,hospital,reqimg,email,reason) values 
        ('".$lastname."', '".$firstname."', '".$sex."', '".$street."', '".$barangay."', '".$tm."', '".$city."', '".$unit."', '".$relative."', '".$renum."', '".$bloodGroup."', '".$ccname."', '".$hospital."', '".$imageStore."','".$email."','".$reason."')";
        if (mysqli_query($con, $sql)) {
            echo "success";
        }else echo "Registration failed";
        
        }else echo "Database connection failed";
    }else echo "All fields are required"

?>
