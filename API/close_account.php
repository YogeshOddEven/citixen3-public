<?php
header('Content-Type: application/json');
include("config.php");


//$srno = $_REQUEST['srno'];

if(isset($_REQUEST['logged_in_user']) && $_REQUEST['logged_in_user']!=""  )
{
	$user_language=GetSingleFieldDataFromTable("cz_users",$field="language_code"," cid='".$_REQUEST['logged_in_user']."' ",$is_stat_chk="0");
}else
{
	$user_language="";
}

	
	if(isset($_REQUEST['logged_in_user']) && $_REQUEST['logged_in_user']!="" && isset($_REQUEST['account_close_reason']) && $_REQUEST['account_close_reason']!="" && isset($_REQUEST['account_close_remarks']) && $_REQUEST['account_close_remarks']!=""  )
	{
		//$photo_name=array();
		$cid= $_REQUEST['logged_in_user'];
		$account_close_reason=mysqli_real_escape_string($conn, $_REQUEST['account_close_reason']);
		$account_close_remarks=mysqli_real_escape_string($conn, $_REQUEST['account_close_remarks']);
		
		
		$condition="";
		$condition=" cid='".$cid."' ";
		
		$executive_details=get_ConditionalDetailsFromTable("pns_customers",$is_stat_chk="0",$file_field="",$condition,"0","cid,fname,lname,uname as username,mobile,emailid,photo");
		if($executive_details=="" || !isset($executive_details['cid']))
		{
			$message = "No Account Available";
			$returnCode=false;	
		}else
		{	
			//kyc_proof,is_kyc_approved
			$add_user_registration=mysqli_query($conn,"UPDATE pns_customers SET account_close_reason='$account_close_reason',account_close_remarks='$account_close_remarks',status='-1' WHERE ".$condition) or die(mysqli_error($conn));
			if($add_user_registration)
			{
				
				$message = "Account Closed Successfully";
				$returnCode=true;		
			}else
			{
				$message = "Error in Updation, PLease try again later.";
				$returnCode=true;
			}
		}
		/*$message = "Photos Uploaded Successfully";
			$returnCode=true;*/
		
		
		//$message=$message.json_encode($_FILES);
	}else
	{
		$message = "PLease enter all required values";
		$returnCode=false;
	}

SendAPIResponse($returnCode,$message,$data="",$is_nodata="1");
?>