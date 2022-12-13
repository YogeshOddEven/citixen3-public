<?php
if($_SERVER['SERVER_NAME']!="localhost")
{
	$servername = "localhost";
	$username = "yuglogix_citizen3";
	$password = "W9;yG9z?eSc.";
	$dbname = "yuglogix_citizen3";

	$project_url = "https://Citizen3.yuglogix.com/api/";
	$front_url = "https://Citizen3.yuglogix.com/admin/";
	$web_url = "https://Citizen3.yuglogix.com/";
}else
{
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "citizen3_db";

	$project_url = "http://localhost/Citizen/api/";
	$front_url = "http://localhost/Citizen/admin/";
	$web_url = "http://localhost/Citizen/";
}


$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$conn -> set_charset("utf8");
?>