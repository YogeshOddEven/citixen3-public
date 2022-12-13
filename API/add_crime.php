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
	
	if(isset($_REQUEST['report_type']) && isset($_REQUEST['logged_in_user']) && isset($_REQUEST['is_anonyms_reporting']) && isset($_REQUEST['crime_date']) && $_REQUEST['report_type']!=""  && $_REQUEST['is_anonyms_reporting']!=""   && $_REQUEST['crime_date']!="" )
	{
		//$photo_name=array();

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

		if(isset($_REQUEST['crime_full_address']) && $_REQUEST['crime_full_address']!="")
		{



			$report_type=mysqli_real_escape_string($conn, $_REQUEST['report_type']);
			$crime_full_address=mysqli_real_escape_string($conn, $_REQUEST['crime_full_address']);
			$is_anonyms_reporting=mysqli_real_escape_string($conn, $_REQUEST['is_anonyms_reporting']);
			$crime_date=date('Y-m-d H:i:s', strtotime($_REQUEST['crime_date']));
			$short_address=mysqli_real_escape_string($conn,$_REQUEST['short_address']);
			$city=mysqli_real_escape_string($conn,$_REQUEST['city']);
			$state=mysqli_real_escape_string($conn,$_REQUEST['state']);
			$province=mysqli_real_escape_string($conn,$_REQUEST['province']);
			$crime_type=mysqli_real_escape_string($conn,$_REQUEST['crime_type']);
			$description=mysqli_real_escape_string($conn,$_REQUEST['description']);
			$additional_notes=mysqli_real_escape_string($conn,$_REQUEST['additional_notes']);
			$other_crime_type_details=mysqli_real_escape_string($conn,$_REQUEST['other_crime_type_details']);
			$crime_type_field_details=mysqli_real_escape_string($conn,$_REQUEST['crime_type_field_details']);
			$crime_media=mysqli_real_escape_string($conn,$_REQUEST['crime_media']);
			$logged_in_user=$_REQUEST['logged_in_user'];
			
			//$id=$_REQUEST['id_car'];
			$condition="";
			
			// $condition=" car_owner='".$logged_in_user."' AND id='".$id."' ";
			

			
			// $car_details=get_ConditionalDetailsFromTable("cz_user_contact",$is_stat_chk="0",$file_field="",$condition,"0","id,car_number,description,modal,brand");
			// if($car_details!="" && isset($car_details['id']))
			// {
			// 	$add_user_registration=mysqli_query($conn,"UPDATE cz_user_contact SET car_number='$car_number',description='$description',brand='$brand',modal='$modal' WHERE ".$condition) or die(mysqli_error($conn));	
			// }else
			// {	
				$add_crime=mysqli_query($conn,"INSERT INTO cz_crime_details (report_type,crime_full_address,is_anonyms_reporting,crime_date,short_address,city,state,province,crime_type,description,additional_notes,other_crime_type_details,crime_type_field_details,added_by,crime_media) VALUES('".$report_type."','".$crime_full_address."','".$is_anonyms_reporting."','".$crime_date."','".$short_address."','".$city."','".$state."','".$province."','".$crime_type."','".$description."','".$additional_notes."','".$other_crime_type_details."','".$crime_type_field_details."','".$logged_in_user."','".$crime_media."')") or die(mysqli_error($conn));
			//}
			if($add_crime)
				{
					$crime_id=mysqli_insert_id($conn);
					$alerted_users=SendCrimeAlertNotification($crime_id,$logged_in_user);
					$data['alerted_users']=$alerted_users;
					//$message = "Crime Added Successfully";
					if($user_language=="" || $user_language=="en" || $user_language=="EN" || $user_language=="ENG")
					{
						$message = "Crime Added Successfully";
					}
					else
					{
						$message = "Crimen agregado con éxito";
					}
					$returnCode=true;		
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
			/*$message = "Photos Uploaded Successfully";
				$returnCode=true;*/
			
			
			//$message=$message.json_encode($_FILES);
		}else
		{
			if($user_language=="" || $user_language=="en" || $user_language=="EN" || $user_language=="ENG")
			{
				$message = "Please select crime location";
			}
			else
			{
				$message = "Seleccione la ubicación del crimen";
			}
			$returnCode=false;
		}		
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

SendAPIResponse($returnCode,$message,$data,$is_nodata="0");
?>