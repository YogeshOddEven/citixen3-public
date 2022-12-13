<?php
header('Content-Type: application/json');
include("config.php");
// error_reporting(0);

//$srno = $_REQUEST['srno'];
$table_name="cz_users";
$order_by="cid";
$order_type="DESC";
$select_fields="";
$page="";
$limit="";
$is_multiple="0";

	
	if((isset($_REQUEST['logged_in_user']) && $_REQUEST['logged_in_user']!="") && (isset($_REQUEST['old_password']) && $_REQUEST['old_password']!="")&& (isset($_REQUEST['new_password']) && $_REQUEST['new_password']!=""))
	{
		
		$cid= $_REQUEST['logged_in_user'];
		$old_password=$_REQUEST['old_password'];
		$new_password=$_REQUEST['new_password'];

		$condition=" cid='".$cid."' ";

		$user_details=get_ConditionalDetailsFromTable($table_name,$is_stat_chk="0",$file_field,$condition,$is_multiple,$select_fields,$page,$limit,"","","1");
		if($user_details!="")
		{

			$current_password=$user_details['password'];
			if($current_password==$old_password)
			{
				

				mysqli_query($conn," UPDATE cz_users set password='".$new_password."',pass='".md5($new_password)."' Where cid='".$cid."' ");

				$message = "Password Reset Successfully.";
				$returnCode=true;
			}else
			{
				$message = "Incorrect Old Password";
				$returnCode=false;
			}

			
			
		}else
		{
			$message = "No Account Available for this details";
			$returnCode=false;		
		}

	}else
	{
		$message = "Invalid Account Details";
		$returnCode=false;
	}

SendAPIResponse($returnCode,$message,$data,$is_nodata="1");
?>