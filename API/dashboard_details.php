<?php
header('Content-Type: application/json');
include("config.php");

$table_name="cz_crime_details";
$order_by="id";
$order_type="DESC";
$select_fields="id,report_type,is_anonyms_reporting,crime_date,crime_full_address,crime_type,crime_media";
$page="";
$limit="";
$is_multiple="1";
$condition="";
//user_roles

if(isset($_REQUEST['logged_in_user']) && $_REQUEST['logged_in_user']!=""  )
{
	$user_language=GetSingleFieldDataFromTable("cz_users",$field="language_code"," cid='".$_REQUEST['logged_in_user']."' ",$is_stat_chk="0");
}else
{
	$user_language="";
}

$file_field=array("chk_file_path" => "../uploads/User/","file_path" => ROOT."/uploads/User/","default_file" => ROOT."/uploads/User/user.png","file_field_col" => "photo");

$data=array();

if(isset($_REQUEST['logged_in_user']) && $_REQUEST['logged_in_user']!=""  )
{
	
	$condition="";
	//$condition="";
	$crime_list=get_ConditionalDetailsFromTable($table_name,$is_stat_chk="0","",$condition,$is_multiple,$select_fields,$page="1",$limit="10","id","DESC","1");
	$total_crime_report=0;
	$total_crime_victim=0;
	//$crime_list="";
	if($crime_list!="")
	{
		$cid= $_REQUEST['logged_in_user'];
		$user_details=get_ConditionalDetailsFromTable("cz_users",$is_stat_chk="0",$file_field," cid='".$cid."' ","0","");	
		for ($cli=0; $cli < count($crime_list); $cli++) 
		{ 
			if(isset($user_details['photo']))
			{
				$crime_list[$cli]['user_profile_image']=$user_details['photo'];
			}
			if(isset($crime_list[$cli]['crime_type']))
			{
				$crime_type_name=GetSingleFieldDataFromTable("cz_crime_type",$field="name"," id='".$crime_list[$cli]['crime_type']."' ",$is_stat_chk="0");
				
			}else
			{
				$crime_type_name="";
			}
			$crime_list[$cli]['crime_type_name']=$crime_type_name;
		}

		
		$data['crime_list']=$crime_list;
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
		$data['crime_list']=null;
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
	$total_crime_report=CountTotalFromTable($table_name,"");
	$total_crime_victim=CountTotalFromTable($table_name," report_type='Victim' ");
	$data['total_crime_report']=$total_crime_report;
	$data['total_crime_victim']=$total_crime_victim;

}else
{	
	$data['crime_list']=null;
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