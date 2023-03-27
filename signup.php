<?php
if(!empty($_POST['lastname'])  && !empty($_POST['firstname']) && !empty($_POST['middlename']) && !empty($_POST['password']) && !empty($_POST['birthdate'])  && !empty($_POST['age']) && !empty($_POST['sex']) && !empty($_POST['bloodGroup'])  && !empty($_POST['identifyno']) 
&& !empty($_POST['street']) && !empty($_POST['barangay'])&& !empty($_POST['tm'])&& !empty($_POST['city']) && !empty($_POST['code'])  
&& !empty($_POST['mobileNumber']) && !empty($_POST['email']) && !empty($_POST['idno']) && !empty($_POST['reqimg']) && !empty($_POST['numtimes']) && !empty($_POST['lastdate']) && !empty($_POST['place']) && !empty($_POST['previous']) && !empty($_POST['group1']) && !empty($_POST['group2']) && !empty($_POST['group3']) && !empty($_POST['group4'])&& !empty($_POST['group5'])
&& !empty($_POST['group6'])&& !empty($_POST['group7'])){

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
    
    $lastdate = $_POST['lastdate'];
    $place = $_POST['place'];
    $previous = $_POST['previous'];
    $group1 = $_POST['group1'];
    $group2 = $_POST['group2'];
    $group3 = $_POST['group3'];
    $group4= $_POST['group4'];
    $group5 = $_POST['group5'];
    $group6 = $_POST['group6'];
    $group7 = $_POST['group7'];
    
  
    $target_dir = "Images/";
    $reqimg = $_POST['reqimg'];
    $imageStore = rand()."_".time().".jpeg";
    $target_dir = $target_dir."/".$imageStore;
    file_put_contents($target_dir, base64_decode($reqimg));
    if($con){
        $sql = "INSERT INTO donor (lastname, firstname, middlename, password, birthdate, age, sex, bloodGroup, identifyno, street, barangay, tm, city, code, mobileNumber, email, idno, reqimg, numtimes, lastdate, place, previous, group1, group2, group3, group4,group5,group6,group7) values 
        ('".$lastname."', '".$firstname."', '".$middlename."', '".$password ."', '".$birthdate."', '".$age."','".$sex."', '".$bloodGroup."', '".$identifyno."', '".$street."', '".$barangay."', '".$tm."', '".$city."', '".$code."', '".$mobileNumber."', '".$email."', '".$idno."', '".$imageStore."','".$numtimes."', '".$lastdate."', '".$place."', '".$previous."', '".$group1."', '".$group2."', '".$group3."', '".$group4."', '".$group5."', '".$group6."', '".$group7."')";
       
        if (mysqli_query($con, $sql)) {
         
            echo "success";
        }else echo "Registration failed";
        
        }else echo "Database connection failed";
    }else echo "All fields are required"

?>