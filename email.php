<?php
require("PHPMailer/class.PHPMailer.php");

$mail = new PHPMailer();

$mail->IsSMTP();                                      // set mailer to use SMTP
$mail->Host = "http://orif.rf.gd/index.php";  // specify main and backup server
$mail->SMTPAuth = true;     // turn on SMTP authentication
$mail->Username = "hritik.aggarwal31@gmail.com";  // SMTP username
$mail->Password = "Hritik.31"; // SMTP password

$mail->From = "hritik.aggarwal31@gmail.com";
$mail->FromName = "Orif website";
$mail->AddAddress("hritik.aggarwal31@gmail.com", "Josh Adams");
$mail->AddAddress("hritikagg29@gmail.com");                  // name is optional
$mail->AddReplyTo("hritik.aggarwal31@gmail.com", "Information");

$mail->WordWrap = 50;                                 // set word wrap to 50 characters
    // optional name
$mail->IsHTML(true);                                  // set email format to HTML

$mail->Subject = "Here is the subject";
$mail->Body    = "This is the HTML message body in bold!";
$mail->AltBody = "This is the body in plain text for non-HTML mail clients";

if(!$mail->Send())
{
   echo "Message could not be sent. 
";
   echo "Mailer Error: " . $mail->ErrorInfo;
   exit;
}

echo "Message has been sent";
?>