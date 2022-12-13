<?php
header('Content-Type: application/json');
include("config.php");

$table_name="cz_settings";
$order_by="id";
$order_type="DESC";
$select_fields="";
$page="";
$limit="";
$is_multiple="1";
$condition="";
$checking_range=10;
//user_roles
if(isset($_REQUEST['page']))
{
	if($_REQUEST['page']=="all")
	{
		$page="0";
	}else
	{
		$page=$_REQUEST['page'];
	}
}else
{
	$page="1";
}
if(isset($_REQUEST['limit']))
{
	if($_REQUEST['limit']=="all")
	{
		$limit="0";
	}else
	{
		$limit=$_REQUEST['limit'];
	}
}else
{
	$limit="0";
}

if(isset($_REQUEST['logged_in_user']) && $_REQUEST['logged_in_user']!=""  )
{
	$user_language=GetSingleFieldDataFromTable("cz_users",$field="language_code"," cid='".$_REQUEST['logged_in_user']."' ",$is_stat_chk="0");
}else
{
	$user_language="";
}

$total_records=get_TotalAvailFromTable($table_name,$is_stat_chk="0",$condition);
if($limit>0)
{
	$total_pages = ceil($total_records / $limit);	
}else
{
	$total_pages="1";
}
// $total_records=0;
$file_field=array("chk_file_path" => "../uploads/User/","file_path" => ROOT."/uploads/User/","default_file" => ROOT."/uploads/User/user.png","file_field_col" => "photo");

$data=array();
$new_radius_settings_list=array();
if(isset($_REQUEST['logged_in_user']) && $_REQUEST['logged_in_user']!=""   )
{
	
	// $condition=" added_by='".$_REQUEST['logged_in_user']."' ";
	//$condition="";
	$radius_settings_list=get_ConditionalDetailsFromTable($table_name,$is_stat_chk="0","",$condition,$is_multiple,$select_fields,$page,$limit,"","","1");

	
	//$radius_settings_list="";
	if($radius_settings_list!="")
	{
		$new_data=array();
		for ($rsli=0; $rsli < count($radius_settings_list); $rsli++) 
		{ 
			$sname=$radius_settings_list[$rsli]['sname'];
			$svalue=$radius_settings_list[$rsli]['svalue'];

			$new_data[$sname]=$svalue;
		}	
		
		$data=$new_data;
		// $data['total_records']=$total_records;
		// $data['total_pages']=$total_pages;
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
		// $data['total_records']=$total_records;
		// $data['total_pages']=$total_pages;
		$data=[];
		if($user_language=="" || $user_language=="en" || $user_language=="EN" || $user_language=="ENG")
		{
			$message="No Detail available";
		}
		else
		{
			$message = "Ningún detalle disponible";
		}
		$returnCode=false;
	}
}else
{	
	$data=[];
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