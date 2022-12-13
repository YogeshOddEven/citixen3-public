<?php
header('Content-Type: application/json');
include("config.php");

if(isset($_REQUEST['logged_in_user']) && isset($_REQUEST['otp'])  && $_REQUEST['logged_in_user']!="" && $_REQUEST['otp']!="")
{
	
	
	$logged_in_user=$_REQUEST['logged_in_user'];
	$condition=" cid='".$logged_in_user."' AND otp='".$_REQUEST['otp']."' AND otp_valid_till >= '".date('Y-m-d H:i:s')."' ";
	
	
	$ride_details=get_ConditionalDetailsFromTable($table_name="pns_customers",$is_stat_chk="0",$file_field="",$condition,$is_multiple="0");
	if($ride_details!="")
	{
		
			$update = "UPDATE pns_customers SET status='1',otp='',otp_valid_till='0000-00-00 00:00:00' WHERE ".$condition;
			$query = mysqli_query($conn,$update) or die(mysqli_error($conn));
			if($query)
			{
				$message = "Mobile Verified Successfully";
				$returnCode=true;	
			}else
			{
				$message = "Error in Mobile Verification";
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