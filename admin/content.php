<?php
if(!isset($_SESSION['cz_admin_login_id']))
{
	header("location:login.php");
} else {

		if(!isset($_REQUEST['pid'])){ $pid = "home"; } else { $pid = $_REQUEST['pid']; }
	
	
	
		if($pid == "navigation"){ include("navigation.php"); }
		if($pid == "user_role"){ include("user_role.php"); }
		/*if($pid == "log_report"){ include("log_report.php"); }
		if($pid == "logs"){ include("logs.php"); }*/
	
		if($pid == "home"){ include("dashboard.php"); }
		if($pid == "profile"){ include("profile.php"); }
		if($pid == "settings"){ include("settings.php"); }
		if($pid == "crime_type"){ include("crime_type.php"); }
		
		if($pid == "crime_type_category"){ include("crime_type_category.php"); }
		if($pid == "property_types"){ include("crime_type_category.php"); }			
		if($pid == "sexual_abuse_types"){ include("crime_type_category.php"); }
		if($pid == "domestic_violence_types"){ include("crime_type_category.php"); }
		if($pid == "disturbance_types"){ include("crime_type_category.php"); }
		if($pid == "fraud_types"){ include("crime_type_category.php"); }
		if($pid == "vandalism_types"){ include("crime_type_category.php"); }

		if($pid == "view_all_users"){ include("view_all_users.php"); }
		if($pid == "view_user_detail"){ include("view_user_detail.php"); }
		if($pid == "view_all_crimes"){ include("view_all_crimes.php"); }
		if($pid == "view_crime_detail"){ include("view_crime_detail.php"); }
		

		if($pid == "crime_type_fields"){ include("crime_type_fields.php"); }
		
		if($pid == "add_employee"){ include("add_employee.php"); }
		if($pid == "add_user"){ include("add_user.php"); }
		if($pid == "view_all_employee"){ include("view_all_employee.php"); }
		if($pid == "view_all_crime_requests"){ include("view_all_crime_requests.php"); }
		// if($pid == "settings"){ include("settings.php"); }
		if($pid == "countries"){ include("countries.php"); }
		
				
		
		

}
?>