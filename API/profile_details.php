<?php
header('Content-Type: application/json');
include("config.php");

$table_name="cz_users";
$order_by="cid";
$order_type="DESC";
$select_fields="";
$page="";
$limit="";
$is_multiple="0";

//user_roles

$file_field=array("chk_file_path" => "../uploads/User/","file_path" => ROOT_W."/uploads/User/","default_file" => ROOT."/uploads/User/user.png","file_field_col" => "photo");

$data=array();

if(isset($_REQUEST['logged_in_user']) && $_REQUEST['logged_in_user']!=""  )
{
	$user_language=GetSingleFieldDataFromTable("cz_users",$field="language_code"," cid='".$_REQUEST['logged_in_user']."' ",$is_stat_chk="0");
}else
{
	$user_language="";
}

if(isset($_REQUEST['logged_in_user']) && $_REQUEST['logged_in_user']!=""  )
{
	$cid= $_REQUEST['logged_in_user'];
	$condition=" cid='".$cid."' ";

	$user_details=get_ConditionalDetailsFromTable($table_name,$is_stat_chk="0",$file_field,$condition,$is_multiple,$select_fields,$page,$limit,"","","1");

	//$user_details="";
	if($user_details!="")
	{
		$alert_min_range="";
		$alert_max_range="";
		if($user_details['user_type']=="paid")
		{
			$alert_min_range_default=GetSingleFieldDataFromTable("cz_settings",$field="svalue"," sname='paid_user_alert_start_range' ",$is_stat_chk="0");
				$alert_max_range_default=GetSingleFieldDataFromTable("cz_settings",$field="svalue"," sname='paid_user_alert_end_range' ",$is_stat_chk="0");
		}else
		{
			$alert_min_range_default=0;
			$alert_max_range_default=0;
		}
		$user_alert_details=get_ConditionalDetailsFromTable("cz_user_alert","0",""," user_id='".$user_details['cid']."' ","0");
		if($user_alert_details!="")
		{
			$alert_min_range=$user_alert_details['min_range'];
			$alert_max_range=$user_alert_details['max_range'];
		}else
		{
			$alert_min_range=$alert_min_range_default;
			$alert_max_range=$alert_max_range_default;

		}
		$user_details['alert_min_range']=$alert_min_range;
		$user_details['alert_max_range']=$alert_max_range;

		if($user_details['photo']==ROOT."/uploads/User/user.png" && $user_details['social_profile_photo']!="")
		{
			$user_details['photo']	=$user_details['social_profile_photo'];
		}
		unset($user_details['social_profile_photo']);

		

		if(isset($user_details['fname']) && $user_details['fname']!="")
		{
			$user_details['username']=$user_details['fname']." ".$user_details['lname'];
		}
		
		$data=$user_details;
		if($user_language=="" || $user_language=="en" || $user_language=="EN" || $user_language=="ENG")
		{
			$message="Details available";
		}
		else
		{
			$message = "Detalles disponibles";
		}
		$returnCode=true;																									
	}else
	{
		// $data['user_details']=null;
		if($user_language=="" || $user_language=="en" || $user_language=="EN" || $user_language=="ENG")
		{
			$message="No Account Available Or Account is closed";
		}
		else
		{
			$message = "No hay cuenta disponible o la cuenta está cerrada";
		}
		$message = "No Account Available Or Account is closed";
		$returnCode=false;
	}
}else
{	
	// $data['user_details']=null;
	if($user_language=="" || $user_language=="en" || $user_language=="EN" || $user_language=="ENG")
	{
		$message="Login User must be required";
	}
	else
	{
		$message = "El usuario de inicio de sesión debe ser requerido";
	}
	$returnCode=false;		
}
SendAPIResponse($returnCode,$message,$data);
?>