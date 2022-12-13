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

if( isset($_REQUEST['logged_in_user'])  && $_REQUEST['logged_in_user']!="" && isset($_REQUEST['crime_id']) && $_REQUEST['crime_id']!="" && isset($_REQUEST['report_type'])  && isset($_REQUEST['is_anonyms_reporting'])  && $_REQUEST['report_type']!=""  && $_REQUEST['is_anonyms_reporting']!="")
{
	
	$data=array();	
	if(!isset($_REQUEST['last_name'])){$_REQUEST['last_name']="";}
	$contact_no=mysqli_real_escape_string($conn, $_REQUEST['contact_no']);
	$last_name=mysqli_real_escape_string($conn, $_REQUEST['last_name']);
	$first_name=mysqli_real_escape_string($conn, $_REQUEST['first_name']);
	$relationship=mysqli_real_escape_string($conn, $_REQUEST['relationship']);
	$logged_in_user=$_REQUEST['logged_in_user'];
	$crime_id=$_REQUEST['crime_id'];
	
	// $time=date('H:i:s',strtotime($_REQUEST['time']));
	$date_updated=date('Y-m-d H:i:s');
	
	// $total_exercise_comments=CountExerciseComments($id_exercise);

	if(!isset($_REQUEST['crime_full_address'])){$_REQUEST['crime_full_address']="";}
	if(!isset($_REQUEST['short_address'])){$_REQUEST['short_address']="";}
	if(!isset($_REQUEST['city'])){$_REQUEST['city']="";}
	if(!isset($_REQUEST['state'])){$_REQUEST['state']="";}
	if(!isset($_REQUEST['province'])){$_REQUEST['province']="";}
	if(!isset($_REQUEST['crime_type'])){$_REQUEST['crime_type']="";}
	if(!isset($_REQUEST['description'])){$_REQUEST['description']="";}
	if(!isset($_REQUEST['additional_notes'])){$_REQUEST['additional_notes']="";}
	if(!isset($_REQUEST['other_crime_type_details'])){$_REQUEST['other_crime_type_details']="";}
	if(!isset($_REQUEST['crime_type_field_details'])){$_REQUEST['crime_type_field_details']="";}
	if(!isset($_REQUEST['crime_media'])){$_REQUEST['crime_media']="";}
	
	if(!isset($_REQUEST['is_requested_update'])){$_REQUEST['is_requested_update']="0";}
	if(!isset($_REQUEST['update_request_status'])){$_REQUEST['update_request_status']="1";}
	if(!isset($_REQUEST['update_request_date'])){$_REQUEST['update_request_date']=NULL;}
	if(!isset($_REQUEST['is_open_update'])){$_REQUEST['is_open_update']="0";}
	
	
	
	// print_r($_REQUEST);
	$optional_field_list=array("crime_full_address","short_address","city","state","province","crime_type","description","additional_notes","other_crime_type_details");
	$optional_update_fields="";
	$required_update_fields="";
	
	$required_field_list=array("report_type","is_anonyms_reporting","is_requested_update","update_request_status","update_request_date","is_open_update");
	for ($rfi=0; $rfi < count($required_field_list); $rfi++) 
	{ 
		$current_req_field=$required_field_list[$rfi];
		// print_r($_REQUEST[$current_req_field]);
		if(isset($_REQUEST[$current_req_field]) && $_REQUEST[$current_req_field]!="")
		{
			// echo $current_req_field;
			if($rfi=="0")
			{
				$required_update_fields.=" ".$current_req_field."='".mysqli_real_escape_string($conn, $_REQUEST[$current_req_field])."' ";	
			}else
			{
				$required_update_fields.=", ".$current_req_field."='".mysqli_real_escape_string($conn, $_REQUEST[$current_req_field])."' ";	
			}
			
		}	
	}
	for ($ofi=0; $ofi < count($optional_field_list); $ofi++) 
	{ 
		$current_opt_field=$optional_field_list[$ofi];
		if(isset($_REQUEST[$current_opt_field]) && $_REQUEST[$current_opt_field]!="")
		{
			$optional_update_fields.=", ".$current_opt_field."='".mysqli_real_escape_string($conn, $_REQUEST[$current_opt_field])."'";	
		}	
	}
	
	if(isset($_REQUEST['crime_type_field_details']))
	{
		$optional_update_fields.=", crime_type_field_details='".$_REQUEST['crime_type_field_details']."'";
	}
	if(isset($_REQUEST['crime_media']))
	{
		$optional_update_fields.=", crime_media='".$_REQUEST['crime_media']."'";
	}



		$insert = "UPDATE cz_crime_details  SET ".$required_update_fields." ".$optional_update_fields.",date_added='".$date_updated."' WHERE id='".$crime_id."' ";
		$query = mysqli_query($conn,$insert)or die(mysqli_error($conn));
		if($query)
		{
			$id_booking=mysqli_insert_id($conn);
			//$message = "Crime Details Updated Successfully";
			if($user_language=="" || $user_language=="en" || $user_language=="EN" || $user_language=="ENG")
			{
				$message = "Crime Details Updated Successfully";
			}
			else
			{
				$message = "Detalles del crimen actualizados con éxito";
			}

			$returnCode=true;	

			/*send notification*/
			/*$admin_id="1";
			$tokens_admin=get_executive_tokens($admin_id);
			
			
			/*$title_admin="New Demo Booking Done";
			$body_admin="Demo Booking For Date: ".date('d/m/Y',strtotime($date_booking))." For Time Slot: ".date('h:i A',strtotime($start_time))." To ".date('h:i A',strtotime($end_time))."  Done For ".$customer_name;
			$additional_desc_admin=$body_admin;
			$type_id=$id_booking;
			$type="book_demo";
			$admin_notification=SendOneSignalNotification($tokens_admin,$title_admin,$body_admin,$type,$type_id,$additional_desc_admin);
			$add_admin_notification=AddNotification($title_admin,$additional_desc_admin,$type,$type_id,$admin_id);*/

			/*send notification*/
		}else
		{
			if($user_language=="" || $user_language=="en" || $user_language=="EN" || $user_language=="ENG")
			{
				$message = "Error in Updation, Please try again later.";
			}
			else
			{
				$message = "Error en la actualización, inténtalo de nuevo más tarde.";
			}

			$returnCode=false;		
		}
	// $data['total_exercise_comments']=$total_exercise_comments;
	// $data['is_exercise_commented']=CheckIsPostCommented($id_exercise,$uid,"1");
}else
{
	// $data['total_exercise_comments']=0;
	// $data['is_exercise_commented']=0;
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