<?php
use PHPMailer\PHPMailer\PHPMailer;

require_once 'PHPMailer/src/Exception.php';
require_once 'PHPMailer/src/PHPMailer.php';
require_once 'PHPMailer/src/SMTP.php';

$mail = new PHPMailer(true);
$alert = '';

if(isset($_POST['submit'])){
$email = $_POST['email'];
$subject= $_POST['subject'];
$message= $_POST['message'];

try{
	$mail->isSMTP();
	$mail->Host = 'smtp.gmail.com';
	$mail->SMTPAuth = 'true';
	$mail->Username="gemmalyncuilan@gmail.com";
	$mail->Password = 'zpsjaczzryaxorpo';
	$mail->SMTPSecure = 'tls';
$mail->Port = '587';

$mail->setFrom('gemmalyncuilan@gmail.com');
$mail->addAddress($email);

$mail->isHTML(true);
$mail->Subject = $subject;
$mail-> Body = $message; 
$mail->send();
$alert= "<div class='alert-success'><span>Message</span></div>";
}catch(Exception $e){

}
}

?>