<?php
header('Content-Type: application/json');
include("config.php");


//$srno = $_REQUEST['srno'];
if(isset($_REQUEST['logged_in_user']) && $_REQUEST['logged_in_user']!=""  )
{
	$user_language=GetSingleFieldDataFromTable("cz_users",$field="language_code"," cid='".$_REQUEST['logged_in_user']."' ",$is_stat_chk="0");
}else
{
	$user_language="";
}
	
	if(isset($_REQUEST['crime_id']) && isset($_REQUEST['logged_in_user']) && isset($_REQUEST['shared_to_user_email']) )
	{
		//$photo_name=array();
		$crime_id=mysqli_real_escape_string($conn, $_REQUEST['crime_id']);
		$cdate=date('Y-m-d h:i:s');
		$logged_in_user=$_REQUEST['logged_in_user'];
		$shared_by=$logged_in_user;
		$shared_to=$_REQUEST['shared_to_user_email'];

		$user_name=GetSingleFieldDataFromTable("cz_users",$field="fname"," cid='".$logged_in_user."' ",$is_stat_chk="0")." ".GetSingleFieldDataFromTable("cz_users",$field="lname"," cid='".$logged_in_user."' ",$is_stat_chk="0");

        
		$table_name="cz_crime_details";
		$order_by="id";
		$order_type="DESC";
		$select_fields="";
		$page="";
		$limit="";
		$is_multiple="0";
		$condition=" id='".$crime_id."' ";

		$crime_details=get_ConditionalDetailsFromTable($table_name,$is_stat_chk="0",$file_field="",$condition,$is_multiple,$select_fields,$page,$limit,"","","1");
		if(isset($crime_details['crime_type']))
		{
			$crime_type_name=GetSingleFieldDataFromTable("cz_crime_type",$field="name"," id='".$crime_details['crime_type']."' ",$is_stat_chk="0");
		}else
		{
			$crime_type_name="";
		}
		$crime_details['crime_type_name']=$crime_type_name;
		$mail_users=array();
		if(strpos($shared_to,",")!==false)
		{
			$mail_users=explode(",", $shared_to);
		
		}else
		{
			$mail_users[]=$shared_to;
		}
		// print_r($mail_users);
		for ($mul=0; $mul < count($mail_users); $mul++) 
		{ 
			// $mail->addAddress($mail_users[$mul]);	
			SendShareCrimeEmail($crime_id,$mail_users[$mul],$user_name);
		}
		
		
		
		$message = "Crime Shared Mail Sent Successfully";
		$returnCode=true;		
			
	}else
	{
		if($user_language=="" || $user_language=="en" || $user_language=="EN" || $user_language=="ENG")
		{
			$message = "PLease enter all required values";
		}
		else
		{
			$message = "Por favor ingrese todos los valores requeridos";
		}
		$returnCode=false;
	}

SendAPIResponse($returnCode,$message,$data="",$is_nodata="1");
?>