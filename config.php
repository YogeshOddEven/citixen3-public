<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require 'vendor/autoload.php';

session_start();
// error_reporting(0);
include "db_config.php";

$default_country = 1;
$default_date_format = "Y-m-d";
$default_time_format = "H:i:s";
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
$mail->setFrom('admin@guardiancapital.com', 'Citizen3');    // From

function test_input($data) {
    global $conn;
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
    $data = $conn->real_escape_string($data);
	return $data;
}

define("ENCODE_KEY","@#$");

?>
