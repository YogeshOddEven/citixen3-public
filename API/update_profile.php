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
	
	if(isset($_REQUEST['fname']) && isset($_REQUEST['logged_in_user']) )
	{
		//$photo_name=array();
		$fname="";$lname="";$emailid="";$mobile="";$gender="";$address="";
		if(isset($_REQUEST['fname'])){ $fname=mysqli_real_escape_string($conn, $_REQUEST['fname']);}
		if(isset($_REQUEST['lname'])){ $lname=mysqli_real_escape_string($conn, $_REQUEST['lname']);}
		if(isset($_REQUEST['pname'])){ $pname=mysqli_real_escape_string($conn, $_REQUEST['pname']);}
		if(isset($_REQUEST['emailid'])){ $emailid=mysqli_real_escape_string($conn, $_REQUEST['emailid']);}
		if(isset($_REQUEST['mobile'])){ $mobile=mysqli_real_escape_string($conn, $_REQUEST['mobile']);}
		// if(isset($_REQUEST['gender'])){ $gender=mysqli_real_escape_string($conn, $_REQUEST['gender']);}
		if(isset($_REQUEST['address'])){ $address=mysqli_real_escape_string($conn, $_REQUEST['address']);}
		if(isset($_REQUEST['state'])){ $state=mysqli_real_escape_string($conn, $_REQUEST['state']);}
		if(isset($_REQUEST['city'])){ $city=mysqli_real_escape_string($conn, $_REQUEST['city']);}
		if(isset($_REQUEST['lat'])){ $lat=mysqli_real_escape_string($conn, $_REQUEST['lat']);}
		if(isset($_REQUEST['lng'])){ $lng=mysqli_real_escape_string($conn, $_REQUEST['lng']);}

		if(isset($_REQUEST['zipcode'])){ $zipcode=mysqli_real_escape_string($conn, $_REQUEST['zipcode']);}
		if(isset($_REQUEST['country'])){ $country=mysqli_real_escape_string($conn, $_REQUEST['country']);}
		if(isset($_REQUEST['birth_date'])){ $birth_date=($_REQUEST['birth_date']);}
		if(isset($_REQUEST['language_code'])){ $language_code=mysqli_real_escape_string($conn, $_REQUEST['language_code']);}

		
		$update_que="";
		// if(isset($fname) && $fname!=""){ $update_que=" fname='".$fname."'";}
		if(isset($lname) && $lname!=""){ $update_que.=", lname='".$lname."'";}
		if(isset($pname) && $pname!=""){ $update_que.=", pname='".$pname."'";}
		if(isset($emailid) && $emailid!=""){ $update_que=", emailid='".$emailid."'";}
		// if(isset($mobile) && $mobile!=""){ $update_que=" mobile='".$mobile."'";}
		// if(isset($gender) && $gender!=""){ $update_que.=", gender='".$gender."'";}
		if(isset($address) && $address!=""){ $update_que.=", address='".$address."'";}

		if(isset($state) && $state!=""){ $update_que.=", state='".$state."'";}
		if(isset($city) && $city!=""){ $update_que.=", city='".$city."'";}
		if(isset($lat) && $lat!=""){ $update_que.=", lat='".$lat."'";}
		if(isset($lng) && $lng!=""){ $update_que.=", lng='".$lng."'";}

		if(isset($zipcode) && $zipcode!=""){ $update_que.=", zipcode='".$zipcode."'";}
		if(isset($country) && $country!=""){ $update_que.=", country='".$country."'";}
		if(isset($birth_date) && $birth_date!=""){ $update_que.=", birth_date='".$birth_date."'";}
		if(isset($language_code) && $language_code!=""){ $update_que.=", language_code='".$language_code."'";}



		$logged_in_user=$_REQUEST['logged_in_user'];
		
		
		$condition="";
		
		$condition=" cid='".$logged_in_user."' ";
		
		
		$is_photo_approved="0";
		
		$profile_photo_name="";
		
		if(isset($_FILES['profile_photo']['name']) && ((is_array($_FILES['profile_photo']['name']) && count($_FILES['profile_photo']['name'])>0) || $_FILES['profile_photo']['name']!="") )
		{
			//$photo_name=GenrateUploadFileName("profile_photo",$pre_tag="",$is_pretag_use="0",$i,$is_encoded="0");
			$profile_photo_name="User_".rand(999,9999)."_".$_FILES['profile_photo']['name'];	
			$is_photo_approved="1";
			$update_que.=", photo='$profile_photo_name'";
		}

		$data=array();
		$file_field=array("chk_file_path" => "../uploads/User/","file_path" => ROOT_W."/uploads/User/","default_file" => ROOT."/uploads/User/user.png","file_field_col" => "photo");

		$profile_details=get_ConditionalDetailsFromTable("cz_users",$is_stat_chk="0",$file_field,$condition,"0","");
		if($profile_details!="" && isset($profile_details['cid']))
		{
			
			$add_user_registration=mysqli_query($conn,"UPDATE cz_users SET fname='$fname',mobile='$mobile' ".$update_que." WHERE ".$condition) or die(mysqli_error($conn));	
			if($add_user_registration)
			{
				if($profile_photo_name!="")
				{
					UploadFile("profile_photo",$folder_name="../uploads/User/",$profile_photo_name);			
					/*if(file_exists("../uploads/User/".$profile_photo_name))
					{
						$data['profile_photo']=ROOT."/uploads/User/".$profile_photo_name;
					}*/
				}
				/*send notification*/
				// $admin_id="1";
				// $tokens_executive=get_customer_tokens($logged_in_user);
				// $tokens_admin=get_customer_tokens($admin_id);
				$title_executive="Profile Updated";
				// $title_admin="New Ride Added";
				$body_executive="Your Profile Updated Successfully";
				// $body_admin="New Ride LEAD-".$srno." Added By ".get_exname($logged_in_user);
				$additional_desc_executive=$body_executive;
				// $additional_desc_admin=$body_admin;
				$type="update_profile";
				$type_id=$logged_in_user;

				// $executive_notification=SendOneSignalNotification($tokens_executive,$title_executive,$body_executive,$type,$type_id,$additional_desc_executive);
				// $add_executive_notification=AddNotification($title_executive,$additional_desc_executive,$type,$type_id,$logged_in_user);

				$user_details=get_ConditionalDetailsFromTable("cz_users",$is_stat_chk="0",$file_field,$condition,"0","");
				// $admin_notification=SendOneSignalNotification($tokens_admin,$title_admin,$body_admin,$type,$type_id,$additional_desc_admin);
				// $add_admin_notification=AddNotification($title_admin,$additional_desc_admin,$type,$type_id,$admin_id);

				/*send notification*/
				/*$ratings=GetUserRatings($cid);
		$user_details['ratings']=$ratings;*/
		// if($user_details['photo']==ROOT."/uploads/User/user.png" && $user_details['social_profile_photo']!="")
		// {
		// 	$user_details['photo']	=$user_details['social_profile_photo'];
		// }
		
			// $user_details['update_que']=$_FILES;
		if(isset($user_details['fname']) && $user_details['fname']!="")
		{
			$user_details['username']=$user_details['fname']." ".$user_details['lname'];
		}


		$alert_min_range="";
		$alert_max_range="";
		if($user_details['user_type']=="paid")
		{
			$alert_min_range_default=GetSingleFieldDataFromTable("cz_settings",$field="svalue"," sname='paid_user_alert_start_range' ",$is_stat_chk="0");
				$alert_max_range_default=GetSingleFieldDataFromTable("cz_settings",$field="svalue"," sname='paid_user_alert_end_range' ",$is_stat_chk="0");
		}else
		{
			$alert_min_range_default=0;
			$alert_max_range_default=0;
		}
		$user_alert_details=get_ConditionalDetailsFromTable("cz_user_alert","0",""," user_id='".$user_details['cid']."' ","0");
		if($user_alert_details!="")
		{
			$alert_min_range=$user_alert_details['min_range'];
			$alert_max_range=$user_alert_details['max_range'];
		}else
		{
			$alert_min_range=$alert_min_range_default;
			$alert_max_range=$alert_max_range_default;

		}
		$user_details['alert_min_range']=$alert_min_range;
		$user_details['alert_max_range']=$alert_max_range;

				$data['user_details']=$user_details;
				//$message = "Profile Details Updated Successfully";
				$user_language=GetSingleFieldDataFromTable("cz_users",$field="language_code"," cid='".$_REQUEST['logged_in_user']."' ",$is_stat_chk="0");
				if($user_language=="" || $user_language=="en" || $user_language=="EN" || $user_language=="ENG")
				{
					$message = "Profile Details Updated Successfully";
				}
				else
				{
					$message = "¡Datos del perfil actualizados con éxito!";
				}

				$returnCode=true;		
			}else
			{
				$data['user_details']=null;
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
		}else
		{	
			$data['user_details']=null;
			//$add_user_registration=mysqli_query($conn,"INSERT INTO cz_users (car_number,description,brand,modal,car_owner) VALUES('$car_number','$description','$brand','$modal','$logged_in_user')") or die(mysqli_error($conn));
			$message = "No Profile Available for these credentials";
			$returnCode=false;
		}
		
		/*$message = "Photos Uploaded Successfully";
			$returnCode=true;*/
		
		
		//$message=$message.json_encode($_FILES);
	}else
	{
		$data['user_details']=null;
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

SendAPIResponse($returnCode,$message,$data);
?>