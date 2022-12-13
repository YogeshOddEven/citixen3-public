<?php
ob_start();
if($_SERVER['SERVER_NAME']!="localhost")
{
	
	define("ROOT","https://citizen3.yuglogix.com");
	define("API_ROOT","https://citizen3.yuglogix.com/API");
	define("ADMIN_DIR","");
	define("PDF_PATH","/");
	define("CURRENCY", "Rs. ");
}else
{
	define("ROOT","http://localhost/Citizen");
	define("API_ROOT","https://citizen3.yuglogix.com/API");
	define("ADMIN_DIR","Citizen");
	define("PDF_PATH","Citizen/");
	define("CURRENCY", "Rs. ");
}

?>
