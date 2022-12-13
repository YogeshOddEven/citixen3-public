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
	
	if(isset($_REQUEST['lat_lng']) && isset($_REQUEST['logged_in_user']) )
	{
		//$photo_name=array();
		$lat_lng=mysqli_real_escape_string($conn, $_REQUEST['lat_lng']);
		$min_range=mysqli_real_escape_string($conn, $_REQUEST['min_range']);
		$max_range=mysqli_real_escape_string($conn, $_REQUEST['max_range']);
		$cdate=date('Y-m-d h:i:s');
		$logged_in_user=$_REQUEST['logged_in_user'];
		$user_id=$logged_in_user;
		//$id=$_REQUEST['id_car'];
		$condition="";
		
		// $condition=" car_owner='".$logged_in_user."' AND id='".$id."' ";
		

		
		// $car_details=get_ConditionalDetailsFromTable("cz_user_contact",$is_stat_chk="0",$file_field="",$condition,"0","id,car_number,description,modal,brand");
		// if($car_details!="" && isset($car_details['id']))
		// {
		// 	$add_user_alert=mysqli_query($conn,"UPDATE cz_user_contact SET car_number='$car_number',description='$description',brand='$brand',modal='$modal' WHERE ".$condition) or die(mysqli_error($conn));	
		// }else
		// {	
			$add_user_alert=mysqli_query($conn,"INSERT INTO cz_user_alert (lat_lng,user_id,date_added,min_range,max_range) VALUES('$lat_lng','$user_id','$cdate','$min_range','$max_range')") or die(mysqli_error($conn));
		//}
		if($add_user_alert)
			{
				$c_alert=mysqli_insert_id($conn);
				mysqli_query($conn,"DELETE from cz_user_alert WHERE user_id='$user_id' AND id!='$c_alert' ");
				// mysqli_query($conn,"UPDATE cz_user_alert SET status='0' WHERE user_id='$user_id' AND id!='$c_alert' ");
				if($user_language=="" || $user_language=="en" || $user_language=="EN" || $user_language=="ENG")
				{
					$message = "Alert Range set Successfully";
				}
				else
				{
					$message = "Rango de alerta establecido con éxito";
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
				$returnCode=true;
			}
		/*$message = "Photos Uploaded Successfully";
			$returnCode=true;*/
		
		
		//$message=$message.json_encode($_FILES);
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