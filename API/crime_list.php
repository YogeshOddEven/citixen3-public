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
$total_records=get_TotalAvailFromTable($table_name,$is_stat_chk="0",$condition);
if($limit>0)
{
	$total_pages = ceil($total_records / $limit);	
}else
{
	$total_pages="1";
}

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
	
	
	$condition=" added_by='".$_REQUEST['logged_in_user']."' ";
	//$condition="";
	$crime_list=get_ConditionalDetailsFromTable($table_name,$is_stat_chk="0","",$condition,$is_multiple,$select_fields,$page,$limit,$order_by,$order_type,"1");

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
				if($user_language=="" || $user_language=="en" || $user_language=="EN" || $user_language=="ENG")
				{
					$crime_type_name=GetSingleFieldDataFromTable("cz_crime_type",$field="name"," id='".$crime_list[$cli]['crime_type']."' ",$is_stat_chk="0");
				}else
				{
					$crime_type_name=GetSingleFieldDataFromTable("cz_crime_type",$field="spanish_name"," id='".$crime_list[$cli]['crime_type']."' ",$is_stat_chk="0");
				}
				
			}else
			{
				$crime_type_name="";
			}
			$report_type_name="No";
			if(isset($crime_list[$cli]['report_type']) && $crime_list[$cli]['report_type']=="1")
			{
				$report_type_name="Yes";
			}
			$crime_list[$cli]['report_type_name']=$report_type_name;
			$crime_list[$cli]['crime_type_name']=$crime_type_name;
			SetDisableCrimeOpenUpdate($crime_list[$cli]['id']);
		}

		
		$data['crime_list']=$crime_list;
		$total_crime_report=CountTotalFromTable($table_name,$condition);
		$total_crime_victim=CountTotalFromTable($table_name,$condition." AND report_type='Victim' ");
		$data['total_crime_report']=$total_crime_report;
		$data['total_crime_victim']=$total_crime_victim;
		$data['total_records']=$total_records;
		$data['total_pages']=$total_pages;
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
		$data['total_records']=$total_records;
		$data['total_pages']=$total_pages;
		$data['total_crime_report']=0;
		$data['total_crime_victim']=0;
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
}else
{	
	$data['crime_list']=null;
	$message="Login User must be required";
	$returnCode=false;		
}
SendAPIResponse($returnCode,$message,$data);
?>