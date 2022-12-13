<?php
header('Content-Type: application/json');
include("config.php");

if(isset($_REQUEST['logged_in_user']) && isset($_REQUEST['otp'])  && $_REQUEST['logged_in_user']!="" && $_REQUEST['otp']!="")
{
	
	
	$logged_in_user=$_REQUEST['logged_in_user'];
	$condition=" cid='".$logged_in_user."' AND email_otp='".$_REQUEST['otp']."' AND email_otp_valid_till >= '".date('Y-m-d H:i:s')."' ";
	
	
	$ride_details=get_ConditionalDetailsFromTable($table_name="pns_customers",$is_stat_chk="0",$file_field="",$condition,$is_multiple="0");
	if($ride_details!="")
	{
		
			$update = "UPDATE pns_customers SET is_email_approved='1',email_otp='',email_otp_valid_till='0000-00-00 00:00:00' WHERE ".$condition;
			$query = mysqli_query($conn,$update) or die(mysqli_error($conn));
			if($query)
			{
				$message = "Email Verified Successfully";
				$returnCode=true;	
			}else
			{
				$message = "Error in Email Verification";
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