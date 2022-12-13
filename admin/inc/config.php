<?php 
//error_reporting(E_ALL); # Check All PHP Errors
if(!isset($_COOKIE["caLang"])){$caLang = "en";} else {$caLang = $_COOKIE["caLang"];}
if(!isset($_SESSION['admin_login_id'])){ $userLog = "000"; } else { $userLog =  $_SESSION['admin_login_id']; } # If you have membership system change/remove this line with your own user auth control function.
if(isset($_SESSION['admin_login_id'])) { $id = $_SESSION['admin_login_id']; } else { $id = "000"; }
# ** System Settings
	define('demo_mode',false);
	
	# If you using a membership system, you can change this area. This variable return boolean 0/1 or true/false
	# If admin or user not logged in, they're only seen active events. Also they're cannot add or edit existed entries.
	# This demo version, change "$userLog" variable to your own logged user control system like;
	# if(!user_logged()){define('admin_logged',false);}else{define('admin_logged',true);}
	# Or example for wordpress: if (!is_user_logged_in()){define('admin_logged',false);}else{define('admin_logged',true);}
	# Demo Caledonian Membership System Catching userLog variable from cookie, if its not defined, Caledonian will work for visitor mode.
	define('admin_logged',$userLog);
	# If you using a membership system, you can change this area. This ID changes with your membership system.
	# If you know logged user ID holder (cookie or session) change "1" to user ID holder element like $_COOKIE['UID'];
	define('admin_ID',$id);  

# ** Database Settings
	define('db_host','localhost');
	define('db_name','plance_crm');
	define('db_login','root');
	define('db_pass','');	
	define('db_set_name','utf8');
	define('db_set_charset','utf8');
	define('db_set_collation','utf8_general_ci');
	define('db_table_pref','caledonian_'); # DB Table Prefix

# ** Load Language File
include_once('inc/lang/'. $caLang .'.php');

# ** Functions
include_once('inc/functions.php');

$myconn = mysqli_connect(db_host, db_login, db_pass);
$db = mysqli_select_db($myconn,db_name);
 
mysqli_query($myconn,"SET NAMES '". db_set_name ."'");
mysqli_query($myconn,"SET CHARACTER SET '". db_set_charset ."'");
mysqli_query($myconn,"SET COLLATION_CONNECTION = '". db_set_collation ."'"); 
?>