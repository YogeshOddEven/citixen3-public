<?php
header('Content-Type: application/json');
include("config.php");

$table_name="cz_notification_details";
$order_by="id_notification";
$order_type="DESC";
$select_fields="id_notification,title,description,type,type_id,is_read,date";
//$file_field=array("chk_file_path" => "../admin/upload/publication_book/","file_path" => ROOT."/upload/publication_book/","default_file" => ROOT."/assets/images/noimage.png","file_field_col" => "book_image");				
//$lid=$_REQUEST['lid'];
$condition=$condition="recepient_type ='0' AND status='1'";;

if(isset($_REQUEST['logged_in_user']) && $_REQUEST['logged_in_user']!=""  )
{
	$user_language=GetSingleFieldDataFromTable("cz_users",$field="language_code"," cid='".$_REQUEST['logged_in_user']."' ",$is_stat_chk="0");
}else
{
	$user_language="";
}

if(isset($_REQUEST['logged_in_user']) && $_REQUEST['logged_in_user']!="")
{
	if($condition=="")
	{
		$condition.=" id_recepient='".$_REQUEST['logged_in_user']."'";
	}else
	{
		$condition.=" AND id_recepient='".$_REQUEST['logged_in_user']."'";
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
	$notification_details=get_ConditionalDetailsFromTable($table_name,$is_stat_chk="0",$file_field="",$condition,$is_multiple="1",$select_fields,$page,$limit,$order_by,$order_type,"1");
	//$notification_details="";
	$total_new_notification=0;
	$total_old_notification=0;

	if($notification_details!="")
	{
		if(count($notification_details)>0)
		{
			for($i=0;$i<count($notification_details);$i++)
			{
				if(isset($notification_details[$i]['is_read']))
				{
					$is_read_id=$notification_details[$i]['is_read'];
					$is_read_name="Unread";
					if($is_read_id=="0")
					{
						$is_read_name="Read";
						$total_old_notification++;
					}
					$notification_details[$i]['is_read_id']=$is_read_id;
					$notification_details[$i]['is_read_name']=$is_read_name;
				}
			}
		}
		$total_new_notificaiton=$total_records-$total_old_notification;
		$data['total_records']=$total_records;
		$data['total_pages']=$total_pages;
		$data['total_new_notificaiton']=$total_new_notificaiton;
		$data['notification_details']=$notification_details;
		$message="Notification available";
		$returnCode=true;																									
	}else
	{
		$total_records=0;
		$total_pages=0;
		$total_new_notificaiton=0;
		$data['total_records']=$total_records;
		$data['total_pages']=$total_pages;
		$data['total_new_notificaiton']=$total_new_notificaiton;
		$data['notification_details']=array();
		$message="No Notification available";
		$returnCode=false;
	}
}else
{
	$total_records=0;
	$total_pages=0;
	$total_new_notificaiton=0;
	$data['total_records']=$total_records;
	$data['total_pages']=$total_pages;
	$data['total_new_notificaiton']=$total_new_notificaiton;
	$data['notification_details']=array();
	$message="No Notification available";
	$returnCode=false;
}
SendAPIResponse($returnCode,$message,$data);
?>