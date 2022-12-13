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

if( isset($_REQUEST['logged_in_user']) && $_REQUEST['logged_in_user']!="" )
{
	
	// $id_notification=$_REQUEST['id_notification'];
	$logged_in_user=$_REQUEST['logged_in_user'];
	$condition=" id_recepient='".$logged_in_user."' AND recepient_type='0' ";
	$notification_details=get_ConditionalDetailsFromTable($table_name="pns_notification_details",$is_stat_chk="0",$file_field="",$condition,$is_multiple="0");
	if($notification_details!="")
	{
		$update = "UPDATE pns_notification_details SET status='0' WHERE  ".$condition;
		$query = mysqli_query($conn,$update) or die(mysqli_error($conn));
		if($query)
		{
			
			if($user_language=="" || $user_language=="en" || $user_language=="EN" || $user_language=="ENG")
			{
				$message = "Status Updated Successfully";
			}
			else
			{
				$message = "Estado actualizado con éxito ";
			}
			$returnCode=true;	

		}else
		{
			
			if($user_language=="" || $user_language=="en" || $user_language=="EN" || $user_language=="ENG")
			{
				$message = "Error in Updating Status";
			}
			else
			{
				$message = "Error al actualizar el estado";
			}
			$returnCode=false;		
		}
	}else
	{
		
		if($user_language=="" || $user_language=="en" || $user_language=="EN" || $user_language=="ENG")
		{
			$message = "No notification available for these credentials";
		}
		else
		{
			$message = "No hay notificación disponible para estas credenciales";
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
SendAPIResponse($returnCode,$message,$data="",$is_nodata="1");
?>