<?php
header('Content-Type: application/json');
include("config.php");

if(isset($_REQUEST['logged_in_user'])  && $_REQUEST['logged_in_user']!="" && isset($_REQUEST['id_contact']) && $_REQUEST['id_contact']!="")
{
	
	$data=array();	
	$user_id=$_REQUEST['logged_in_user'];
	$id_contact=$_REQUEST['id_contact'];
	
	



		$insert = "DELETE from cz_user_contact  WHERE id='".$id_contact."' AND user_id='".$user_id."' ";
		$query = mysqli_query($conn,$insert)or die(mysqli_error($conn));
		if($query)
		{
			$id_booking=mysqli_insert_id($conn);
			$message = "Contact Removed Successfully";
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
			$message = "Error in Remove Contact";
			$returnCode=false;		
		}
	
}else
{
	$message = "Please enter all required values";
	$returnCode=false;
}
SendAPIResponse($returnCode,$message,$data="",$is_nodata="1");
?>