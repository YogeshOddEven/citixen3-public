<?php
header('Content-Type: application/json');
include("config.php");

$table_name="cz_crime_details";
$order_by="id";
$order_type="DESC";
$select_fields="";
$page="";
$limit="";
$is_multiple="0";

//user_roles

// $file_field=array("chk_file_path" => "../uploads/User/","file_path" => ROOT."/uploads/User/","default_file" => ROOT."/uploads/User/user.png","file_field_col" => "photo");

$data=array();
if(isset($_REQUEST['logged_in_user']) && $_REQUEST['logged_in_user']!=""  )
{
	$user_language=GetSingleFieldDataFromTable("cz_users",$field="language_code"," cid='".$_REQUEST['logged_in_user']."' ",$is_stat_chk="0");
}else
{
	$user_language="";
}

if(isset($_REQUEST['crime_id']) && $_REQUEST['crime_id']!=""  )
{
	$cid= $_REQUEST['crime_id'];
	$condition=" id='".$cid."' ";
	SetDisableCrimeOpenUpdate($cid);
	$crime_details=get_ConditionalDetailsFromTable($table_name,$is_stat_chk="0",$file_field="",$condition,$is_multiple,$select_fields,$page,$limit,"","","1");

	//$crime_details="";
	if($crime_details!="")
	{

		if(isset($crime_details['crime_type']))
		{
			if($user_language=="" || $user_language=="en" || $user_language=="EN" || $user_language=="ENG")
			{
				$crime_type_name=GetSingleFieldDataFromTable("cz_crime_type",$field="name"," id='".$crime_details['crime_type']."' ",$is_stat_chk="0");
			}else
			{
				$crime_type_name=GetSingleFieldDataFromTable("cz_crime_type",$field="spanish_name"," id='".$crime_details['crime_type']."' ",$is_stat_chk="0");
			}
		}else
		{
			$crime_type_name="";
		}
		$crime_details['crime_type_name']=$crime_type_name;
		
		$report_type_name="No";
		if(isset($crime_details['report_type']) && $crime_details['report_type']=="1")
		{
			if($user_language=="" || $user_language=="en" || $user_language=="EN" || $user_language=="ENG")
			{
				$report_type_name="Yes";
			}else
			{
				$report_type_name="Sí";
			}
		}
		$crime_details['report_type_name']=$report_type_name;

		

		if($user_language=="" || $user_language=="en" || $user_language=="EN" || $user_language=="ENG")
		{
		}
		else
		{
			// $crime_details=$crime_type_list[$i]['spanish_name'];
			if($crime_details['crime_type_field_details']!="" && $crime_details['crime_type_field_details']!="[]" && $crime_details['crime_type_field_details']!="{}")
			{
				$new_crime_field_Arr=array();
				$crime_fields_array=json_decode($crime_details['crime_type_field_details'],true);
				foreach ($crime_fields_array as $key => $value) 
				{
					$crime_field_name=stripslashes($key);
					$crime_field_name=str_replace("\\","",$crime_field_name);
					// cz_crime_type_fields
					$spanish_name=GetSingleFieldDataFromTable("cz_crime_type_fields",$field="spanish_name"," field_name LIKE '%".$crime_field_name."%' OR display_name LIKE '%".$crime_field_name."%' ","0");

					if($spanish_name!="0"){$new_crime_field_Arr[$spanish_name]=$value;}else{$new_crime_field_Arr[$crime_field_name]=$value;}
				}
				$crime_details['crime_type_field_details']=json_encode($new_crime_field_Arr);
			}
		}
		

		$data=$crime_details;
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
		// $data['crime_details']=null;
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
	// $data['crime_details']=null;
	$message="Crime id must be required";
	$returnCode=false;		
}
SendAPIResponse($returnCode,$message,$data);
?>