<?php
require_once 'dbconfig.php';

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
    $sql = "SELECT * FROM donor where email= '$email'";
    $check = mysqli_query($connection,$sql);
    if(mysqli_num_rows($check)>0){
        $result = "UPDATE donor set email = '$email', lastname = '$lastname', firstname = '$firstname', middlename ='$middlename', password =$password', birthdate ='$birthdate', age ='$age', sex ='$sex',
        bloodGroup ='$bloodGroup', identifyno ='$identifyno', street ='$street', barangay ='$barangay', tm='$tm',  city ='$city', code ='$code', $mobileNumber ='$mobileNumber', idno ='$idno', reqimg ='$imageStore' where email = '$email'";
        if(mysqli_query($connection, $result)){
            echo "User Edited Successfully";
        }else{
            echo "Some Error";
        }
}else{
    echo "Unauthorized user";
}
   

?>