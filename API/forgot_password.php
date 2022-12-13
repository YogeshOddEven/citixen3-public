<?php
header('Content-Type: application/json');
include("config.php");
// error_reporting(0);

//$srno = $_REQUEST['srno'];


	
	if((isset($_REQUEST['email']) && $_REQUEST['email']!=""))
	{
		$req_email="";$req_mobile="";
		$is_mail_send="1";$is_sms_send="1";
		if(isset($_REQUEST['email'])){  $req_email=$_REQUEST['email'];  }
		// if(isset($_REQUEST['mobile'])){  $req_mobile=$_REQUEST['mobile'];  }

		// if(isset($_REQUEST['type']))
		// {
		// 	if($_REQUEST['type']=="mobile")
		// 	{
		// 		$is_sms_send="1";
		// 		$is_mail_send="0";
		// 	}
		// 	if($_REQUEST['type']=="email")
		// 	{
		// 		$is_mail_send="1";
		// 		$is_sms_send="0";
		// 	}
		// }

		$customer_id=GetSingleFieldDataFromTable($table_name="cz_users",$field="cid",$condition=" (emailid='".$req_email."' ) ",$is_stat_chk="0");
		if($customer_id!="0")
		{

			//send mail to user	
			//if($req_mobile==""){ $req_mobile= GetSingleFieldDataFromTable($table_name="cz_users",$field="mobile",$condition=" cid='".$customer_id."' ",$is_stat_chk="0");	}
			// if($req_mobile==""){ $req_mobile= GetSingleFieldDataFromTable($table_name="cz_users",$field="mobile",$condition=" cid='".$customer_id."' ",$is_stat_chk="0");	}
			// if($req_email==""){ $req_email= GetSingleFieldDataFromTable($table_name="cz_users",$field="emailid",$condition=" cid='".$customer_id."' ",$is_stat_chk="0");	}

			$cnf_token=base64_encode("".ENCODE_KEY.$customer_id.ENCODE_KEY.uniqid());	
			$forgot_link=ROOT."/reset_password_validate.php?token=".$cnf_token."";

			mysqli_query($conn," UPDATE cz_users set reset_token='".$cnf_token."' Where cid='".$customer_id."' ");

			forgotPasswordMail($req_email, $cnf_token);
			
			

			$message = "Kindly check mail for reset password";
			$returnCode=true;
			/*
			if($is_mail_send=="1")
			{
				$mail->Body = $mailmsg; //HTML Body	
				if($mail->Send())
				{
					$message = "Check Mail & notification";
					$returnCode=true;			
				}
				else
				{
					$message = "Error in Send Mail";
					$returnCode=False;
				}
			}*/
			
			
			// if($mail->Send())
			// {
			// 	$message = "Kindly Check your email account and reset password from given link";
			// 	$returnCode=true;	
			// }else{
			// 	$message = "Error in Send Mail, Please try again later";
			// 	$returnCode=False;
			// }	
			//echo $mailmsg;	
		}else
		{
			$message = "Invalid Account Details";
			$returnCode=false;		
		}

	}else
	{
		$message = "Invalid Account Details";
		$returnCode=false;
	}

SendAPIResponse($returnCode,$message,$data=$_REQUEST,$is_nodata="0");
?>