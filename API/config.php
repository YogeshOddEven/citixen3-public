<?php 

	include("../admin/process/config.php"); // Database Configuration file
	include("../admin/functions.php");// Reusable Functions file	
	include ("../helper/functions.php");
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\SMTP;
	use PHPMailer\PHPMailer\Exception;
	require '../vendor/autoload.php';

	$mail = new PHPMailer(true);
	//Server settings
	//$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
	$mail->isSMTP();                                            // Send using SMTP
	$mail->Host       = 'smtp.gmail.com';                       // Set the SMTP server to send through
	$mail->SMTPAuth   = true;                                   // Enable SMTP authentication
	$mail->Username   = 'varshaphp';                            // SMTP username
	$mail->Password   = 'varshaphp123';                         // SMTP password
	$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
	$mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
	$mail->setFrom('admin@citizen3.com', 'Citizen3');    // From

?>