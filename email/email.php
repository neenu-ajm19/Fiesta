<?php
require 'PHPMailerAutoload.php';
$db=mysqli_connect("localhost","root","","eventdb");
if(isset($_POST['vendor']))
{
    $sql="select * from vendor_details where vendor_id='$_POST[email]'";
    $re=mysqli_query($db,$sql);
    if($arr=mysqli_fetch_array($re))
        echo "the nwe password will be send shortly";
    else 
    {
        echo "<script>alert('the entered username does not exist');</script>";
        header("location:../forgot_vendor.html");
        
    }
    if($_POST['U']==1)

    	$sql="update vendor_details set vendor_password=PASSWORD('$_POST[email]') where vendor_id='$_POST[email]'";
    else
	$sql="update user_details set user_password=PASSWORD('$_POST[email]') where vendor_id='$_POST[email]'";
    mysqli_query($db,$sql);
    
}
else if(isset($_POST['user']))
{
    $sql="select * from vendor_details where vendor_id='$_POST[email]'";
    
}

$mail = new PHPMailer;

$mail->isSMTP();                            // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';             // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                     // Enable SMTP authentication
$mail->Username = 'sendphp9@gmail.com';          // SMTP username
$mail->Password = '123456789qwertyuiop'; // SMTP password
$mail->SMTPSecure = 'tls';                  // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;                          // TCP port to connect to

$mail->setFrom('info@codexworld.com', 'FIESTA');
//$mail->addReplyTo('rohanthomas@cs.ajce.in', 'FIESTA');
$mail->addAddress('rohanthomas@cs.ajce.in');   // Add a recipient
//$mail->addCC('cc@example.com');
//$mail->addBCC('bcc@example.com');

$mail->isHTML(true);  // Set email format to HTML

$bodyContent = '<h1>password has been successfully changed</h1>';
$bodyContent .= "<p>your new password is <b>$_POST[email]</b></p>";

$mail->Subject = 'Email fiesta';
$mail->Body    = $bodyContent;

if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo "<script>alert('Message has been sent');</script>";
    header("location:../index.php");
}
?>