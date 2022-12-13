<?php
ob_start();
session_start();
require_once("config.php");
include("../admin/functions.php");
include "api_action_list_data.php";

$redirect_url="../index.php?pid=home";
$API_Call_Method="POST";$ret_msg="Invalid Request";$ret_msg_type="error";
if(isset($_REQUEST['action']))
{
	$call_to_action=$_REQUEST['action'];
	$redirect_url_success=$_REQUEST['redirect_url_success'];
	$redirect_url_error=$_REQUEST['redirect_url_error'];
	
	if(isset($action_API_list[($call_to_action)]))
	{
		if($call_to_action=="login")
		{
			$cur_API_URL=$action_API_list[($call_to_action)];
			$APIReturnDataJSON=CallAPI($API_Call_Method, $cur_API_URL, $_REQUEST);
			$APIReturnDataArr=json_decode($APIReturnDataJSON, true);
			// print_r($cur_API_URL);
			if(isset($APIReturnDataArr['returnCode']) && $APIReturnDataArr['returnCode']=="1")
			{
				$redirect_url=$redirect_url_success;
				$ret_msg_type="success";
				$user_data=$APIReturnDataArr['data'];
				
				$_SESSION['cz_user_uname'] = $user_data['fname']." ".$user_data['lname'];
				$_SESSION['cz_user_mobile'] = $user_data['mobile'];
				$_SESSION['cz_user_emailid'] = ($user_data['emailid']);
				$_SESSION['cz_user_login_id'] = $user_data['cid'];
				$_SESSION['cz_utype'] = $user_data['user_type'];
				$_SESSION['cz_default_lat_lng']=$user_data['default_lat_lng'];					
				
				// print_r($user_data);
			}else
			{
				$redirect_url=$redirect_url_error;
				$ret_msg_type="error";
			}
			$ret_msg=$APIReturnDataArr['message'];
			
			// print_r($APIReturnDataArr);
		}
		elseif($call_to_action=="forgot_password")
		{
			$cur_API_URL=$action_API_list[($call_to_action)];
			$APIReturnDataJSON=CallAPI($API_Call_Method, $cur_API_URL, $_REQUEST);
			$APIReturnDataArr=json_decode($APIReturnDataJSON, true);
			if(isset($APIReturnDataArr['returnCode']) && $APIReturnDataArr['returnCode']=="1")
			{
				$redirect_url=$redirect_url_success;
				$ret_msg_type="success";
				// $user_data=$APIReturnDataArr['data']['user_details'];
				// $_SESSION['cz_forgot_user_id'] = $APIReturnDataArr['data']['user_id'];
				
				// print_r($user_data);
			}else
			{
				$redirect_url=$redirect_url_error;
				$ret_msg_type="error";
			}
			$ret_msg=$APIReturnDataArr['message'];
			
			// print_r($APIReturnDataArr);
		}
		elseif($call_to_action=="register")
		{
			$cur_API_URL=$action_API_list[($call_to_action)];
			$APIReturnDataJSON=CallAPI($API_Call_Method, $cur_API_URL, $_REQUEST);
			$APIReturnDataArr=json_decode($APIReturnDataJSON, true);
			if(isset($APIReturnDataArr['returnCode']) && $APIReturnDataArr['returnCode']=="1")
			{
				$redirect_url=$redirect_url_success;
				$ret_msg_type="success";
				// $user_data=$APIReturnDataArr['data']['user_details'];
				$_SESSION['cz_register_user_id'] = $APIReturnDataArr['data']['user_id'];
				$ret_msg="Please check email for verification and activate your account";

				// print_r($user_data);
			}else
			{
				$redirect_url=$redirect_url_error;
				$ret_msg_type="error";
				$ret_msg=$APIReturnDataArr['message'];

			}
			
			
			// print_r($APIReturnDataArr);
		}
		elseif($call_to_action=="add_crime")
		{
			$cur_API_URL=$action_API_list[($call_to_action)];
			$_REQUEST['crime_media']="[]";
			if(isset($_REQUEST['crime_type_fields']) && count($_REQUEST['crime_type_fields']))
			{
				$crime_type_fields_details=json_encode($_REQUEST['crime_type_fields']);
				// print_r($crime_type_fields_details);
				$_REQUEST['crime_type_field_details']=$crime_type_fields_details;
				unset($_REQUEST['crime_type_fields']);
			}
			if(isset($_REQUEST['crime_type_fields']) && $_REQUEST['crime_time']!="" && $_REQUEST['crime_time']!="00:00:00")
			{
				$_REQUEST['crime_date'].=" ".$_REQUEST['crime_time'];
			}
			$APIReturnDataJSON=CallAPI($API_Call_Method, $cur_API_URL, $_REQUEST);
			$APIReturnDataArr=json_decode($APIReturnDataJSON, true);
			if(isset($APIReturnDataArr['returnCode']) && $APIReturnDataArr['returnCode']=="1")
			{
				$redirect_url=$redirect_url_success;
				$ret_msg_type="success";
				// $user_data=$APIReturnDataArr['data']['user_details'];
				// $_SESSION['cz_register_user_id'] = $APIReturnDataArr['data']['user_id'];
				
				// print_r($user_data);
			}else
			{
				$redirect_url=$redirect_url_error;
				$ret_msg_type="error";
			}
			$ret_msg=$APIReturnDataArr['message'];
			
			// print_r($_REQUEST);
		}
		
		
		else
		{
			
			// print_r($_REQUEST);
			
			$cur_API_URL=$action_API_list[($call_to_action)];
			$APIReturnDataJSON=CallAPI($API_Call_Method, $cur_API_URL, $_REQUEST);
			$APIReturnDataArr=(array) json_decode($APIReturnDataJSON);
			if(isset($APIReturnDataArr['returnCode']) && $APIReturnDataArr['returnCode']=="1")
			{
				$redirect_url=$redirect_url_success;
				$ret_msg_type="success";
			}else
			{
				$redirect_url=$redirect_url_error;
				$ret_msg_type="error";
			}
			$ret_msg=$APIReturnDataArr['message'];
		}
		
		
	}
	
} 
$_SESSION['cz_custom_error']['msg_type']=$ret_msg_type;
$_SESSION['cz_custom_error']['err_msg']=$ret_msg;
// print_r($_SESSION);
header("Location:".$redirect_url);
?>