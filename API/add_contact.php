<?php
header('Content-Type: application/json');
include("config.php");


//$srno = $_REQUEST['srno'];

	
	if(isset($_REQUEST['contact_no']) && isset($_REQUEST['logged_in_user']) && isset($_REQUEST['first_name']) && isset($_REQUEST['relationship']) && $_REQUEST['contact_no']!=""  && $_REQUEST['first_name']!=""   && $_REQUEST['relationship']!="" )
	{
		//$photo_name=array();
		if(!isset($_REQUEST['last_name'])){$_REQUEST['last_name']="";}
		$contact_no=mysqli_real_escape_string($conn, $_REQUEST['contact_no']);
		$last_name=mysqli_real_escape_string($conn, $_REQUEST['last_name']);
		$first_name=mysqli_real_escape_string($conn, $_REQUEST['first_name']);
		$relationship=mysqli_real_escape_string($conn, $_REQUEST['relationship']);
		$logged_in_user=$_REQUEST['logged_in_user'];
		
		$total_added_contacts=GetTotalAvailFromTable("cz_user_contact","0"," user_id='$logged_in_user' ");
		$user_type=$alert_user_device_token=GetSingleFieldDataFromTable("cz_users","user_type"," cid='".$logged_in_user."' ","0");
		$maximum_allowed_contacts=0;
		if($user_type=="free")
		{
			$maximum_allowed_contacts=1;
		}else
		{
			$maximum_allowed_contacts=10;
		}
		//$id=$_REQUEST['id_car'];
		$condition="";
		
		// $condition=" car_owner='".$logged_in_user."' AND id='".$id."' ";
		if($maximum_allowed_contacts>$total_added_contacts)
		{

		
		
			// $car_details=get_ConditionalDetailsFromTable("cz_user_contact",$is_stat_chk="0",$file_field="",$condition,"0","id,car_number,description,modal,brand");
			// if($car_details!="" && isset($car_details['id']))
			// {
			// 	$add_user_registration=mysqli_query($conn,"UPDATE cz_user_contact SET car_number='$car_number',description='$description',brand='$brand',modal='$modal' WHERE ".$condition) or die(mysqli_error($conn));	
			// }else
			// {	
				$add_user_registration=mysqli_query($conn,"INSERT INTO cz_user_contact (first_name,last_name,contact_no,relationship,user_id) VALUES('$first_name','$last_name','$contact_no','$relationship','$logged_in_user')") or die(mysqli_error($conn));
			//}
			if($add_user_registration)
				{
					$message = "Contact Added Successfully";
					$returnCode=true;		
				}else
				{
					$message = "Error in Updation, Please try again later.";
					$returnCode=true;
				}
			/*$message = "Photos Uploaded Successfully";
				$returnCode=true;*/
			
			
			//$message=$message.json_encode($_FILES);
		}else
		{
			$message = "Your Contact adding limit exhausted, Please upgrade application from profile or contact administrator.";
			$returnCode=false;	
		}
	}else
	{
		$message = "PLease enter all required values";
		$returnCode=false;
	}

SendAPIResponse($returnCode,$message,$data="",$is_nodata="1");
?>