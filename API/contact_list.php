<?php
header('Content-Type: application/json');
include("config.php");

$table_name="cz_user_contact";
$order_by="id";
$order_type="DESC";
$select_fields="";
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

if(isset($_REQUEST['logged_in_user']) && $_REQUEST['logged_in_user']!=""  )
{
	$user_language=GetSingleFieldDataFromTable("cz_users",$field="language_code"," cid='".$_REQUEST['logged_in_user']."' ",$is_stat_chk="0");
}else
{
	$user_language="";
}

$file_field=array("chk_file_path" => "../uploads/User/","file_path" => ROOT."/uploads/User/","default_file" => ROOT."/uploads/User/user.png","file_field_col" => "image");

$data=array();

if(isset($_REQUEST['logged_in_user']) && $_REQUEST['logged_in_user']!=""  )
{
	
	$condition=" user_id='".$_REQUEST['logged_in_user']."' ";
	//$condition="";
	$contact_list=get_ConditionalDetailsFromTable($table_name,$is_stat_chk="0",$file_field="",$condition,$is_multiple,$select_fields,$page,$limit,"","","1");

	//$contact_list="";
	if($contact_list!="")
	{
			
		
		$data['contact_list']=$contact_list;
		$data['total_records']=$total_records;
		$data['total_pages']=$total_pages;
		$message="Details Available.";
		$returnCode=true;																									
	}else
	{
		$data['total_records']=$total_records;
		$data['total_pages']=$total_pages;
		$data['contact_list']=null;
		$message = "No Details Available";
		$returnCode=false;
	}
}else
{	
	$data['contact_list']=null;
	$message="Login User must be required";
	$returnCode=false;		
}
SendAPIResponse($returnCode,$message,$data);
?>