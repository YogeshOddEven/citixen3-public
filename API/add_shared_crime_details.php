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
	
	if(isset($_REQUEST['crime_id']) && isset($_REQUEST['logged_in_user']) && isset($_REQUEST['shared_to']) )
	{
		//$photo_name=array();
		$crime_id=mysqli_real_escape_string($conn, $_REQUEST['crime_id']);
		$cdate=date('Y-m-d h:i:s');
		$logged_in_user=$_REQUEST['logged_in_user'];
		$shared_by=$logged_in_user;
		$shared_to=mysqli_real_escape_string($conn, $_REQUEST['shared_to']);
        $shared_medium=mysqli_real_escape_string($conn, $_REQUEST['shared_medium']);
		//$id=$_REQUEST['id_car'];
		$condition="";
		
		// $condition=" car_owner='".$logged_in_user."' AND id='".$id."' ";
		

		
		// $car_details=get_ConditionalDetailsFromTable("cz_user_contact",$is_stat_chk="0",$file_field="",$condition,"0","id,car_number,description,modal,brand");
		// if($car_details!="" && isset($car_details['id']))
		// {
		// 	$add_user_registration=mysqli_query($conn,"UPDATE cz_user_contact SET car_number='$car_number',description='$description',brand='$brand',modal='$modal' WHERE ".$condition) or die(mysqli_error($conn));	
		// }else
		// {	
			$add_user_registration=mysqli_query($conn,"INSERT INTO cz_shared_crime_details (crime_id,shared_by,shared_to,date,shared_medium) VALUES('$crime_id','$shared_by','$shared_to','$cdate','$shared_medium')") or die(mysqli_error($conn));
		//}
		if($add_user_registration)
			{
				
				if($user_language=="" || $user_language=="en" || $user_language=="EN" || $user_language=="ENG")
				{
					$message = "Details set Successfully";
				}
				else
				{
					$message = "Detalles establecidos con éxito";
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
				//$message = "Error in Updation, Please try again later.";
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