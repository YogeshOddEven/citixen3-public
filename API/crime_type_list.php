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
if($user_language=="" || $user_language=="en" || $user_language=="EN" || $user_language=="ENG")
{
	$order_by="list_order";
	// $order_by="name";
}
else
{
	$order_by="list_order_spanish";
	// $order_by="spanish_name";
}

$table_name="cz_crime_type";

$order_type="ASC";
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

$file_field=array("chk_file_path" => "../uploads/User/","file_path" => ROOT."/uploads/User/","default_file" => ROOT."/uploads/User/user.png","file_field_col" => "image");

$data=array();

/*if(isset($_REQUEST['logged_in_user']) && $_REQUEST['logged_in_user']!=""  )
{*/
	
	//$condition=" cid='".$cid."' ";
	//$condition="";
	$crime_type_list=get_ConditionalDetailsFromTable($table_name,$is_stat_chk="0",$file_field="",$condition,$is_multiple,$select_fields,$page,$limit,$order_by,$order_type,"1");

	//$crime_type_list="";
	if($crime_type_list!="")
	{
			
		
		for ($i=0; $i < count($crime_type_list); $i++) 
		{ 
			if($user_language=="" || $user_language=="en" || $user_language=="EN" || $user_language=="ENG")
			{
			}
			else
			{
				$crime_type_list[$i]['name']=$crime_type_list[$i]['spanish_name'];
			}
				unset($crime_type_list[$i]['spanish_name']);

		}
		$data['crime_type_list']=$crime_type_list;
		$data['total_records']=$total_records;
		$data['total_pages']=$total_pages;
		$message="Details Available.";
		$returnCode=true;																									
	}else
	{
		$data['total_records']=$total_records;
		$data['total_pages']=$total_pages;
		$data['crime_type_list']=null;
		$message = "No Details Available";
		$returnCode=false;
	}
/*}else
{	
	$data['crime_type_list']=null;
	$message="Login User id must be required";
	$returnCode=false;		
}*/
SendAPIResponse($returnCode,$message,$data);
?>