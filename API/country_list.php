<?php
header('Content-Type: application/json');
include("config.php");

$table_name="cz_countries";
$order_by="name";
$order_type="ASC";
$select_fields="";
				
$condition=" status='1' ";



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
	$limit="0";
}
$data=array();
$total_records=get_TotalAvailFromTable($table_name,$is_stat_chk="0",$condition);
if($limit>0)
{
	$total_pages = ceil($total_records / $limit);	
}else
{
	$total_pages="1";
}
$country_list=get_ConditionalDetailsFromTable($table_name,$is_stat_chk="0",$file_field="",$condition,$is_multiple="1",$select_fields,$page,$limit,$order_by,$order_type,"1");
//$country_list="";
if($country_list!="" && isset($country_list[0]['id']))
{
	$data['total_records']=$total_records;
	$data['total_pages']=$total_pages;
	$data['country_list']=$country_list;
	//$data['condition']=$condition;
	$message="Country available";
	$returnCode=true;																									
}else
{
	$data['total_records']=$total_records;
	$data['total_pages']=$total_pages;
	$data['country_list']=array();
	$message="No Country available";
	$returnCode=false;
}
SendAPIResponse($returnCode,$message,$data);
?>