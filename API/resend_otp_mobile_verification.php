<?php
header('Content-Type: application/json');
include("config.php");
$data=array();
if( isset($_REQUEST['logged_in_user']) && $_REQUEST['logged_in_user']!="" )
{
	
	$logged_in_user=$_REQUEST['logged_in_user'];
	$condition=" cid='".$logged_in_user."' ";
	
	$file_field=array("chk_file_path" => "../uploads/User/","file_path" => ROOT."/uploads/User/","default_file" => ROOT."/uploads/User/user.png","file_field_col" => "photo");
	$user_details=get_ConditionalDetailsFromTable($table_name="pns_customers",$is_stat_chk="0",$file_field,$condition,$is_multiple="0");
	if($user_details!="")
	{
		
		$customer_mobile=$user_details['mobile'];
		if(isset($_REQUEST['mobile']) && $_REQUEST['mobile']!="")
		{
			$customer_mobile=$_REQUEST['mobile'];
		}
		if($user_details['otp']!="" && $user_details['otp_valid_till']>date('Y-m-d H:i:s'))
		{
			$otp_valid_till=$user_details['otp_valid_till'];
			$otp=$user_details['otp'];
			$recipients="91" .$customer_mobile;
			// $sms_message="Kindly Enter Below OTP for your Mobile verification. This is otp will be valid for next 15 minutes only.\r\n Mobile Verification OTP:".$otp;
			// SendSMS($recipients,$sms_message,"0","Mobile Verification OTP");
			$sms_message = "Dear User,\nYour OTP for login to the Management portal is ".$otp.".Please do not share this OTP. ";
			// $recipients = "91" . $mobile;
			// $sms_message="Kindly Enter Below OTP for your Registration verification. This is otp will be valid for next 15 minutes only.\r\n Mobile Verification OTP:".$otp;
			SendSMS2($recipients,$sms_message);
			
			$data['otp']=$otp;
			$message = "OTP for Mobile Verification Sent Successfully";
			$returnCode=true;	
		}else
		{
			$otp=GenerateOTP($n="4");
			$otp_valid_till=date("Y-m-d H:i:s",strtotime("+15 Minutes"));

			$update = "UPDATE pns_customers SET otp='".$otp."',otp_valid_till='".$otp_valid_till."' WHERE ".$condition;
			$query = mysqli_query($conn,$update) or die(mysqli_error($conn));
			if($query)
			{
				
				//$customer=$user_details['customer'];
				
				//$recipients=array($customer_mobile);
				$recipients=$customer_mobile;
				$sms_message="Kindly Enter Below OTP for your Mobile verification. This is otp will be valid for next 15 minutes only.\r\n Mobile Verification OTP:".$otp;
				SendSMS($recipients,$sms_message,"0","Mobile Verification OTP");
				
				$data['otp']="";
				// $data['otp']=$otp;
				$message = "OTP for Mobile Verification Sent Successfully";
				$returnCode=true;	
				
			}else
			{
				$message = "Error in Sending Authentication Code";
				$returnCode=false;		
			}
		}
		
		
	}else
	{
		$message = "No User available for these credentials";
		$returnCode=false;		
	}	
}else
{
	$message = "Please enter all required values";
	$returnCode=false;
}
SendAPIResponse($returnCode,$message,$data);
?>