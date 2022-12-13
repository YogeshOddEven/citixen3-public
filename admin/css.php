	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Citizen3 Admin</title>
	<meta name="author" content="Citizen3 Admin">
	<meta name="description" content="Citizen3 Admin">		
	<!-- Mobile Specific Metas -->
	<!-- Favicon -->
	<link href="assets/img/brand/favicon.png?v=1.1" rel="icon" type="image/png">

	<!-- Fonts -->

	<!-- Icons -->
	<link href="assets/css/icons.css" rel="stylesheet">

	<!--Bootstrap.min css-->
	<link rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap.min.css">

	<!-- Ansta CSS -->
	<link href="assets/css/dashboard.css" rel="stylesheet" type="text/css">

	<!-- Single-page CSS -->
	<link href="assets/plugins/single-page/css/main.css" rel="stylesheet" type="text/css">
	<?php 
	if($_SERVER['SERVER_NAME']!="localhost")
	{
		if($_SERVER["HTTPS"] != "on")
		{
			header("Location: https://" . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"]);
			exit();
		}
	}	
	
	?>