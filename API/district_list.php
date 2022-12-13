<?php
header('Content-Type: application/json');
include("config.php");

$table_name="pns_distirct_details";
$order_by="name";
$order_type="ASC";
$select_fields="";
				
$condition=" status='1' ";

if(isset($_REQUEST['state_id']) && $_REQUEST['state_id']!="")
{
	$condition.=" AND state_id='".$_REQUEST['state_id']."' ";
}

if(isset($_REQUEST['logged_in_user']) && $_REQUEST['logged_in_user']!=""  )
{
	$user_language=GetSingleFieldDataFromTable("cz_users",$field="language_code"," cid='".$_REQUEST['logged_in_user']."' ",$is_stat_chk="0");
}else
{
	$user_language="";
}


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
$district_list=get_ConditionalDetailsFromTable($table_name,$is_stat_chk="0",$file_field="",$condition,$is_multiple="1",$select_fields,$page,$limit,$order_by,$order_type,"1");
//$district_list="";
if($district_list!="" && isset($district_list[0]['id']))
{
	// for ($cb=0; $cb < count($district_list); $cb++) 
	// { 
	// 	if(isset($district_list[$cb]['state_id']) && $district_list[$cb]['state_id']!="")
	// 	{
	// 		// $district_list[$cb]['state_id']=$district_list[$cb]['state_id'];
	// 		$district_list[$cb]['state_name']=GetSingleFieldDataFromTable("pns_state_details",$field="name","id='".$district_list[$cb]['state_id']."'",$is_stat_chk="0");	
	// 		// unset($district_list[$cb]['brand']);
	// 	}
	// }
	$data['total_records']=$total_records;
	$data['total_pages']=$total_pages;
	$data['district_list']=$district_list;
	//$data['condition']=$condition;
	$message="Districts available";
	$returnCode=true;																									
}else
{
	$data['total_records']=$total_records;
	$data['total_pages']=$total_pages;
	$data['district_list']=array();
	$message="No District available";
	$returnCode=false;
}
SendAPIResponse($returnCode,$message,$data);
?>