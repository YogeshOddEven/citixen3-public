<?php
header('Content-Type: application/json');
include("config.php");


if(isset($_REQUEST['logged_in_user']) && $_REQUEST['logged_in_user']!=""  )
{
	$user_language=GetSingleFieldDataFromTable("cz_users",$field="language_code"," cid='".$_REQUEST['logged_in_user']."' ",$is_stat_chk="0");
}else
{
	$user_language="";
}

$table_name="pns_settings";
$order_by="sid";
$order_type="DESC";
$select_fields="";

$logged_in_user="0";
// $logged_in_user_type="1";
// if(isset($_REQUEST['logged_in_user']) && $_REQUEST['logged_in_user']!="")
// {
// 	$logged_in_user=$_REQUEST['logged_in_user'];
// }
// $condition="patient='".$logged_in_user."' AND payment_status='1' AND is_price_consider='1'";

//page condition
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
	$limit="5";
}
$data=array();
$condition="";
$total_records=get_TotalAvailFromTable($table_name,$is_stat_chk="0",$condition);
if($limit>0)
{
	$total_pages = ceil($total_records / $limit);	
}else
{
	$total_pages="1";
}
$reach_us_list=get_ConditionalDetailsFromTable($table_name,$is_stat_chk="0",$file_field="",$condition,$is_multiple="1",$select_fields,$page,$limit,$order_by,$order_type,"1");
//$reach_us_list="";
if($reach_us_list!="")
{
	if(isset($reach_us_list['location_update_timeout']) && $reach_us_list['location_update_timeout']>0 )
	{
		$reach_us_list['location_update_timeout']=$reach_us_list['location_update_timeout']*1000;
	}else
	{
		$reach_us_list['location_update_timeout']=60*1000;
	}
	$data['total_records']=$total_records;
	$data['total_pages']=$total_pages;
	$data['reach_us_list']=$reach_us_list;
	//$data['condition']=$condition;
	
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
	$data['reach_us_list']=array();
	
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
SendAPIResponse($returnCode,$message,$data);
?>