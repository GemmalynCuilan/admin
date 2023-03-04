<?php
if(!empty($_POST['lastname'])  && !empty($_POST['firstname']) && !empty($_POST['middlename']) && !empty($_POST['password']) && !empty($_POST['birthdate'])  && !empty($_POST['age']) && !empty($_POST['sex']) && !empty($_POST['bloodGroup'])  && !empty($_POST['identifyno']) 
&& !empty($_POST['street']) && !empty($_POST['barangay'])&& !empty($_POST['tm'])&& !empty($_POST['city']) && !empty($_POST['code'])  
&& !empty($_POST['mobileNumber']) && !empty($_POST['email']) && !empty($_POST['idno']) && !empty($_POST['reqimg']) ){

    $con = mysqli_connect("localhost", "root", "", "bloodlinenew");
    $lastname = $_POST['lastname'];
    $firstname = $_POST['firstname'];
    $middlename = $_POST['middlename'];
    $password = $_POST['password'];
    $birthdate = $_POST['birthdate'];
    $age= $_POST['age'];
    $sex = $_POST['sex'];
    $bloodGroup= $_POST['bloodGroup'];
    $identifyno = $_POST['identifyno'];
    $street = $_POST['street'];
    $barangay = $_POST['barangay'];
    $tm = $_POST['tm'];
    $city = $_POST['city'];
    $code = $_POST['code'];
    $mobileNumber= $_POST['mobileNumber'];
    $email= $_POST['email'];
    $idno = $_POST['idno'];
  
    $target_dir = "Images/";
    $reqimg = $_POST['reqimg'];
    $imageStore = rand()."_".time().".jpeg";
    $target_dir = $target_dir."/".$imageStore;
    file_put_contents($target_dir, base64_decode($reqimg));
    if($con){
        $sql = "INSERT INTO donor (lastname, firstname, middlename, password, birthdate, age, sex, bloodGroup, identifyno, street, barangay, tm, city, code, mobileNumber, email, idno, reqimg) values 
        ('".$lastname."', '".$firstname."', '".$middlename."', '".$password ."', '".$birthdate."', '".$age."','".$sex."', '".$bloodGroup."', '".$identifyno."', '".$street."', '".$barangay."', '".$tm."', '".$city."', '".$code."', '".$mobileNumber."', '".$email."', '".$idno."', '".$imageStore."')";
       
        if (mysqli_query($con, $sql)) {
         
            echo "success";
        }else echo "Registration failed";
        
        }else echo "Database connection failed";
    }else echo "All fields are required"

?>