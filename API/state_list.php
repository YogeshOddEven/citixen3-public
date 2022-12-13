<?php
header('Content-Type: application/json');
include("config.php");

$table_name="pns_state_details";
$order_by="name";
$order_type="ASC";
$select_fields="";
				
$condition=" status='1' ";

// if(isset($_REQUEST['type']) && $_REQUEST['type']!="")
// {
// 	$condition.=" type='".$_REQUEST['type']."' ";
// }


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
$state_list=get_ConditionalDetailsFromTable($table_name,$is_stat_chk="0",$file_field="",$condition,$is_multiple="1",$select_fields,$page,$limit,$order_by,$order_type,"1");
//$state_list="";
if($state_list!="" && isset($state_list[0]['id']))
{
	// for ($cb=0; $cb < count($state_list); $cb++) 
	// { 
	// 	if(isset($state_list[$cb]['brand']) && $state_list[$cb]['brand']!="")
	// 	{
	// 		$state_list[$cb]['brand_id']=$state_list[$cb]['brand'];
	// 		$state_list[$cb]['brand_name']=GetSingleFieldDataFromTable("pns_car_brand",$field="brand_name","id='".$state_list[$cb]['brand']."'",$is_stat_chk="0");	
	// 		unset($state_list[$cb]['brand']);
	// 	}
	// }
	$data['total_records']=$total_records;
	$data['total_pages']=$total_pages;
	$data['state_list']=$state_list;
	//$data['condition']=$condition;
	$message="States available";
	$returnCode=true;																									
}else
{
	$data['total_records']=$total_records;
	$data['total_pages']=$total_pages;
	$data['state_list']=array();
	$message="No State available";
	$returnCode=false;
}
SendAPIResponse($returnCode,$message,$data);
?>