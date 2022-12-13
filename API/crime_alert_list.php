<?php
header('Content-Type: application/json');
include("config.php");

$table_name="cz_crime_details";
$order_by="id";
$order_type="DESC";
$select_fields="id,report_type,is_anonyms_reporting,crime_date,crime_full_address,crime_type,crime_media,short_address,added_by";
$page="";
$limit="";
$is_multiple="1";
$condition=" id>0 ";
$maximum_range=10;
$minimum_range=0;
$admin_min_range_free_user=get_admin_settings("free_user_near_by_start_range");
$admin_max_range_free_user=get_admin_settings("free_user_near_by_end_range");

$admin_min_range_paid_user=get_admin_settings("paid_user_near_by_start_range");
$admin_max_range_paid_user=get_admin_settings("paid_user_near_by_end_range");

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

$total_records=0;
$file_field=array("chk_file_path" => "../uploads/User/","file_path" => ROOT_W."/uploads/User/","default_file" => ROOT."/uploads/User/user.png","file_field_col" => "photo");

$data=array();
$new_crime_list=array();
if(isset($_REQUEST['logged_in_user']) && $_REQUEST['logged_in_user']!="" && isset($_REQUEST['current_lat_lng']) && $_REQUEST['current_lat_lng']!=""  )
{
	$login_user_details=get_ConditionalDetailsFromTable("cz_users",$is_stat_chk="0",$file_field," cid='".$_REQUEST['logged_in_user']."' ","0","");
	if($login_user_details['user_type']=="free")
	{
		// $condition.=" AND (( added_by!='".$_REQUEST['logged_in_user']."' AND crime_date  > NOW() - INTERVAL 48 HOUR) OR (added_by='".$_REQUEST['logged_in_user']."') ) ";
		$condition.=" AND (( added_by!='".$_REQUEST['logged_in_user']."' AND crime_date  > NOW() - INTERVAL 48 HOUR) OR (added_by='".$_REQUEST['logged_in_user']."') ) ";

		$minimum_range=$admin_min_range_free_user;
		$maximum_range=$admin_max_range_free_user;
	}else
	{
		$condition.=" AND (( added_by!='".$_REQUEST['logged_in_user']."' AND crime_date  > CURDATE() - INTERVAL 30 DAY) OR (added_by='".$_REQUEST['logged_in_user']."') ) ";
		
		$minimum_range=$admin_min_range_paid_user;
		$maximum_range=$admin_max_range_paid_user;
	}
	// $condition=" added_by='".$_REQUEST['logged_in_user']."' ";
	//$condition="";
	$crime_list=get_ConditionalDetailsFromTable($table_name,$is_stat_chk="0","",$condition,$is_multiple,$select_fields,$page,$limit,$order_by,$order_type,"1");

	$current_lat_lng=$_REQUEST['current_lat_lng'];	
	$current_lat_lng=str_replace("(","",$current_lat_lng);
	$current_lat_lng=str_replace(")","",$current_lat_lng);
	if(strpos($current_lat_lng,",")!==false)
	{
		$current_lat_lng_arr=array();
		$current_lat_lng_arr=explode(",",$current_lat_lng);
		$current_lattitude=$current_lat_lng_arr[0];
		$current_longitude=$current_lat_lng_arr[1];
	}
	//$crime_list="";
	if($crime_list!="")
	{
			
		for ($cli=0; $cli < count($crime_list); $cli++) 
		{
			SetDisableCrimeOpenUpdate($crime_list[$cli]['id']);
			$cid= $crime_list[$cli]['added_by'];
			$crime_user_details=get_ConditionalDetailsFromTable("cz_users",$is_stat_chk="0",$file_field," cid='".$cid."' ","0",""); 
			if(isset($crime_user_details['photo']))
			{
				$crime_list[$cli]['user_profile_image']=$crime_user_details['photo'];
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
			$crime_list[$cli]['crime_type_name']=$crime_type_name;
			$report_type_name="No";
			if(isset($crime_list[$cli]['report_type']) && $crime_list[$cli]['report_type']=="1")
			{
				$report_type_name="Yes";
			}
			$crime_list[$cli]['report_type_name']=$report_type_name;
		
			if(isset($crime_list[$cli]['short_address']) && $crime_list[$cli]['short_address']!="")
			{
				$lat_lng=$crime_list[$cli]['short_address'];
				$lat_lng=str_replace("(","",$lat_lng);
				$lat_lng=str_replace(")","",$lat_lng);
				if(strpos($lat_lng,",")!==false)
				{
					$lat_lng_arr=array();
					$lat_lng_arr=explode(",",$lat_lng);
					$crime_lattitude=$lat_lng_arr[0];
					$crime_longitude=$lat_lng_arr[1];

					$current_lattitude= (float) $current_lattitude;					
					$current_longitude= (float) $current_longitude;					
					$crime_lattitude= (float) $crime_lattitude;					
					$crime_longitude= (float) $crime_longitude;	

					$total_distance=CalcLatLngDistance($current_lattitude, $current_longitude, $crime_lattitude, $crime_longitude, "");
					$crime_list[$cli]['total_distance']=number_format($total_distance,5);
					$crime_list[$cli]['minimum_range']=$minimum_range;
					$crime_list[$cli]['maximum_range']=$maximum_range;
					if($crime_list[$cli]['added_by']==$_REQUEST['logged_in_user'])
					{
						$total_records++;
						array_push($new_crime_list,$crime_list[$cli]);									
					}
					elseif(($total_distance>=$minimum_range && $total_distance<=$maximum_range) )
					{
						$total_records++;
						array_push($new_crime_list,$crime_list[$cli]);
					}
				}
			}
		}
		$data['crime_list']=$new_crime_list;
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