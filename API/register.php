<?php
header('Content-Type: application/json');
include("config.php");

$data=array();
//$srno = $_REQUEST['srno'];
// $data['user_details']=array();
// $data['otp']="";

	
	if(isset($_REQUEST['fname'])  && isset($_REQUEST['password']) && isset($_REQUEST['email']) && $_REQUEST['email']!="" )
	{
		//$photo_name=array();
		$fname=mysqli_real_escape_string($conn, $_REQUEST['fname']);
		$lname="";
		if(isset($_REQUEST['lname']))
		{
			$lname=mysqli_real_escape_string($conn, $_REQUEST['lname']);	
		}
		$pname="";
		if(isset($_REQUEST['pname']))
		{
			$pname=mysqli_real_escape_string($conn, $_REQUEST['pname']);	
		}
		
		$mobile=mysqli_real_escape_string($conn, $_REQUEST['mobile']);
		$password=mysqli_real_escape_string($conn, $_REQUEST['password']);
		
		$language_code=mysqli_real_escape_string($conn, $_REQUEST['language_code']);

		// $gender=mysqli_real_escape_string($conn, $_REQUEST['gender']);
		$pass=md5($password);
		$email="";$date_added=date('Y-m-d');
		$is_kyc_approved="0";
		$is_photo_approved="0";
		if(isset($_REQUEST['email']))
		{
			$email=$_REQUEST['email'];
		}
		$address="";$state="";$city="";$reference_code="";
		if(isset($_REQUEST['address']))
		{
			$address=mysqli_real_escape_string($conn, $_REQUEST['address']);
		}
		if(isset($_REQUEST['state']))
		{
			$state=mysqli_real_escape_string($conn, $_REQUEST['state']);
		}
		if(isset($_REQUEST['city']))
		{
			$city=mysqli_real_escape_string($conn, $_REQUEST['city']);
		}
		if(isset($_REQUEST['reference_code']))
		{
			$reference_code=mysqli_real_escape_string($conn, $_REQUEST['reference_code']);
		}
		$profile_photo_name="";
		$kyc_document_name="";
		if(isset($_FILES['profile_photo']['name']) && count($_FILES['profile_photo']['name'])>0 )
		{
			//$photo_name=GenrateUploadFileName("profile_photo",$pre_tag="",$is_pretag_use="0",$i,$is_encoded="0");
			$profile_photo_name="User_".rand(999,9999)."_".$_FILES['profile_photo']['name'];	
			$is_photo_approved="1";
		}
		$email_verifiy_token = bin2hex(random_bytes(10));
		$condition="";
		// if($email!="")
		// {
			$condition=" emailid='".$email."'";
		// }else
		// {
		// 	$condition=" mobile='".$mobile."' ";
		// }
		$status="0";	
		$file_field=array("chk_file_path" => "../uploads/User/","file_path" => ROOT."/uploads/User/","default_file" => ROOT."/uploads/User/user.png","file_field_col" => "photo");
		$executive_details=get_ConditionalDetailsFromTable("cz_users",$is_stat_chk="0",$file_field,$condition."  AND status!='0' ","0","cid,fname,lname,uname as username,mobile,emailid,photo");
		if($executive_details!="" && isset($executive_details['cid']))
		{
			if($executive_details['status']=="0")
			{
				$register_user_id=$executive_details['cid'];

				$add_user_registration=mysqli_query($conn,"UPDATE cz_users SET fname='$fname',lname='$lname',pname='$pname',pass='$pass',password='$password',mobile='$mobile',emailid='$email',language_code='$language_code' WHERE cid='$register_user_id' ") or die(mysqli_error($conn));
				if($add_user_registration)
				{
					
					$user_id=$register_user_id;
					// $user_id=mysqli_insert_id($conn);
					$condition=" cid='".$user_id."' ";
					$table_name="cz_users";
					$order_by="cid";
					$order_type="DESC";
					$select_fields="";

					$user_details=get_ConditionalDetailsFromTable($table_name,$is_stat_chk="0",$file_field,$condition,$is_multiple="0",$select_fields,$page="1",$limit="0","","","1");
					if($user_details!="")
					{
						
						if(isset($user_details['fname']) && $user_details['fname']!="")
						{
							$user_details['username']=$user_details['fname']." ".$user_details['lname'];
						}
						
					}
					
					registerMail($register_user_id);
					// $sms_message = "Dear User,\nYour OTP for login to the Management portal is ".$otp.".Please do not share this OTP. ";
					// $recipients = "91" . $mobile;
					// $sms_message="Kindly Enter Below OTP for your Registration verification. This is otp will be valid for next 15 minutes only.\r\n Mobile Verification OTP:".$otp;
					// SendSMS2($recipients,$sms_message);
					// SendSMS($recipients,$sms_message,"0","Account Verification OTP");
					

					
					
					// $data['otp']=$otp;
					// $data['otp']="";
					$data['user_details']=$user_details;
					$message = "Registration mail sent Successfully";
					$returnCode=true;		
				}else
				{
					$message = "Error in Registration, PLease try again later.";
					$returnCode=true;
				}
			}else
			{
				$message = "Account Already Registered with this email. ";
				$returnCode=false;
			}
				
		}else
		{	
			// $otp=GenerateOTP($n="4");
			// $otp_valid_till=date("Y-m-d H:i:s",strtotime("+15 Minutes"));
			$referral=substr($fname, 0,2).substr($gender, 0,1).date('d');
			$referral=strtoupper($referral);

			$add_user_registration=mysqli_query($conn,"INSERT INTO cz_users (fname,lname,pname,pass,password,mobile,emailid,photo,state,city,reference_code,otp,otp_valid_till,referral,date_added,email_verifiy_token,status,language_code) VALUES('$fname','$lname','$pname','$pass','$password','$mobile','$email','$profile_photo_name','$state','$city','$reference_code','$otp','$otp_valid_till','$referral','$date_added','$email_verifiy_token','$status','$language_code')") or die(mysqli_error($conn));
			if($add_user_registration)
			{
				$refer_by=mysqli_insert_id($conn);
				$register_user_id=$refer_by;
				mysqli_query($conn," DELETE from cz_users WHERE $condition AND cid!='$register_user_id' ");
				$recipients=$mobile;
				if($reference_code!="")
				{
					// ProcessReferralBonus($refer_by,$reference_code,$utype="0");	
				}
				$recipients=$mobile;
				$user_id=$refer_by;
				// $user_id=mysqli_insert_id($conn);
				$condition=" cid='".$user_id."' ";
				$table_name="cz_users";
				$order_by="cid";
				$order_type="DESC";
				$select_fields="";

				$user_details=get_ConditionalDetailsFromTable($table_name,$is_stat_chk="0",$file_field,$condition,$is_multiple="0",$select_fields,$page="1",$limit="0","","","1");
				if($user_details!="")
				{
					
					if(isset($user_details['fname']) && $user_details['fname']!="")
					{
						$user_details['username']=$user_details['fname']." ".$user_details['lname'];
					}
					
				}
				
				registerMail($register_user_id);
				// $sms_message = "Dear User,\nYour OTP for login to the Management portal is ".$otp.".Please do not share this OTP. ";
    			// $recipients = "91" . $mobile;
				// $sms_message="Kindly Enter Below OTP for your Registration verification. This is otp will be valid for next 15 minutes only.\r\n Mobile Verification OTP:".$otp;
				// SendSMS2($recipients,$sms_message);
				// SendSMS($recipients,$sms_message,"0","Account Verification OTP");
				

				if($profile_photo_name!="")
				{
					UploadFile("profile_photo",$folder_name="../uploads/User/",$profile_photo_name);			
				}
				
				// $data['otp']=$otp;
				// $data['otp']="";
				$data['user_details']=$user_details;
				$message = "Registration done Successfully";
				$returnCode=true;		
			}else
			{
				$data['user_details']="";
				$message = "Error in Registration, PLease try again later.";
				$returnCode=true;
			}
		}
		/*$message = "Photos Uploaded Successfully";
			$returnCode=true;*/
		
		
		//$message=$message.json_encode($_FILES);
	}else
	{
		$data['user_details']="";
		$message = "PLease enter all required details";
		$returnCode=false;
	}

SendAPIResponse($returnCode,$message,$data);
?>