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

if(isset($_REQUEST['logged_in_user'])  && $_REQUEST['logged_in_user']!="" && isset($_REQUEST['id_notification']) && $_REQUEST['id_notification']!="")
{
	
	$data=array();	
	
	$user_id=$_REQUEST['logged_in_user'];
	
	$id_notification=$_REQUEST['id_notification'];
	
	



		$insert = "DELETE from cz_notification_details  WHERE id_notification='".$id_notification."' AND id_recepient='".$user_id."' ";
		$query = mysqli_query($conn,$insert)or die(mysqli_error($conn));
		if($query)
		{
			$id_booking=mysqli_insert_id($conn);
			$message = "Notification Removed Successfully";
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
			$message = "Error in Remove Notification";
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