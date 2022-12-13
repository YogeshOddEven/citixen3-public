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

if(  isset($_REQUEST['logged_in_user'])  && $_REQUEST['logged_in_user']!=""  &&  isset($_REQUEST['title']) && $_REQUEST['title']!="")
{
	
	$data=array();	
	$description="";$address="";$place_id="";$title="";$lat="";$lng="";
	$user_id=$_REQUEST['logged_in_user'];
	if(isset($_REQUEST['lat'])){ $lat=$_REQUEST['lat']; }
	if(isset($_REQUEST['lng'])){ $lng=$_REQUEST['lng']; }
	if(isset($_REQUEST['title'])){ $title=$_REQUEST['title']; }
	if(isset($_REQUEST['place_id'])){ $place_id=$_REQUEST['place_id']; }
	if(isset($_REQUEST['description'])){ $description=$_REQUEST['description']; }
	if(isset($_REQUEST['address'])){ $address=$_REQUEST['address']; }
	
	// $time=date('H:i:s',strtotime($_REQUEST['time']));
	$date_updated=date('Y-m-d H:i:s');
	
	// $total_exercise_comments=CountExerciseComments($id_exercise);
	
	


		$insert = "insert into pns_favorite_location (id,user_id,date_added,lat,lng,title,place_id,description,address) values(NULL,'".$user_id."','".$date_updated."','".$lat."','".$lng."','".$title."','".$place_id."','".$description."','".$address."')";
		$query = mysqli_query($conn,$insert)or die(mysqli_error($conn));
		if($query)
		{
			$id_booking=mysqli_insert_id($conn);
			$message = "Favorite Place Added Successfully";
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
			$message = "Error in Add Favorite Place";
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