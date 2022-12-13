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

if(isset($_REQUEST['id_notification']) && isset($_REQUEST['logged_in_user']) && $_REQUEST['id_notification']!="" && $_REQUEST['logged_in_user']!="" )
{
	
	$id_notification=$_REQUEST['id_notification'];
	$logged_in_user=$_REQUEST['logged_in_user'];
	
	$notification_details=get_ConditionalDetailsFromTable($table_name="cz_notification_details",$is_stat_chk="0",$file_field="",$condition=" id_recepient='".$logged_in_user."' AND id_notification='".$id_notification."' ",$is_multiple="0");
	if($notification_details!="")
	{
		$update = "UPDATE cz_notification_details SET is_read='1' WHERE id_notification='".$id_notification."' AND id_recepient='".$logged_in_user."' AND recepient_type='0' ";
		$query = mysqli_query($conn,$update) or die(mysqli_error($conn));
		if($query)
		{
			$message = "Status Updated Successfully";
			if($user_language=="" || $user_language=="en" || $user_language=="EN" || $user_language=="ENG")
			{
				$message = "Status Updated Successfully.";
			}
			else
			{
				$message = "Estado actualizado con éxito";
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
	}else
	{
		$message = "No notification available for these credentials";
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
SendAPIResponse($returnCode,$message,$data="",$is_nodata="1");
?>