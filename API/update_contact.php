<?php
header('Content-Type: application/json');
include("config.php");

if( isset($_REQUEST['logged_in_user'])  && $_REQUEST['logged_in_user']!=""   && isset($_REQUEST['contact_no']) && $_REQUEST['contact_no']!="")
{
	
	$data=array();	
	if(!isset($_REQUEST['last_name'])){$_REQUEST['last_name']="";}
	$contact_no=mysqli_real_escape_string($conn, $_REQUEST['contact_no']);
	$last_name=mysqli_real_escape_string($conn, $_REQUEST['last_name']);
	$first_name=mysqli_real_escape_string($conn, $_REQUEST['first_name']);
	$relationship=mysqli_real_escape_string($conn, $_REQUEST['relationship']);
	$logged_in_user=$_REQUEST['logged_in_user'];
	$id_contact=$_REQUEST['id_contact'];
	
	// $time=date('H:i:s',strtotime($_REQUEST['time']));
	$date_updated=date('Y-m-d H:i:s');
	
	// $total_exercise_comments=CountExerciseComments($id_exercise);
	
	$optional_field_list=array("first_name","last_name","relationship");
	$optional_update_fields="";
	$required_update_fields="";
	
	$required_field_list=array("contact_no");
	for ($rfi=0; $rfi < count($required_field_list); $rfi++) 
	{ 
		$current_req_field=$required_field_list[$rfi];
		if(isset($_REQUEST[$current_req_field]) && $_REQUEST[$current_req_field]!="")
		{
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
	
	



		$insert = "UPDATE cz_user_contact  SET ".$required_update_fields." ".$optional_update_fields.",date_added='".$date_updated."' WHERE id='".$id_contact."' ";
		$query = mysqli_query($conn,$insert)or die(mysqli_error($conn));
		if($query)
		{
			$id_booking=mysqli_insert_id($conn);
			$message = "Contact Updated Successfully";
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
			$message = "Error in Update Contact";
			$returnCode=false;		
		}
	// $data['total_exercise_comments']=$total_exercise_comments;
	// $data['is_exercise_commented']=CheckIsPostCommented($id_exercise,$uid,"1");
}else
{
	// $data['total_exercise_comments']=0;
	// $data['is_exercise_commented']=0;
	$message = "Please enter all required values";
	$returnCode=false;
}
SendAPIResponse($returnCode,$message,$data="",$is_nodata="1");
?>