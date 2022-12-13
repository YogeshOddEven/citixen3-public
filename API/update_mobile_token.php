<?php
header('Content-Type: application/json');
include("config.php");

if(isset($_REQUEST['mobile_token']) && isset($_REQUEST['logged_in_user']) && $_REQUEST['mobile_token']!="" && $_REQUEST['logged_in_user']!="" )
{
	
	$mobile_token=$_REQUEST['mobile_token'];
	$logged_in_user=$_REQUEST['logged_in_user'];
	
	$notification_details=get_ConditionalDetailsFromTable($table_name="cz_users",$is_stat_chk="0",$file_field="",$condition=" cid='".$logged_in_user."' ",$is_multiple="0");
	if($notification_details!="")
	{
		$update = "UPDATE cz_users SET reg_token_ids='".$mobile_token."' WHERE  cid='".$logged_in_user."' ";
		$query = mysqli_query($conn,$update) or die(mysqli_error($conn));
		if($query)
		{
			$message = "Token Updated Successfully";
			$returnCode=true;	

		}else
		{
			$message = "Error in Updating Token";
			$returnCode=false;		
		}
	}else
	{
		$message = "No account available for these credentials";
		$returnCode=false;		
	}	
}else
{
	$message = "Please enter all required values";
	$returnCode=false;
}
SendAPIResponse($returnCode,$message,$data="",$is_nodata="1");
?>