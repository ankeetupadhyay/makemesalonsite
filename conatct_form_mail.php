

<?php

require_once('mailer/class.phpmailer.php');
require_once('connection.php');
date_default_timezone_set('Asia/Kolkata');
include("mailer/class.smtp.php"); // optional, gets called from within class.phpmailer.php if not already loaded


$cname 			= $_POST["cname"];
$email 			= $_POST["email"];
$mobile 		= $_POST["mobile"];
$subject 		= $_POST["subject"];
$message 		= $_POST["message"];
$dated_on		= date("Y-m-d H:i:s");


	$messageToNow = "<p>Hello Heramb,</p>
					<p>You have received contact enquire from ".$cname.".</p>
					<table border='1' cellpadding='5' cellspacing='5' width='50%'>
					<tr>
						<td>Name</td>
						<td>Email</td>
						<td>Mobile</td>
						<td>Message</td>
						<td>Message</td>
					</tr>
					<tr>
						<td>".$cname."</td>
						<td>".$email."</td>
						<td>".$mobile."</td>
						<td>".$subject."</td>
						<td>".$message."</td>
					</tr>
					</table>

					<p></p>
					Kind Regards,<br>
					<b>Ask me for website Team</b><br></p>";


	$messageToUser = "<p>Hello ".$name."</p>
					<p>Thanks for your interest. We will get back to you soon.</p>

					<p></p>
					
					Kind Regards,<br><br>
					<b>Ask me for website Team</b><br></p>";


	$mail = new PHPMailer(); // create a new object
    $mail->IsSMTP(); // enable SMTP
    $mail->SMTPDebug = 1; // debugging: 1 = errors and messages, 2 = messages only
    $mail->SMTPAuth = true; // authentication enabled
    $mail->SMTPSecure = 'TLS'; // secure transfer enabled REQUIRED for Gmail
    $mail->Host = "mail.askmeforwebsite.com";
    $mail->Port = 587; // or 587
    $mail->IsHTML(true);
	$mail->Username = "mailer@activityinfantschool.com";
    $mail->Password = "mailer@123";

	$mail->Subject = "Contact Enquire";
	$mail->Body = $messageToNow;
	$mail->AddAddress("developer@askmeforwebsite.com");
	$mail->setFrom('developer@askmeforwebsite.com', 'Ask Me For Website');
	$mail->Send();

	$mail->ClearAddresses();
	$mail->Subject = "Contact Enquire";
	$mail->AddAddress($email);
	$mail->Body = $messageToUser;

	 if(!$mail->Send()) {
	    echo "Mailer Error: " . $mail->ErrorInfo;
	 } else {
	    return  1;
	 }

?>

