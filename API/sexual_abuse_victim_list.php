<?php
header('Content-Type: application/json');
include("config.php");

$table_name="cz_crime_type_category";
$order_by="id";
$order_type="DESC";
$select_fields="";
$page="";
$limit="";
$is_multiple="1";
$condition=" type='4' ";
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

$file_field=array("chk_file_path" => "../uploads/User/","file_path" => ROOT."/uploads/User/","default_file" => ROOT."/uploads/User/user.png","file_field_col" => "image");

$data=array();

/*if(isset($_REQUEST['logged_in_user']) && $_REQUEST['logged_in_user']!=""  )
{*/
	
	//$condition=" cid='".$cid."' ";
	//$condition="";
	$sexual_abuse_victim_list=get_ConditionalDetailsFromTable($table_name,$is_stat_chk="0",$file_field="",$condition,$is_multiple,$select_fields,$page,$limit,"","","1");

	//$sexual_abuse_victim_list="";
	if($sexual_abuse_victim_list!="")
	{
			
		
		$data['sexual_abuse_victim_list']=$sexual_abuse_victim_list;
		$data['total_records']=$total_records;
		$data['total_pages']=$total_pages;
		$message="Details Available.";
		$returnCode=true;																									
	}else
	{
		$data['total_records']=$total_records;
		$data['total_pages']=$total_pages;
		$data['sexual_abuse_victim_list']=null;
		if($add_user_alert)
		{
			$c_alert=mysqli_insert_id($conn);
			mysqli_query($conn,"UPDATE cz_user_alert SET status='0' WHERE user_id='$user_id' AND id!='$c_alert' ");
			$message = "Alert Range set Successfully";
			$returnCode=true;		
		}else
		{
			$message = "Error in Updation, Please try again later.";
			$returnCode=true;
		}
		
		$returnCode=false;
	}
/*}else
{	
	$data['sexual_abuse_victim_list']=null;
	$message="Login User id must be required";
	$returnCode=false;		
}*/
SendAPIResponse($returnCode,$message,$data);
?>