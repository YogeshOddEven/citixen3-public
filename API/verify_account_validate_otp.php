<?php
header('Content-Type: application/json');
include("config.php");
$data=array();
//$srno = $_REQUEST['srno'];
$data['user_details']=array();
if(isset($_REQUEST['logged_in_user']) && isset($_REQUEST['otp']) && isset($_REQUEST['type'])  && $_REQUEST['logged_in_user']!="" && $_REQUEST['otp']!="" && $_REQUEST['type']!="")
{
	
	
	$logged_in_user=$_REQUEST['logged_in_user'];
	$condition=" cid='".$logged_in_user."' AND otp='".$_REQUEST['otp']."' AND otp_valid_till >= '".date('Y-m-d H:i:s')."' ";
	
	
	$ride_details=get_ConditionalDetailsFromTable($table_name="pns_customers",$is_stat_chk="0",$file_field="",$condition,$is_multiple="0");
	if($ride_details!="")
	{
		if($_REQUEST['type']!="login")
		{
			$update = "UPDATE pns_customers SET status='1',otp='' WHERE ".$condition;
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
			$update = "UPDATE pns_customers SET otp='' WHERE ".$condition;
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
		}
		$condition=" cid='".$logged_in_user."' ";
		$table_name="pns_customers";
		$order_by="cid";
		$order_type="DESC";
		$select_fields="";
		$file_field=array("chk_file_path" => "../uploads/User/","file_path" => ROOT."/uploads/User/","default_file" => ROOT."/uploads/User/user.png","file_field_col" => "photo");
		$user_details=get_ConditionalDetailsFromTable($table_name,$is_stat_chk="0",$file_field,$condition,$is_multiple,$select_fields,$page,$limit,"","","1");
		if($user_details!="")
		{
			if(isset($user_details['designation']) && $user_details['designation']!="" && isset($user_roles[($user_details['designation'])]))
			{
				$user_details['designation']=$user_roles[($user_details['designation'])];
			}
			if(isset($user_details['fname']) && $user_details['fname']!="")
			{
				$user_details['username']=$user_details['fname']." ".$user_details['lname'];
			}
			if(isset($user_details['cid']))
			{
				$ratings=GetUserRatings($user_details['cid']);
				$user_details['ratings']=$ratings;
			}
			$KYC_Check_Path="../uploads/KYC/";
			$KYC_Return_Path=ROOT."/uploads/KYC/";
			if(isset($user_details['kyc_proof']) && $user_details['kyc_proof']!="" && file_exists($KYC_Check_Path.$user_details['kyc_proof']) )
			{
				$user_details['kyc_proof']=$KYC_Return_Path.$user_details['kyc_proof'];
			}else
			{
				$user_details['kyc_proof']=ROOT."/uploads/noimage.png";
			}

			if(isset($user_details['address_kyc_proof']) && $user_details['address_kyc_proof']!="" && file_exists($KYC_Check_Path.$user_details['address_kyc_proof']) )
			{
				$user_details['address_kyc_proof']=$KYC_Return_Path.$user_details['address_kyc_proof'];
			}else
			{
				$user_details['address_kyc_proof']=ROOT."/uploads/noimage.png";
			}

			if(isset($user_details['is_adddress_kyc_approved']) && $user_details['is_adddress_kyc_approved']=="1")
			{
				$user_details['is_adddress_kyc_approved']="Yes";
			}else
			{
				$user_details['is_adddress_kyc_approved']="No";
			}
			if(isset($user_details['is_kyc_approved']) && $user_details['is_kyc_approved']=="1")
			{
				$user_details['is_kyc_approved']="Yes";
			}else
			{
				$user_details['is_kyc_approved']="No";
			}
			if(isset($user_details['is_email_approved']) && $user_details['is_email_approved']=="1")
			{
				$user_details['is_email_approved']="Yes";
			}else
			{
				$user_details['is_email_approved']="No";
			}
			if(isset($user_details['is_mobile_approved']) && $user_details['is_mobile_approved']=="1")
			{
				$user_details['is_mobile_approved']="Yes";
			}else
			{
				$user_details['is_mobile_approved']="No";
			}
			if(isset($user_details['is_photo_approved']) && $user_details['is_photo_approved']=="1")
			{
				$user_details['is_photo_approved']="Yes";
			}else
			{
				$user_details['is_photo_approved']="No";
			}
			$data['user_details']=$user_details;
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
SendAPIResponse($returnCode,$message,$data);
?>